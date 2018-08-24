@extends('admin.main')
@section('title', 'Admin | Dashboard')
@section('css')
   <link href="/css/admin/pages/dashboard.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <div class="page-bar">
         <ul class="page-breadcrumb">
             <li>
                 <a href="index.html">Home</a>
                 <i class="fa fa-circle"></i>
             </li>
             <li>
                 <span>Page Layouts</span>
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
     <h3 class="page-title"> Blank Page Layout
         <small>blank page layout</small>
     </h3>
     <!-- END PAGE TITLE-->
     <!-- END PAGE HEADER-->
     <div class="note note-info">
         <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
     </div>
@endsection

@section('js')
   <script src="/js/admin/pages/dashboard.min.js" type="text/javascript"></script>
@endsection