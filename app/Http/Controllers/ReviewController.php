<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use App\Detailsbill;
use App\Product;
use Carbon\Carbon;
use App\User;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $this->validate($request,[
                'content' => 'required',
                'idproduct' => 'required',
                'rating' => 'numeric|required|min:1|max:5'
            ],[
                'idproduct.required' => 'Sản phẩm không hợp lệ',
                'rating.numeric' => 'Đánh giá không hợp lệ',
                'rating.min' => 'Đánh giá không hợp lệ',
                'rating.max' => 'Đánh giá không hợp lệ ',
                'rating.required' => 'Vui lòng chọn mức đánh giá',
                'content.required' => 'vui lòng nhập nội dung đánh giá'
            ]);

            if(!Auth::user()){
                return response()->json(['errors' => ['errorcoupons' => [0 => 'Đăng nhập mới có thể đánh giá sản phẩm']]], 422);
            }

            if(!$this->hasOwnerProduct($request->idproduct)){
                return response()->json(['errors' => ['errorcoupons' => [0 => 'Chỉ đánh giá được khi bạn đã sở hữu sản phẩm này']]], 422);
            }

            if ($this->hasReview($request->idproduct)) {
                return response()->json(['errors' => ['errorcoupons' => [0 => 'Bạn đã đánh giá sản phẩm này rồi']]], 422);
            }

            $data = new Review;
            $data->id_product = $request->idproduct;
            $data->id_users = Auth::user()->id;
            $data->content = $request->content;
            $data->rating = $request->rating;
            $data->save();
            return response()->json(['success'=>'Đánh giá sản phẩm thành công !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }

    public function fetch(Request $request){
        if ($request->ajax()) {
            $id = $request->idproduct;
            $data = Review::orderBy('created_at','DESC')->where('id_product',$id)->get();
            $total_row = count($data);
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $review) {
                    $output .= '
                     <div class="row rating-row">
                        <div class="col-md-3">
                            <strong>'.$review->User->name.'</strong>
                            <div class="rating-box">';
                                for($i=1;$i<=5;$i++){
                                    if($i <= $review->rating)
                                       $output .= '<div class="star"><i class="fa fa-star"></i></div>';
                                    else
                                    $output .= '<div class="star"><i class="fa fa-star-o"></i></div>';
                                }

                    $output .= '</div>
                            <div class="rating-date">'.$this->toDate($review->created_at).'</div>
                        </div>
                        <div class="col-md-8">
                            '.$review->content.'
                        </div>
                    </div>
                    ';
                }
            } else {
                $output .= '<h4>Hiện tại chưa có đánh giá.</h4>';
            }

            $data = array(
                'load' => $output,
            );

            echo json_encode($data);
        }
    }

    public function hasOwnerProduct($idproduct){
        $data = User::find(Auth::user()->id)->DetailsBill()->get();
        if(count($data) > 0){
            foreach ($data as $item) {
                if($item->product_details->Product->id == $idproduct && $item->Bill->statusPay == 1 && $item->Bill->status == 2){
                    return true;
                    break;
                }
            }
            return false;
        }
        return false;
    }

    public function hasReview($idproduct){
        $data = Review::where('id_product',$idproduct)->where('id_users',Auth::user()->id)->count();
        if($data > 0){
            return true;
        } else {
            return false;
        }
    }

    public function toDate($timestamp){
        Carbon::setLocale('vi');
        $dt = Carbon::parse($timestamp);
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        return $dt->diffForHumans($now);
    }
}
