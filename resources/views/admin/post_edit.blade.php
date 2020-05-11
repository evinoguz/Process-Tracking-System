@extends('layouts.master')
@section('contents')
    <header class="intro-header" style="asset{{'img/indir9.jpg'}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">

                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/post')}}">Postları Listele</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::model($posts,['route'=>['post.update',$posts->id],'method'=>'put','files'=>true]) !!}
                {!! Form::bsText('title','Başlık') !!}
                {!! Form::bsText('location','Konum') !!}
                {!! Form::bsFile('image','Resim') !!}
                {!! Form::bsTextArea('content','İçerik',null,['class'=>'summernote']) !!}
                {!! Form::bsSubmit('Kaydet') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


