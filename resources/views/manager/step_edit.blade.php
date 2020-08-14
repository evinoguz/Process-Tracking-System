@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/step')}}">Step List</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::model($steps,['route'=>['step.update', $steps->id],'method'=>'put']) !!}
                {!! Form::bsText('name','Name') !!}
                {!! Form::bsSubmit('Update') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


