@extends('layouts.joli')
@section('title', 'Music Upload')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Music Upload</li>
    </ul>
@endsection
@section('pageTitle', 'Music Upload')
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
                    <h3 class="panel-title">Music Upload</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('music.upload.store')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Music Title" name="title" required
                                           value="{{old('title')}}"
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Music</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="music" required>
                            </div>
                            @if($errors->has('music'))
                                <span class="help-block text-danger">{{$errors->first('music')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Thumb Image</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="thumb_img" required>
                            </div>
                            @if($errors->has('thumb_img'))
                                <span class="help-block text-danger">{{$errors->first('thumb_img')}}</span>
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
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Music List</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Length</th>
                            <th>Action</th>
                            <th>Music</th>
                            <th>Thumb</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($musics as $i => $m)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$m->title}}</td>
                                <td>{{$m->length}}</td>
                                <td>
                                    <a href="{{route('music.edit', ['mid' => $m->id])}}"
                                       class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                    <form action="{{route('music.delete', ['mid' => $m->id])}}" method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                onclick="return confirm('Are you sure you want to delete the Video?')">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <audio controls>
                                        <source src='{{URL::asset("$m->music")}}' type='audio/mp3'>
                                    </audio>
                                </td>
                                <td>
                                    <img src="{{asset($m->thumb_img)}}" width="70" height="70">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--        <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection
