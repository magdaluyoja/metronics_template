@extends('admin.main')
@section('title', 'Users Master')
@section('css')
   <link rel="stylesheet" type="text/css" href="/css/admin/users.min.css">
@endsection
@section('content')
   <section class="content-header">
      <h1>
         Users Master
      </h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-dashboard"></i>Master</a></li>
         <li class="breadcrumb-item active"><i class="fa fa-user"></i>Users</li>
      </ol>
   </section>
   <section class="content">
      <div class="col-lg-10 offset-lg-1">
         <div class="box box-default">
            <div class="box-body">
               <div class="row">
                  <div class="col-12">
                     <button type="button" class="btn btn-primary btn-create" id="btn-create-user">New User</button>
                  </div>
                  <div class="col-12">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tbl-users">
                           <thead>
                              <tr>
                                 <th>Username</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div id="modal-user" class="modal fade" tabindex="-1" user="dialog" aria-labelledby="modal-user-label" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="modal-user-label">User</h4>
                     <button type="button" class="close clear" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-12">
                        <form id="frm-user" class="form-horizontal" method="POST" action="{{route("users.store")}}" enctype="multipart/form-data" novalidate="">
                        {!! csrf_field() !!}
                           <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Name<span class="text-danger">*</span></label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="name" name="name" value="{{ old('name') }}" required data-validation-required-message="This field is required" autofocus>
                                 <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Username</label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="username" name="username" value="{{ old('username') }}" required data-validation-required-message="This field is required" autofocus>
                                 <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">Email<span class="text-danger">*</span></label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="email" name="email" value="{{ old('email') }}" required data-validation-required-message="This field is required" autofocus>
                                 <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="div-password">
                              <label for="password" class="col-md-4 control-label">Password<span class="text-danger">*</span></label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="password" name="password" value="{{ old('password') }}" required data-validation-required-message="This field is required" autofocus readonly="">
                                 <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <div class="col-12">
                                 <input type="hidden" name="hdn_user_id" id="hdn_user_id" value="">
                                 <input type="submit" name="btn-submit" id="btn-submit-user" class="btn btn-primary waves-effect float-right btn-submit" value="Save">
                                 <button type="button" class="btn btn-warning waves-effect float-right clear" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection
@section('js')
   <script type="text/javascript"> var url = "{{ route('profile.store')}}", uploadTempUrl = "{{route("uploadTemp")}}"; </script>
   <script src="/js/admin/users.min.js"></script>
@endsection