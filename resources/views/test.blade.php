@extends('layouts.joli')
@section('title', 'Video Upload')
{{--@section('link')--}}
{{--    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>--}}
{{--@endsection--}}
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Video Upload</li>
    </ul>
@endsection
@section('pageTitle', 'Video Upload')
@section('content')
    <div class="row mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @endif
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Video Upload</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('testPost')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Thumb Image*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="thumb_img" required>
                            </div>
                            @if($errors->has('thumb_img'))
                                <span class="help-block text-danger">{{$errors->first('thumb_img')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Video*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="video" required>
                            </div>
                            @if($errors->has('video'))
                                <span class="help-block text-danger">{{$errors->first('video')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Upload</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
