@extends('layouts.joli')
@section('title', 'Video Edit')
{{--@section('link')--}}
{{--    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>--}}
{{--@endsection--}}
@section('breadcrumb')
    <ul class="breadcrumb">
        <li href="{{route('video.list')}}">Video List</li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'Video Edit')
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
                    <h3 class="panel-title">Video Edit</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('video.update', ['vid' => $vedit->id])}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Video Title" name="title" required
                                           value="{{$vedit->title}}"
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Calorie</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="number" step="0.01" min="0.01" placeholder="Calorie" name="calorie"
                                           value="{{$vedit->calorie}}" required
                                           class="form-control {{$errors->has('calorie') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('calorie'))
                                    <span class="help-block text-danger">{{$errors->first('calorie')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Title*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="instruction_title" required
                                           value="{{$vedit->instruction_title}}"
                                           class="form-control {{$errors->has('instruction_title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('instruction_title'))
                                    <span class="help-block text-danger">{{$errors->first('instruction_title')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction One*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction One" name="instructions[]" required
                                           class="form-control {{$errors->has('instructions') ? 'is-invalid' : ''}}"
                                           value="{{$vedit->instructions[0]->instruction}}">
                                </div>
                                @if($errors->has('instructions'))
                                    <span class="help-block text-danger">{{$errors->first('instructions')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Two</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Two" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 1)
                                           value="{{$vedit->instructions[1]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Three</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Three" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 2)
                                           value="{{$vedit->instructions[2]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Four</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Four" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 3)
                                           value="{{$vedit->instructions[3]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Five</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Five" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 4)
                                           value="{{$vedit->instructions[4]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Six</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Six" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 5)
                                           value="{{$vedit->instructions[5]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Seven</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Seven" name="instructions[]"
                                           class="form-control"
                                           @if(count($vedit->instructions) > 6)
                                           value="{{$vedit->instructions[6]->instruction}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <small class="help-block">* Please delete and re upload to update Thumb Image and
                                        Video *</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{route('video.list')}}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
                {{--     Form end               --}}
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
