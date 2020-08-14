@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <a href="{{url('/product')}}">Product List</a>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::model($products,['route'=>['product.update',$products->id],'method'=>'put','files'=>true]) !!}
                {!! Form::bsText('name','Name') !!}
                {!! Form::bsFile('img_url','İmage') !!}
                <div><h3>Content:</h3></div>
                {!! Form::bsTextArea('content',' ',null,['class'=>'summernote']) !!}
                {!! Form::bsText('price','Price') !!}
                {!! Form::bsSelect('step_id','Step',null,$steps,'Step Select') !!}
                {!! Form::bsSubmit('Update') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


