@extends('admin.main')
@section('title', 'Roles Master')
@section('css')
   <link rel="stylesheet" type="text/css" href="/css/admin/roles.min.css">
@endsection
@section('content')
   <section class="content-header">
      <h1>
         Roles Master
      </h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-dashboard"></i>Master</a></li>
         <li class="breadcrumb-item active"><i class="fa fa-user"></i>Roles</li>
      </ol>
   </section>
   <section class="content">
      <div class="col-lg-10 offset-lg-1">
         <div class="box box-default">
            <div class="box-body">
               <div class="row">
                  <div class="col-12">
                     <button type="button" class="btn btn-primary btn-create" id="btn-create-role">New Role</button>
                  </div>
                  <div class="col-12">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tbl-roles">
                           <thead>
                              <tr>
                                 <th>Role Name</th>
                                 <th>Role Description</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
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

         <div id="modal-role" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-role-label" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="modal-role-label">Role</h4>
                     <button type="button" class="close clear" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-12">
                        <form id="frm-role" class="form-horizontal" method="POST" action="{{route("roles.store")}}" enctype="multipart/form-data" novalidate="">
                        {!! csrf_field() !!}
                           <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Name<span class="text-danger">*</span></label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="role_name" name="role_name" value="{{ old('role_name') }}" required data-validation-required-message="This field is required" autofocus>
                                 <span class="help-block"><strong>{{ $errors->first('role_name') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Description<span class="text-danger">*</span></label>
                              <div class="col-md-8">
                                 <input type="text" class="form-control input" id="description" name="description" value="{{ old('description') }}" required data-validation-required-message="This field is required" autofocus>
                                 <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                              </div>
                           </div>
                           <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <div class="col-12">
                                 <input type="hidden" name="hdn_role_id" id="hdn_role_id" value="">
                                 <input type="submit" name="btn-submit" id="btn-submit-role" class="btn btn-primary waves-effect float-right btn-submit" value="Save">
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
   <script src="/js/admin/roles.min.js"></script>
@endsection