@extends('layouts.joli')
@section('title', 'User Edit')
@section('link')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li><a href="{{route('users')}}">User</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'User Edit')
@section('content')
    <div class="row mb-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Base Settings</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('user.update', ['uid' => $uedit->id])}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$uedit->name}}" name="name" required
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                    <input type="email" value="{{$uedit->email}}" name="email" required
                                           class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('email'))
                                    <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" placeholder="Password" name="password"
                                           class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('password'))
                                    <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" placeholder="Password Confirmation"
                                           name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                        @if(($redits[0]->id) != 1)
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label padding-top-0">Role</label>
                                <div class="col-md-6 col-xs-12">
                                    @if($errors->has('roles'))
                                        <span
                                            class="help-block text-danger"><strong>Please select at least a Role</strong></span>
                                    @endif
                                    @foreach($roles as $role)
                                        <div class="form-check form-check-inline d-block">
                                            <input class="form-check-input" type="checkbox" value="{{$role->id}}"
                                                   name="roles[]"
                                                   @foreach($redits as $pe)
                                                   @if(($pe->id * 1) == ($role->id * 1))
                                                   checked
                                                @break
                                                @endif
                                                @endforeach
                                            >
                                            <label class="text-secondary">{{$role->display_name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
        @if($uedit->id > 3)
            <div class="col-lg-8 offset-lg-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Details Settings</h3>
                    </div>
                    {{--     Form Start              --}}
                    <form action="{{route('account.settings.update.info', ['uid' => $uedit->id])}}"
                          class="form-horizontal"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="1" name="is_designation">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Date of Birth</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" name="date_of_birth"
                                               @if($uinfo->date_of_birth)
                                               value="{{$uinfo->date_of_birth}}"
                                            @endif >
                                    </div>
                                    <span class="help-block">Click on input field to open calender</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-phone"></span></span>
                                        <input type="text" name="mobile_1" class="form-control"
                                               value="{{$uinfo->mobile_1}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Telephone</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                        <input type="text" name="mobile_2" class="form-control"
                                               value="{{$uinfo->mobile_2}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Designation</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="job_title" class="form-control"
                                               value="{{$uinfo->job_title}}" list="designationDatalist">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Job Description</label>
                                <div class="col-md-6 col-xs-12">
                                <textarea class="form-control" rows="5" name="job_description">
                                    {!! $uinfo->job_description !!}
                                </textarea>
                                    <script>
                                        CKEDITOR.replace('job_description');
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Skills</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    <span class="input-group-addon"><span
                                            class="fa fa-lightbulb-o"></span></span>
                                        <input type="text" name="skills" class="form-control"
                                               value="{{$uinfo->skills}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-6 col-xs-12">
                                <textarea class="form-control" rows="5" name="address">
                                    {!! $uinfo->address !!}
                                </textarea>
                                    <script>
                                        CKEDITOR.replace('address');
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employment History</label>
                                <div class="col-md-6 col-xs-12">
                                <textarea class="form-control" rows="5" name="employment">
                                    {!! $uinfo->employment !!}
                                </textarea>
                                    <script>
                                        CKEDITOR.replace('employment');
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Education</label>
                                <div class="col-md-6 col-xs-12">
                                <textarea class="form-control" rows="5" name="education">
                                    {!! $uinfo->education !!}
                                </textarea>
                                    <script>
                                        CKEDITOR.replace('education');
                                    </script>
                                </div>
                            </div>
                            {{--                        <div class="form-group">--}}
                            {{--                            <label class="col-md-3 col-xs-12 control-label">Upload Resume</label>--}}
                            {{--                            <div class="col-md-6 col-xs-12">--}}
                            {{--                                <input type="file" name="cv">--}}
                            {{--                            </div>--}}
                            {{--                        </div>  --}}
                            @if($uedit->profile_photo_path)
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label"></label>
                                    <div class="col-md-6 col-xs-12 profile-image">
                                        <img src="{{asset($uedit->profile_photo_path)}}" alt="Profile Image"
                                             style="max-height: 100px;">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Image</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="image">
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
        @endif
    </div>
    <datalist id="designationDatalist">
        @forelse($datalist['designation'] as $m)
            <option value="{{$m->job_title}}">
        @empty
        @endforelse
    </datalist>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection
