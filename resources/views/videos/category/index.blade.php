@extends('layouts.joli')
@section('title', 'Video Category')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Videos</li>
        <li class="active">Category</li>
    </ul>
@endsection
@section('pageTitle', 'Video Category')
@section('content')
    <div class="row mb-5">
        @if(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Video Category Create</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('video.category.store')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Video Category Name" name="name" required
                                           value="{{old('name')}}"
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Video Category Description" name="description"
                                           value="{{old('description')}}"
                                           class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('description'))
                                    <span class="help-block text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Create</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Video Categories</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $i => $c)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$c->name}}</td>
                                <td>{{$c->description}}</td>
                                <td>
                                    <a href="{{route('video.category.edit', ['cid' => $c->id])}}"
                                       class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                    <form action="{{route('video.category.delete', ['cid' => $c->id])}}" method="POST"
                                          style="display: inline-table;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                onclick="return confirm('Are you sure you want to delete the Video Category ?')">
                                            [[ <i class="fa fa-trash-o"></i> ]]
                                        </button>
                                    </form>
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
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection

