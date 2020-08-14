<div class="form-group {{$errors->has($name) ? 'has-error':''}}">
    <h4> {{ Form::label($name, $label_name, ['class' => 'control-label']) }} </h4>
    {{ Form::file($name) }}
    @if($errors->has($name))
        <span class="help-block">
            <strong>{{$errors->first($name)}}</strong>
        </span>
    @endif
</div>
