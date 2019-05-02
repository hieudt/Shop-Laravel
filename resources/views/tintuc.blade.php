@extends('includes.master') 
@section('title',$news->title) 
@section('css')
@endsection
@section('content')
<section class="go-section">
    <div class="row">
        <div class="container">
                <div class="breadcrumb-box">
                    <a href="{{url('/')}}">Trang Chủ</a>
                    <a href="tin-tuc/{{$news->slug}}">{{$news->title}}</a>
                </div>
            <div class="text-center services">
                <h1 style="font-weight:bold;">{{$news->title}}</h1>
            </div>
            <p>{!!$news->content!!}</p>
        </div>
    </div>
</section>
@endsection
@section('javascript')
@endsection