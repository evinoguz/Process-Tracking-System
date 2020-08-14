<div class="form-group {{$errors->has($name) ? 'has-error':null}}">
    <h4> {{ Form::label($name, $label_name, ['class' => 'control-label']) }} </h4>
    @foreach($items as $item)
        <label class="checkbox-inline"><input type="checkbox" class="status" name="{{$name}}[]" value="{{$item['value']}}"
                {{$item['is_checked'] ? 'checked':null}}>{{$item['text']}}</label>
    @endforeach
    @if($errors->has($name))
        <span class="help-block">
            <strong>{{$errors->first($name)}}</strong>
        </span>
    @endif
</div>

