@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/step')}}">Step List</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::open(["url"=>"/sub_step", "method"=>"post"]) !!}
                {!! Form::bsSelect('step_id','Step',null,$steps,'Step Select') !!}
                {!! Form::bsText('name','Name') !!}
                {!! Form::bsSubmit('Save') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


