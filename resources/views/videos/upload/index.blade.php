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
                <form action="{{route('video.upload.store')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Category _ Sub Category*</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="sub_category_one_id" required id="SubCategory">
                                    <option selected disabled hidden value="">Choose...</option>
                                    @foreach($subCategoriesOne as $e)
                                        <option
                                            value="{{$e->id}}" {{(old('sub_category_one_id')== $e->id)?'selected':'' }}>
                                            {{$e->category_name}} _ {{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('sub_category_one_id'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('sub_category_one_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Sub Category Two*</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="sub_category_two_id" required id="SubCategory2">
                                    <option selected disabled hidden value="" id="SubCategoryC">Choose...</option>
                                    @foreach($subCategoriesTwo as $e)
                                        <option class="hideFirst sid{{$e->sub_category_one_id}}"
                                                value="{{$e->id}}" {{(old('sub_category_two_id')== $e->id)?'selected':'' }}>
                                            {{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('sub_category_two_id'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('sub_category_two_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Video Title" name="title" required
                                           value="{{old('title')}}"
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="col-md-3 col-xs-12 control-label">Instruction</label>--}}
                        {{--                            <div class="col-md-6 col-xs-12">--}}
                        {{--                                <textarea class="form-control" rows="5" name="instruction" required></textarea>--}}
                        {{--                                <script>--}}
                        {{--                                    CKEDITOR.replace('instruction');--}}
                        {{--                                </script>--}}
                        {{--                            </div>--}}
                        {{--                            @if($errors->has('instruction'))--}}
                        {{--                                <span class="help-block text-danger">{{$errors->first('instruction')}}</span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Calorie*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="number" step="0.01" min="0.01" placeholder="Calorie" name="calorie"
                                           value="{{old('calorie')}}" required
                                           class="form-control {{$errors->has('calorie') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('calorie'))
                                    <span class="help-block text-danger">{{$errors->first('calorie')}}</span>
                                @endif
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Title*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Title" name="instruction_title" required
                                           value="{{old('instruction_title')}}"
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
                                           class="form-control {{$errors->has('instructions') ? 'is-invalid' : ''}}">
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
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Three</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Three" name="instructions[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Four</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Four" name="instructions[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Five</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Five" name="instructions[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Six</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Six" name="instructions[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Instruction Seven</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Instruction Seven" name="instructions[]"
                                           class="form-control">
                                </div>
                            </div>
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
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--        <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
    <script>
        $(function () {
            $(".hideFirst").hide();
            $("#SubCategory").on('change', function () {
                $("#SubCategory2 option:selected").prop('selected', false);
                $("#SubCategoryC").prop('selected', true);
                let sid = $(this).val();
                $(".hideFirst").hide();
                $(".sid" + sid).show();
            });
        });
    </script>
@endsection
