<div class="">
    <select name="{{ $name }}" id=""  class="form-control  {{ $class }}" multiple>
        @foreach($collection as $key => $item)
      <option {{ $key==0?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
      @endforeach
    </select>
      <span class="text-danger {{ $name }}"></span>
</div>
