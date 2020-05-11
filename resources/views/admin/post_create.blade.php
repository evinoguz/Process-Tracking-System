@extends('layouts.master')
@section('contents')
    <header class="intro-header" style="background-image: url('img/indir9.jpg')">
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
                {!! Form::open(['url'=>'/post','method'=>'post','files'=>true]) !!}
                {!! Form::bsText('title','Başlık') !!}
                {!! Form::bsText('location','Konum') !!}
                {!! Form::bsFile('image','Resim') !!}
                <div><h3>Açıklama:</h3></div>
                {!! Form::bsTextArea('content',' ',null,['class'=>'summernote']) !!}
                {!! Form::bsSubmit('Kaydet') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


