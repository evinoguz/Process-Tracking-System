@extends('layouts.master')
@section('contents')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
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
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div><h3>Açıklama:</h3></div>
                {!! Form::open(['url'=>'yazarlik_talebi/send','method'=>'post']) !!}
                {!! Form::bsTextArea('explanation',' ',null,['class'=>'summernote']) !!}
                {!! Form::bsSubmit('Talep Gönder') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


