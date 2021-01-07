@extends('layouts.joli')
@section('title', 'Video List')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Videos</li>
        <li class="active">List</li>
    </ul>
@endsection
@section('pageTitle', 'Video List')
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Videos</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Length</th>
                            <th>Calorie</th>
                            <th>Instruction</th>
                            <th>Action</th>
                            <th>Thumb</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $i => $v)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$v->category_name}}</td>
                                <td>{{$v->title}}</td>
                                <td>{{$v->length}}</td>
                                <td>{{$v->calorie}}</td>
                                <td>{!! $v->instruction !!}</td>
                                <td>
                                    <a href="{{route('video.play', ['vid' => $v->id])}}"
                                       class="btn btn-sm btn-info m-1" target="_blank"><span
                                            class="fa fa-play"></span></a>
                                    <a href="{{route('video.edit', ['vid' => $v->id])}}"
                                       class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                    <form action="{{route('video.delete', ['vid' => $v->id])}}" method="POST"
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
                                    <video width="144" height="108" controls>
                                        <source src="{{URL::asset("$v->video")}}" type="video/mp4">
                                    </video>
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

