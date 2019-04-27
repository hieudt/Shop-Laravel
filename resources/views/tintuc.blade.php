@extends('includes.master') 
@section('title',$news[0]->title) 
@section('css')
@endsection
@section('content')
<section class="go-section">
    <div class="row">
        <div class="container">
                <div class="breadcrumb-box">
                    <a href="{{url('/')}}">Trang Chủ</a>
                    <a href="tin-tuc/{{$news[0]->slug}}">{{$news[0]->title}}</a>
                </div>
            <div class="text-center services">
                <h1 style="font-weight:bold;">{{$news[0]->title}}</h1>
            </div>
            <p>{!!$news[0]->content!!}</p>
        </div>
    </div>
</section>
@endsection
@section('javascript')
@endsection