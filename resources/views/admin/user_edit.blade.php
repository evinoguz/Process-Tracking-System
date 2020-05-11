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
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::model($users,['route'=>['user.update', $users->id],'method'=>'put']) !!}
                {!! Form::bsCheckbox('rol[]','Roller',[
                ['value'=>1,'text'=>'Admin','is_checked'=>$users->authorized('admin')],
                ['value'=>2,'text'=>'Yazar','is_checked'=>$users->authorized('author')],
                ['value'=>3,'text'=>'Standart','is_checked'=>$users->authorized('standart')],
                ]) !!}
                {!! Form::bsText('name','İsim') !!}
                {!! Form::bsText('email','E-mail') !!}
                {!! Form::bsPassword('password','Şifre') !!}
                {!! Form::bsSubmit('Kaydet') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


