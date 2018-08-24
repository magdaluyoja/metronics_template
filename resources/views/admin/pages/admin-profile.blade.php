@extends('admin.main')
@section('title', 'Admin Profile')
@section('css')
   <link rel="stylesheet" type="text/css" href="/css/admin/common.min.css">
@endsection
@section('content')
   <section class="content-header">
      <h1>
         Profile
      </h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <li class="breadcrumb-item active"><i class="fa fa-user"></i>Profile</li>
      </ol>
   </section>
   <section class="content">
      <div class="col-lg-10 offset-lg-1">
         <div class="box box-default">
            <div class="box-header with-border">
               <h3 class="box-title">My Profile</h3>

               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               </div>
            </div>
            <div class="box-body">
               <div class="row">
                  <div class="col-lg-3">
                     <div class="row">
                        <div class="col-12">
                           <img src="/uploads/images/{{(Auth::user()->profile_pic)?Auth::user()->profile_pic:"default.png"}}" id="profile-img" class="block-centered" height="100" alt="Profile Image">   
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12">
                           <form id="frm-picture" action="{{route("uploadTemp")}}" enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              <input type="hidden" name="upload_type" value="image">
                              <input type="file" name="tmp_attachments[]" id="tmp_attachments" class="inputfile">
                              <label for="tmp_attachments" class="btn btn-success block-centered" style="width: 100px;"><i class="fa fa-upload"></i> Browse</label>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-9">
                     <form id="frm-profile" novalidate action="{{route("profile.update", Auth::user()->id)}}">
                     {{ csrf_field() }}
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                           <div class="col-lg-9">
                              <input class="form-control" type="text" value="{{Auth::user()->name}}" id="name" name="name" required data-validation-required-message="This field is required">
                              <div class="help-block"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">Username</label>
                           <div class="col-lg-9">
                              <input class="form-control" type="text" value="{{Auth::user()->username}}" id="username" name="username">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">Email <span class="text-danger">*</span></label>
                           <div class="col-lg-9">
                              <input class="form-control" type="email" value="{{Auth::user()->email}}" id="email" name="email" required data-validation-required-message="Enter a valid email address">
                              <div class="help-block"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-12">
                              <input type="hidden" id="hdnAttachments" name="hdnFileName" value="{{Auth::user()->profile_pic}}">
                              <button type="submit" class="btn btn-primary float-right">Submit</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <div class="box box-default collapsed-box">
            <div class="box-header with-border">
               <h3 class="box-title">Change Password</h3>

               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
               </div>
            </div>
            <div class="box-body" style="display: none;">
               <div class="row">
                  <div class="col-lg-12">
                     <form id="frm-password" novalidate action="{{route("updatePassword", Auth::user()->id)}}">
                     {{ csrf_field() }}
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">Old Password <span class="text-danger">*</span></label>
                           <div class="col-lg-9">
                              <input class="form-control" type="password" value="" id="old-password" name="old-password" required data-validation-required-message="This field is required">
                              <div class="help-block"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">New Password</label>
                           <div class="col-lg-9">
                              <input class="form-control passwords" type="password" value="" id="new_password" name="new_password" required data-validation-required-message="This field is required" disabled>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-lg-3 col-form-label">Confirm New Password <span class="text-danger">*</span></label>
                           <div class="col-lg-9">
                              <input class="form-control passwords" type="password" value="" id="confirm_new_password" name="confirm_new_password"  data-validation-match-match="new_password" disabled>
                              <div class="help-block"></div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-12">
                              <button type="submit" class="btn btn-primary float-right">Submit</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection
@section('js')
   <script type="text/javascript"> var url = "{{ route('profile.store')}}", uploadTempUrl = "{{route("uploadTemp")}}"; </script>
   <script src="/js/admin/profile.min.js"></script>
@endsection