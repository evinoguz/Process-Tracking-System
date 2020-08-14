@extends('layouts.master')
@section('contents')
     <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::model($users,['route'=>['user.update', $users->id],'method'=>'put']) !!}
                {!! Form::bsCheckbox('rol[]','Roller',[
                ['value'=>1,'text'=>'Manager','is_checked'=>$users->authorized('manager')],
                ['value'=>2,'text'=>'Employees','is_checked'=>$users->authorized('employees')],
                ['value'=>3,'text'=>'Customer','is_checked'=>$users->authorized('customer')],
                ]) !!}
                {!! Form::bsText('name','Name') !!}
                {!! Form::bsText('email','Email') !!}
                {!! Form::bsPassword('password','Password') !!}
                {!! Form::bsSubmit('Update') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


