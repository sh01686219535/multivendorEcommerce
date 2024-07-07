@props(['name','value' => null,'placeholder'=>null])
<div class="form-group">
    <label for="{{$name}}">{{ucwords(Str::beforeLast($name, '_'))}}</label>
    <textarea id="{{$name}}" name="{{$name}}" class="form-control" placeholder="{{$placeholder}}">{{old($name,$value)}}</textarea>
</div>