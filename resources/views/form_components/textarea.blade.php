<div class="form-group {{$errors->has($name) ? 'has-error':null}}">
   <h4> {{ Form::label($name, $label_name, ['class' => 'control-label']) }} </h4>
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'],$attributes)) }}
    @if($errors->has($name))
        <span class="help-block">
            <strong>{{$errors->first($name)}}</strong>
        </span>
    @endif
</div>

