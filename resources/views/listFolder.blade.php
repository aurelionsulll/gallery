@extends('layouts.app')
@section('content')
<div class="container">
{{--        @foreach($folders  as $folder)--}}
{{--            <div style="width: 200px;text-align: center" class="float-left">--}}
{{--                <a href="{{url('folderImage/'.$folder->id.'/')}}">--}}
{{--                    <i class="fas fa-folder" style="font-size: 100px"></i>--}}
{{--                    <br>--}}
{{--                    <p style="font-size: 16px">{{$folder->name}}</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    <div id="appp">
        <folder-page></folder-page>
    </div>
</div>
@stop
