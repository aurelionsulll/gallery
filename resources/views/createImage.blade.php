@extends('layouts.app')
@section('content')
{{--<form action="{{url('/createImage')}}" method="post">--}}
{{--    @csrf--}}
{{--   <div class="col-md-6">--}}
{{--       <div class="form-group">--}}
{{--           <label for="path">Image</label>--}}
{{--           <input type="text" name="path" class="form-control" id="path">--}}
{{--       </div>--}}
{{--       <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--   </div>--}}
{{--</form>--}}
<div id="appp">
    <image-page></image-page>
</div>
@stop
<script src="{{asset('js/app.js')}}"></script>
{{--<script>--}}
{{--    window.Laravel={!! json_encode([--}}
{{--    'csrftoken'   =>csrf_token(),--}}
{{--    'url'    =>url('/')--}}
{{--    ])!!};--}}
{{--</script>--}}
