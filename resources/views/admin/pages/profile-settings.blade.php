@extends('admin.main')
@section('title', ' | Profile Settings')
@section('css')
   <link href="/css/admin/pages/profile-settings.min.css" rel="stylesheet" type="text/css" />
   <link href="/assets/admin/layouts/layout/css/themes/{{(Auth::user()->theme) ? Auth::user()->theme : 'blue'}}.min.css" rel="stylesheet" type="text/css" id="style_color">
@endsection
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>User</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> New User Profile | Account
        <small>user account page</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="/uploads/images/{{Auth::user()->profile_pic}}" class="img-responsive profile-img" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name profile-name">  {{ Auth::user()->first_name}}  {{ Auth::user()->last_name}} </div>
                        <div class="profile-usertitle-job profile-username"> {{Auth::user()->username}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="/admin/profile">
                                    <i class="icon-home"></i> Overview </a>
                            </li>
                            <li class="active">
                                <a href="/admin/profile/settings">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="/admin/profile/help">
                                    <i class="icon-info"></i> Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37 </div>
                            <div class="uppercase profile-stat-text"> Projects </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51 </div>
                            <div class="uppercase profile-stat-text"> Tasks </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 61 </div>
                            <div class="uppercase profile-stat-text"> Uploads </div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title profile-name"></h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" method="POST" action="{{ route('update_profile', Auth::user()->id) }}" id="frm-profile">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input type="text" placeholder="First name" id="first_name" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" placeholder="Last name" id="last_name" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Username</label>
                                                <input type="text"  placeholder="Username" id="username" name="username" class="form-control" value="{{ Auth::user()->username }}"  /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Email Address</label>
                                                <input type="text"  placeholder="Email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Occupation</label>
                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">About</label>
                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Website Url</label>
                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                            <div class="margiv-top-10">
                                                <input type="submit" name="btn-submit" class="btn green" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>
                                        <form id="frm-picture" novalidate action="{{route("update_picture")}}"  enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{(Auth::user()->profile_pic) ? '/uploads/images/'.Auth::user()->profile_pic : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' }}" alt="Profile Picture" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" id="tmp_attachments" name="tmp_attachments" data-filetype='img'> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span class="margin-left-10"> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <input type="submit" name="btn-submit" class="btn green" value="Submit">
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                         <form id="frm-password" novalidate action="{{route("updatePassword", Auth::user()->id)}}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input class="form-control" type="password" value="" id="old-password" name="old-password" required data-validation-required-message="This field is required">
                                                <div class="help-block"></div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input class="form-control passwords" type="password" value="" id="new_password" name="new_password" required data-validation-required-message="This field is required" disabled>
                                                <div class="help-block"></div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input class="form-control passwords" type="password" value="" id="confirm_new_password" name="confirm_new_password"  data-validation-match-match="new_password" disabled>
                                                <div class="help-block"></div>
                                            <div class="margin-top-10">
                                                <input type="submit" class="btn green" value="Change Password" >
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        <form action="#">
                                            <table class="table table-light table-hover">
                                                <tr>
                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                    <td>
                                                        <label class="uniform-inline">
                                                            <input type="radio" name="optionsRadios1" value="option1" /> Yes </label>
                                                        <label class="uniform-inline">
                                                            <input type="radio" name="optionsRadios1" value="option2" checked/> No </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <label class="uniform-inline">
                                                            <input type="checkbox" value="" /> Yes </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <label class="uniform-inline">
                                                            <input type="checkbox" value="" /> Yes </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <label class="uniform-inline">
                                                            <input type="checkbox" value="" /> Yes </label>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--end profile-settings-->
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection

@section('js')
   <script src="/js/admin/pages/profile-settings.min.js" type="text/javascript"></script>
@endsection