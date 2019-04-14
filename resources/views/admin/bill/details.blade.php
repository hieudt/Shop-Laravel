@extends('admin.master') 
@section('title','Thông tin hóa đơn') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">

@endsection

@section('content')
<div id="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-2">
                <div class="card-body"  id="printJS-form">
                    <div class="container-fluid">
                      <b class="text-left my-5">SỐ HĐ : #{{$Bill->id}}</b>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                                    <p class="mt-5 mb-2"><b>Người Đặt Hàng</b></p>
                                    <p>Họ Tên : {{$Bill->users->name}}<br>SĐT : {{$Bill->users->Phone}}</p>
                                  </div>
                      <div class="col-lg-3 pr-0">
                            <p class="mt-5 mb-2 text-right"><b>Thông tin giao hàng</b></p>
                            <p class="text-right">
                                Người nhận : {{$Bill->InfoShip->FullName}}<br/>
                                Địa chỉ : {{$Bill->InfoShip->Address}}<br/>
                                SĐT : {{$Bill->InfoShip->Phone}}<br/>
                                Ghi chú : {{$Bill->InfoShip->Note}}
                            </p>
                    </div>
                    </div>
                   <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                          <table class="table">
                            <thead>
                              <tr class="bg-dark text-white">
                                  <th>#</th>
                                  <th>Tên Sản Phẩm</th>
                                  <th>Màu sắc , Kích cỡ</th>
                                  <th class="text-right">Số Lượng</th>
                                  <th class="text-right">Đơn Giá</th>
                                  <th class="text-right">Sale</th>
                                  <th class="text-right">Thành Tiền</th>
                                </tr>
                            </thead>
                            <?php $count = 0 ?>
                            @foreach($Bill->Detailsbill as $item)
                            <tbody>
                              <tr class="text-right">
                                <td class="text-left">{{++$count}}</td>
                                <td class="text-left">{{$item->product_details->Product->title}}</td>
                                <td class="text-left">{{$item->product_details->Color->name}} | {{$item->product_details->Size->name}}</td>
                                <td>{{$item->Number}}</td>
                                <td>{!!$item->product_details->Product->cost!!}</td>
                                <td>{{$item->product_details->Product->discount}}%</td>
                                <td>{!!formatMoney($item->Number * priceDiscount($item->product_details->Product->cost,$item->product_details->Product->discount))!!}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                      <p class="text-right mb-2">Phí vận chuyển : {!!formatMoney($Bill->Shipper->fee,false,true)!!}</p>
                      <p class="text-right mb-2">Phương thức thanh toán : 
                          @if($Bill->PayMethod == 0)
                           COD
                          @elseif($Bill->PayMethod == 1)
                           Chuyển khoản ngân hàng
                          @elseif ($Bill->PayMethod == 2)
                          Ví điện tử
                          @else
                          Thẻ tín dụng
                          @endif
                      </p>
                      <p class="text-right">
                          @if($Bill->id_coupon)
                          Mã Giảm Giá : -{{$Bill->coupons->Percent}}%
                          @endif
                      </p>
                      <h4 class="text-right mb-5">Tổng tiền : {!!formatMoney($Bill->TotalMoney)!!}</h4>
                      <hr>
                    </div>
                    
                </div>
                
                    <button class="btn btn-primary float-right" id="printBtn"><i class="mdi mdi-printer mr-1"></i>IN HÓA ĐƠN</button>
                    <button class="btn btn-primary float-right mt-4 ml-2" id="backBtn"><i class="mdi mdi-printer mr-1"></i>Quay Lại</button>

                
            </div>
        </div>
</div>
@endsection
@section('javascript')

<script>
    $(document).on('click','#printBtn',function(){

        printJS({
            printable: 'printJS-form',
            type: 'html',
            targetStyles: ['*']
        });
    });

    $('#backBtn').click(function(){
        window.location.href = "{{url('admin/bill/list')}}";
    });
</script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection