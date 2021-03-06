@extends('layouts.joli')
@section('title', 'Video Sub Category One Edit')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Videos</li>
        <li><a href="{{route('video.sub.category.one')}}">Video Sub Category One</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'Video Sub Category One Edit')
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
                    <h3 class="panel-title">Video Sub Category One Edit</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('video.sub.category.one.update', ['cid' => $scOneedit->id])}}"
                      class="form-horizontal"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Category</label>
                            <div class="col-md-6 col-xs-12">
                                <select class="form-control" name="category_id" required>
                                    @foreach($categories as $e)
                                        <option
                                            value="{{$e->id}}" {{(old('category_id') == $e->id)?'selected':'' }}
                                            {{($e->id == $scOneedit->category_id)?'selected':''}}>
                                            {{$e->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="help-block text-danger">{{$errors->first('category_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" required value="{{$scOneedit->name}}"
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <img src="{{asset($scOneedit->thumb_img)}}" width="70" height="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Thumb Image</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="thumb_img">
                            </div>
                            @if($errors->has('thumb_img'))
                                <span class="help-block text-danger">{{$errors->first('thumb_img')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Expected Result*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="expected_result" required
                                           value="{{$scOneedit->expected_result}}"
                                           class="form-control {{$errors->has('expected_result') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('expected_result'))
                                    <span class="help-block text-danger">{{$errors->first('expected_result')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bullet Point One*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$scOneedit->bullet_point_one}}" name="bullet_points[]"
                                           required
                                           class="form-control {{$errors->has('bullet_points') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('bullet_points'))
                                    <span class="help-block text-danger">{{$errors->first('bullet_points')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bullet Point Two</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$scOneedit->bullet_point_two}}" name="bullet_points[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bullet Point Three</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$scOneedit->bullet_point_three}}" name="bullet_points[]"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <img src="{{asset($scOneedit->male_img)}}" width="70" height="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Male Image*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="male_img">
                            </div>
                            @if($errors->has('male_img'))
                                <span class="help-block text-danger">{{$errors->first('male_img')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Male Image Description*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$scOneedit->male_image_description}}"
                                           name="male_image_description" required
                                           class="form-control {{$errors->has('male_image_description') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('male_image_description'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('male_image_description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <img src="{{asset($scOneedit->male_img_2)}}" width="70" height="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Male Image 2*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="male_img_2">
                            </div>
                            @if($errors->has('male_img_2'))
                                <span class="help-block text-danger">{{$errors->first('male_img_2')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Male Image Description 2*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$scOneedit->male_image_description_2}}"
                                           name="male_image_description_2" required
                                           class="form-control {{$errors->has('male_image_description_2') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('male_image_description_2'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('male_image_description_2')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <img src="{{asset($scOneedit->female_img)}}" width="70" height="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Female Image*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="female_img">
                            </div>
                            @if($errors->has('female_img'))
                                <span class="help-block text-danger">{{$errors->first('female_img')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Female Image Description*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="female_image_description" required
                                           value="{{$scOneedit->female_image_description}}"
                                           class="form-control {{$errors->has('female_image_description') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('female_image_description'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('female_image_description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <img src="{{asset($scOneedit->female_img_2)}}" width="70" height="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Female Image 2*</label>
                            <div class="col-md-6 col-xs-12">
                                <input type="file" name="female_img_2">
                            </div>
                            @if($errors->has('female_img_2'))
                                <span class="help-block text-danger">{{$errors->first('female_img_2')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Female Image Description 2*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="female_image_description_2" required
                                           value="{{$scOneedit->female_image_description_2}}"
                                           class="form-control {{$errors->has('female_image_description_2') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('female_image_description_2'))
                                    <span
                                        class="help-block text-danger">{{$errors->first('female_image_description_2')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Video Sub Categories One</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Expected Result</th>
                            <th>Thumb</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategoriesOne as $i => $c)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$c->category_name}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->expected_result}}</td>
                                <td>
                                    <img src="{{asset($c->thumb_img)}}" width="50" height="50">
                                </td>
                                <td>
                                    @if($c->id != $scOneedit->id)
                                        <a href="{{route('video.sub.category.one.edit', ['cid' => $c->id])}}"
                                           class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                        <form action="{{route('video.sub.category.one.delete', ['cid' => $c->id])}}"
                                              method="POST" style="display: inline-table;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger m-1"
                                                    onclick="return confirm('Are you sure you want to delete the Video Sub Category One ?')">
                                                [[ <i class="fa fa-trash-o"></i> ]]
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{route('video.sub.category.one.edit', ['cid' => $c->id])}}"
                                           class="btn btn-sm btn-success m-1 disabled"><span
                                                class="fa fa-pencil"></span></a>
                                        <a href="#" class="btn btn-sm btn-danger m-1 disabled"><i
                                                class="fa fa-trash-o"></i></a>
                                    @endif

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

