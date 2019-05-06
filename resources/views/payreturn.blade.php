@extends('includes.master')
@section('css')
<style>
    td {
        text-align:center !important:
    }
</style>
@endsection
@section('title','Thông tin hóa đơn')
@section('content')
    <section class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12 text-center services">
                    <div class="services-div">
                        <h1 class="text-center" style="color: green"> Đặt hàng thành công  !!</h1>
                        <h2>Nếu bạn là khách vãng lai hãy giữ lại liên kết này để kiểm tra trạng thái hóa đơn.</h2>
                        
                        <p>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="info">
                                        <th><center>MÃ HÓA ĐƠN</center></th>
                                        <th><center>NGÀY MUA</center></th>
                                        <th><center>TRẠNG THÁI</center></th>
                                        <th><center>THANH TOÁN</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><center>HDSHOPROGTEAM{{$Bill->id}}</center></td>
                                        <td><center>{{$Bill->created_at}}</center></td>
                                        <td>
                                            @if($Bill->status == 0)
                                            <b><center>Chờ xử lý</center></b>
                                            @elseif($Bill->status == 1)
                                            <b><center><font color="orange">Chờ nhận hàng</font></center></b>
                                            @elseif($Bill->status == 2)
                                            <b><center><font color="green">ĐÃ GIAO HÀNG</font></center></b>
                                            @else
                                            <b><center><font color="red">ĐƠN BỊ HỦY</font></center></b>
                                            @endif
                                        </td>
                                        <td>
                                            @if($Bill->statusPay == 0)
                                            <b><center><font color="red">CHƯA THANH TOÁN</font></center></b>
                                            @else
                                            <b><center><font color="green">ĐÃ THANH TOÁN</font></center></b>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            @if($url != null && $Bill->statusPay == 0)
                            <a href="{{$url}}" class="button style-10">Thanh Toán</a>
                            @endif
                            <div class="links">
                                
                                <div id="paypal-button"></div>
                            </div>
                        </p>
                        <a href="{{url('san-pham')}}" class="button style-10">Tiếp Tục Mua Hàng</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop

@section('footer')

@stop
@section('javascript')
@if($Bill->PayMethod == 1 && $Bill->statusPay == 0)
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
        function paypalVeriOrder(Bill){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '{{route('bill.verifypaypal')}}',
                data:{id:Bill},
                success: function (data) {
                    ToastSuccess(data.success); 
                },
                error: function (request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
        }
      paypal.Button.render({
        env: 'sandbox', // Or 'production'
        style: {
          size: 'large',
          color: 'gold',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post('/api/create-payment/{{$Bill->TotalMoney}}')
            .then(function(res) {
            console.log(res);
              return res.id;
            });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post('/api/execute-payment', {
            paymentID: data.paymentID,
            payerID:   data.payerID
          })
            .then(function(res) {
              console.log(res);
              paypalVeriOrder({{$Bill->id}});
              location.reload();
            });
        }
      }, '#paypal-button');
</script>
@endif
@endsection