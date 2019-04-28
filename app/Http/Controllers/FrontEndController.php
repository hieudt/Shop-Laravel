<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\Events\DemoPusherEvent;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Color;
use App\Brand;
use App\Images;
use App\Review;
use App\Notification;
use App\product_details;
use App\coupons;
use Carbon\Carbon;
use App\User;
use Pusher\Pusher;

use App\News;
use VisitLog;
use Cache;

class FrontEndController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cart()
    {
        $carts = array();
        return view('cart', compact('carts'));
    }

    public function index()
    {
        $features = Product::where('featured', '1')->orderBy('id', 'desc')->take(8)->get();
        $lastes = Product::orderBy('id', 'desc')->take(8)->get();
        $discounts = Product::where('discount', '>', '0')->orderBy('id', 'desc')->take(8)->get();
        $coupons = coupons::where('Date', '>', now())->where('typeEnable', '0')->get();
        $brands = Brand::all();
        $news = News::orderBy('created_at','desc')->get();
        return view('index2', compact('features', 'lastes', 'discounts', 'coupons','brands','news'));
    }

    public function productDetails($id, $slug)
    {
        $productdata = Product::findOrFail($id);
        $gallery = Images::where('id_product', $id)->get();
        $reviews = Review::where('id_product', $id)->orderBy('created_at','DESC')->get();
        $relateds = Product::where('id_sub', $productdata->id_sub)->where('id', '!=', $productdata->id)->take(8)->get();
        return view('product', compact('productdata', 'gallery', 'reviews', 'relateds'));
    }

    public function news($slug){
        $news = News::where('slug',$slug)->get();
        return view('tintuc',compact('news'));
    }

    public function loginPost(Request $req)
    {
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password'
        ]);

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return response()->json(['success' => 'Đăng nhập thành công']);
        } else {
            return response()->json(['errors' => ['faillogin' => [0 => 'Sai tên tài khoản hoặc mật khẩu']]], 422);
        }
    }

    public function logoutIndex()
    {
        Auth::logout();
        if (session()->get('coupon')) {
            session()->remove('coupon');
        }
        return redirect()->back();
    }

    public function signUpPost(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|max:40',
            'email' => 'email|required|unique:users,email',
            'Address' => 'required',
            'Phone' => 'required|numeric',
            'password' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã có người sử dụng',
            'name.required' => 'Vui lòng nhập họ và tên',
            'name.max' => 'Tên tối đa 40 ký tự',
            'Address.required' => 'Vui lòng nhập địa chỉ',
            'Phone.required' => 'Vui lòng nhập số điện thoại',
            'Phone.numeric' => 'Số điện thoại phải là số',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'g-recaptcha-response.required' => 'Vui lòng xác thực phía dưới'
        ]);

        $User = new User;
        $User->name = $req->name;
        $User->email = $req->email;
        $User->Address = $req->Address;
        $User->Phone = $req->Phone;
        $User->password = bcrypt($req->password);
        $User->role = 0;

        $User->save();

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $NewNotif = new Notification;
            if (Auth::check()) {
                $NewNotif->nameUser = Auth::user()->name;
            } else {
                $NewNotif->nameUser = "Khách Vãng Lai";
            }

            $NewNotif->action = "Tạo tài khoản";
            $NewNotif->task = "Khách Hàng";
            $NewNotif->save();


            eventLoadNotification();

            return response()->json(['success' => 'Đăng ký thành công']);
        }
    }

    public function list()
    {
        return view('list');
    }

    public function category($slug)
    {
        $Category = Category::all();
        $sort = "";
        if (Input::get('sort') != "") {
            $sort = Input::get('sort');
        }
        $desc = "";
        if (Input::get('desc') != "") {
            $desc = Input::get('desc');
        }
        if ($slug == "sanpham") {
            $Product = Product::orderBy(!empty($sort) ? $sort : 'id', !empty($desc) ? $desc : 'Asc')->paginate(10);
        } else {
            $subCate = explode("_", $slug);
            if ($subCate[0] == "sub") {
                $SubCategory = SubCategory::where('slug', $subCate[1])->first();
                if (empty($SubCategory)) {
                    $Product = Product::paginate(10);
                } else {
                    $Product = SubCategory::find($SubCategory['id'])->Product()->paginate(10);
                }
            } else {
                $TempCategory = Category::where('slug', $slug)->first();
                if (empty($TempCategory)) {
                    $Product = Product::paginate(10);
                } else {
                    $Product = Category::find($TempCategory['id'])->Product()->paginate(10);
                }
            }
        }



        return view('categoryproduct', compact('Product', 'Category'));
    }

    public function category2()
    {
        $Category = Category::all();
        $Color = Color::all();
        $Brand = Brand::all();
        $CategoryName = "";
        $CategorySlug = "";
        $SubCategoryName = "";
        $SubCategorySlug = "";

        if (request()->category) {
            $TempCategory = Category::where('slug', request()->category)->first();
            $CategoryName = $TempCategory->title;
            $CategorySlug = $TempCategory->slug;
            if (empty($TempCategory)) {
                $Product = Product::take(1000);
            } else {
                $Product = Category::find($TempCategory['id'])->Product();
            }
        } else {
            $Product = Product::take(1000);
        }

        if (request()->subcategory) {
            $TempCategory = SubCategory::where('slug', request()->subcategory)->first();
            $CategoryName = $TempCategory->Category->title;
            $CategorySlug = $TempCategory->Category->slug;
            $SubCategoryName = $TempCategory->name_sub;
            $SubCategorySlug = $TempCategory->slug;
            if (empty($TempCategory)) {
                $Product = Product::take(1000);
            } else {
                $Product = SubCategory::find($TempCategory['id'])->Product();
            }
        }

        if (request()->sort == 'low_high') {
            $Product = $Product->orderBy('cost');
        } elseif (request()->sort == 'high_low') {
            $Product = $Product->orderBy('cost', 'desc');
        } else { }

        if(request()->brands){
            $brands = Brand::where('slug',request()->brands)->first();
            $Product = $Product->where('id_brand',$brands->id);
        }

        if (request()->color) {
            $color = request()->color;
            $TempProduct = $Product->get();
            $arrayListMatchColor = array();

            foreach ($TempProduct as $key) {
                foreach ($key->product_details as $key2) {
                    if ($key2->Color->slug == $color) {
                        $arrayListMatchColor[] = $key->id;
                        break;
                    }
                }
            }

            $Product = $Product->whereIn('Product.id', $arrayListMatchColor);
        }

        if(request()->km){
            $Product = $Product->where('discount', '>', '0')->orderBy('id', 'desc');
        }
        if(request()->noibat){
            $Product = $Product->where('featured', '1')->orderBy('id', 'desc');
        }
        if(request()->moinhat){
            $Product = $Product->orderBy('id', 'desc');
        }
        
        if(request()->giamin){
            $Product = $Product->where('cost','>=',request()->giamin);
        }
        if(request()->giamax) {
            $Product = $Product->where('cost', '<=',request()->giamax);
        }
        $Product = $Product->paginate(10);
        

        return view('categoryproduct', compact('Product', 'Color','Brand', 'Category', 'CategoryName', 'CategorySlug', 'SubCategoryName', 'SubCategorySlug'));
    }

    public function fetchColor(Request $request)
    {
        if ($request->ajax()) {
            $idproduct = $request->get('idproduct');
            $idsize = $request->get('idsize');
            if ($idproduct != '') {
                $data = product_details::where('id_product', '=', $idproduct)
                    ->where('id_size', '=', $idsize)
                    ->get();
                //$data = DB::table('SubCategory')
                //  ->where('title', 'like', '%' . $query . '%')
                //->orWhere('slug', 'like', '%' . $query . '%')
                //->orderBy('id', 'asc')
                //->get();
            }
            $total_row = $data->count();
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <li>
                    <label>
                    <input type="radio" name="rdoColor" value="' . $row->Color->id . '">
                    <span class="swatch" style="background-color:' . $row->Color->codeColor . '"></span>
                    </label>
                    </li>
                    ';
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
            );

            echo json_encode($data);
        }
    }

    public function fetchSize(Request $request)
    {
        if ($request->ajax()) {
            $idproduct = $request->get('idproduct');
            if ($idproduct != '') {
                $data = product_details::where('id_product', '=', $idproduct)
                    ->get();
            }
            $total_row = $data->count();
            $output = '';
            $array = array();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $array[] = $row->id_size . "-" . $row->Size->name;
                }
                $arr = array_unique($array);
                foreach ($arr as $ar) {
                    $tempArr = explode('-', $ar);
                    $output .= '<option value="' . $tempArr[0] . '">' . $tempArr[1] . '</option>';
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
            );

            echo json_encode($data);
        }
    }

    public function forgotview(){
        return view('forgot');
    }
 
}
