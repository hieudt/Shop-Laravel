<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Color;
use App\Images;
use App\Review;
use App\User;
class FrontEndController extends Controller
{
    public function index(){
        $features = Product::where('featured','1')->orderBy('id','desc')->take(8)->get();
        $lastes = Product::orderBy('id','desc')->take(8)->get();
        $discounts = Product::where('discount','>','0')->orderBy('id','desc')->take(8)->get();
        return view('index2',compact('features','lastes','discounts'));
    }

    public function productDetails($id,$slug){
        $productdata = Product::findOrFail($id);
        $gallery = Images::where('id_product',$id)->get();
        $reviews = Review::where('id_product',$id)->get();
        $relateds = Product::where('id_sub',$productdata->id_sub)->where('id','!=',$productdata->id)->take(8)->get();
        return view('product',compact('productdata','gallery','reviews','relateds'));
    }

    public function loginPost(Request $req){
        $this->validate($req,[
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập password'
        ]);

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return response()->json(['success' => 'Đăng nhập thành công']);
        } else {
            return response()->json(['errors'=>['faillogin'=>[0=>'Sai tên tài khoản hoặc mật khẩu']]],422);
        }
    }

    public function logoutIndex(){
        Auth::logout();
        return redirect()->route('front.index');
    }

    public function signUpPost(Request $req){
        $this->validate($req,[
            'name'=>'required|max:40',
            'email'=>'email|required|unique:users,email',
            'Address'=>'required',
            'Phone'=>'required|numeric',
            'password'=>'required',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người sử dụng',
            'name.required'=>'Vui lòng nhập họ và tên',
            'name.max' => 'Tên tối đa 40 ký tự',
            'Address.required'=>'Vui lòng nhập địa chỉ',
            'Phone.required' => 'Vui lòng nhập số điện thoại',
            'Phone.numeric'=>'Số điện thoại phải là số',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);

        $User = new User;
        $User->name = $req->name;
        $User->email = $req->email;
        $User->Address = $req->Address;
        $User->Phone = $req->Phone;
        $User->password = bcrypt($req->password);

        $User->save();
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return response()->json(['success' => 'Đăng ký thành công']);
        }
    }

    public function list(){
        return view('list');
    }

    public function category($slug){
        $Category = Category::all();
        $sort = "";
        if(Input::get('sort') != ""){
            $sort = Input::get('sort');
        }
        $desc = "";
        if(Input::get('desc') != ""){
            $desc = Input::get('desc');
        }
        if($slug == "sanpham"){
            $Product = Product::orderBy(!empty($sort) ? $sort:'id',!empty($desc) ? $desc:'Asc')->paginate(10);
            } else {
            $subCate = explode("_",$slug);
            if($subCate[0] == "sub"){
                $SubCategory = SubCategory::where('slug',$subCate[1])->first();
                if(empty($SubCategory)){
                    $Product = Product::paginate(10);
                } else {
                    $Product = SubCategory::find($SubCategory['id'])->Product()->paginate(10);
                }
            } else {
                $TempCategory = Category::where('slug',$slug)->first();
                if(empty($TempCategory)){
                    $Product = Product::paginate(10);
                } else {
                    $Product = Category::find($TempCategory['id'])->Product()->paginate(10);
                }
            }
        }
        

        
        return view('categoryproduct',compact('Product','Category'));
    }

    public function category2(){
        $Category = Category::all();
        $Color = Color::all();
        $CategoryName = "";
        $CategorySlug = "";
        $SubCategoryName = "";
        $SubCategorySlug = "";

        if(request()->category){
            $TempCategory = Category::where('slug',request()->category)->first();
            $CategoryName = $TempCategory->title;
            $CategorySlug = $TempCategory->slug;
            if(empty($TempCategory)){
                $Product = Product::take(1000);
            } else {
                $Product = Category::find($TempCategory['id'])->Product();
                
                
            }
        } else {
            $Product = Product::take(1000);
        }

        if(request()->subcategory){
            $TempCategory = SubCategory::where('slug',request()->subcategory)->first();
            $CategoryName = $TempCategory->Category->title;
            $CategorySlug = $TempCategory->Category->slug;
            $SubCategoryName = $TempCategory->name_sub;
            $SubCategorySlug = $TempCategory->slug;
            if(empty($TempCategory)){
                $Product = Product::take(1000);
            } else {
                $Product = SubCategory::find($TempCategory['id'])->Product();
                
            }
        }

        if(request()->sort == 'low_high'){
            $Product = $Product->orderBy('cost');
        } elseif (request()->sort == 'high_low') {
            $Product = $Product->orderBy('cost','desc');
        } else {
            
        }

        if(request()->color){
            $color = request()->color;
            $TempProduct = $Product->get();
            $arrayListMatchColor = array();
           
            foreach($TempProduct as $key){
                foreach($key->product_details as $key2){
                    if($key2->Color->slug == $color){
                        $arrayListMatchColor[] = $key->id;break; 
                    }
                }
            }
    
            $Product = $Product->whereIn('Product.id',$arrayListMatchColor); 
            
        }

        
        $Product = $Product->paginate(10);
        
        
        return view('categoryproduct',compact('Product','Color','Category','CategoryName','CategorySlug','SubCategoryName','SubCategorySlug'));
    }

}
