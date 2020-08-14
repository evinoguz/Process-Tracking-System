<div class="form-group {{$errors->has($name) ? 'has-error':''}}">
    <h4> {{ Form::label($name, $label_name, ['class' => 'control-label']) }} </h4>
    {{ Form::select($name,$liste, $value,['placeholder'=>$placeholder,'class' => 'selectpicker','data-width'=>'100%']) }}
    @if($errors->has($name))
        <span class="help-block">
            <strong>{{$errors->first($name)}}</strong>
        </span>
    @endif
</div>

