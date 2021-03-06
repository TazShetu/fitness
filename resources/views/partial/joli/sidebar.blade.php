<div class="page-sidebar">

    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{url('/')}}" style="background-color:#1caf9a;">
                Twinbit
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{asset('joli/avatar.png')}}" alt="Full Name">
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img
                        src="
                    @if(Auth::user()->profile_photo_path)
                        {{asset(Auth::user()->profile_photo_path)}}
                        @else
                        {{asset('joli/avatar.png')}}
                        @endif
                            " alt="Profile Image">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->name}}</div>
                </div>
            </div>
        </li>
        <li>
            <a href="{{route('dashboard')}}"><span class="glyphicon glyphicon-home"></span> <span
                    class="xn-text">Dashboard</span></a>
        </li>
        @permission('permission|role|user')
        <li class="xn-openable">
            <a href="#"><span class="glyphicon glyphicon-transfer"></span> <span class="xn-text"> ACL</span></a>
            <ul>
                @permission('permission')
                <li><a href="{{route('permission')}}"><i class="glyphicon glyphicon-minus"></i> Permissions</a></li>
                @endpermission
                @permission('role')
                <li><a href="{{route('role')}}"><i class="glyphicon glyphicon-minus"></i> Roles</a></li>
                @endpermission
                @permission('user')
                <li><a href="{{route('users')}}"><i class="glyphicon glyphicon-minus"></i> Users</a>
                </li>
                @endpermission
            </ul>
        </li>
        @endpermission
        @permission('video_category|video_sub_category_one|video_sub_category_two|video')
        <li class="xn-openable">
            <a href="#"><span class="fa fa-youtube-play"></span> <span class="xn-text"> Videos</span></a>
            <ul>
                @permission('video_category')
                <li><a href="{{route('video.category')}}"><i class="glyphicon glyphicon-minus"></i> Category</a></li>
                @endpermission
                @permission('video_sub_category_one')
                <li><a href="{{route('video.sub.category.one')}}"><i class="glyphicon glyphicon-minus"></i> Sub Category
                        One</a></li>
                @endpermission
                @permission('video_sub_category_two')
                <li><a href="{{route('video.sub.category.two')}}"><i class="glyphicon glyphicon-minus"></i> Sub Category
                        Two</a></li>
                @endpermission
                @permission('video')
                <li><a href="{{route('video.upload')}}"><i class="glyphicon glyphicon-minus"></i> Upload</a></li>
                <li><a href="{{route('video.list')}}"><i class="glyphicon glyphicon-minus"></i> List</a></li>
                @endpermission
            </ul>
        </li>
        @endpermission
        @permission('music')
        <li class="xn-openable">
            <a href="#"><span class="fa fa-music"></span> <span class="xn-text"> Music</span></a>
            <ul>
                <li><a href="{{route('music.upload')}}"><i class="glyphicon glyphicon-minus"></i> Music</a></li>
            </ul>
        </li>
        @endpermission


    </ul>
</div>
