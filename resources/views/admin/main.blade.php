<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<head>
	    @include('admin._layout._head')
        @yield('css')
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">

		@include('admin._layout._header')

		<div class="clearfix"> </div>

		<div class="page-container">
			@include('admin._layout._sidebar')
			<div class="page-content-wrapper">
                <div class="page-content">
                	@include('admin._layout._theme-panel')
                	@include('admin._partials._messages')
					@yield('content')
					@include('admin._partials._loading')
                </div>
            </div>
            @include('admin._layout._quick-sidebar')
		</div>

		@include('admin._layout._footer')
        @yield('js')
	</body>
</html>