@extends('includes.master') 
@section('title','Danh sách Yêu Thích') 
@section('css')
@endsection
 
@section('content')

<section class="container" style="margin-top: 20px;">

  <div class="content-push">

    <div class="breadcrumb-box">
      <a href="{{url('/')}}">Home</a>
      <a href="{{url('/wishlist')}}">Yêu Thích</a>
    </div>
    <div class="information-blocks">
      <div class="table-responsive">
        <table class="cart-table">
          <tr>
            <th class="column-1">Tên Sản Phẩm</th>
            <th class="column-2">Đơn Giá</th>
            <th class="column-3">Số Lượng</th>
            <th class="column-4">Tổng tiền</th>
            <th class="column-5"></th>
          </tr>
          <tr id="cartempty"></tr>
          <tbody id="ListWishlist">
          </tbody>
        </table>
      </div>
    </div>

</section>

@section('javascript')
<script>


</script>
@endsection
 
@stop 
@section('footer')
<script>


</script>

@stop