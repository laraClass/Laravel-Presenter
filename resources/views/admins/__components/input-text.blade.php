<input  name="{{$name}}"  type="{{isset($type) ? $type : 'text'}}" class="form-control"
        placeholder="{{isset($placeholder) ? $placeholder : ''}}"
        value="{{ (isset($value)) ? old($name, $value ) :  old($name)}}">
@error($name)
<p class="text-dark">{{$message}}</p>
@enderror


<script>

</script>
