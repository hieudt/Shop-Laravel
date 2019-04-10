@extends('includes.master')
@section('title','Giỏ Hàng')
@section('css')
@endsection
@section('content')

    <section class="container" style="margin-top: 20px;">

        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/cart')}}">My Cart</a>
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="information-blocks">
                <div class="table-responsive" id="ListCart">
                    
                </div>
               


        </div>

    </section>
@section('javascript')
@endsection
@stop

@section('footer')
<script>
    $(document).ready(function(){
        loadCart();
    });

    function loadCart(){
        $('#ListCart').load('/cart/load',function(){}).hide().fadeIn();
    }

    $(document).on('click','.remove-button',function(){
        var row_id = $(this).attr('data-rowId');
        deleteCart(row_id);
    });

    function deleteCart(row_id){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('cart.destroy')}}',
        data:{rowid:row_id},
        dataType: 'json',
            success: function(data) {
               ToastSuccess(data.success);
               loadCart();
            },
            error: function(html, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }
</script>
@stop