@extends('includes.master')
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>HDSHOPROGTEAM{{$Bill->id}}</td>
                                        <td>{{$Bill->created_at}}</td>
                                        <td>
                                            @if($Bill->status == 0)
                                            <b>Chờ xử lý</b>
                                            @elseif($Bill->status == 1)
                                            <b><font color="orange">Chờ nhận hàng</font></b>
                                            @elseif($Bill->status == 2)
                                            <b><font color="green">ĐÃ GIAO HÀNG</font></b>
                                            @else
                                            <b><font color="red">ĐƠN BỊ HỦY</font></b>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

@endsection