@props(['name','type' => 'text','value' => null,'placeholder'=>null])

<div class="form-group">
    <label for="{{$name}}">{{ucwords(Str::beforeLast($name, '_'))}}</label>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" class="form-control" value="{{old($name,$value)}}" placeholder="{{$placeholder}}">
</div>