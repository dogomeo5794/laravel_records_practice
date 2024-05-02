<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('head-title', 'Title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

	<!-- icheck bootstrap -->
  	<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  	<!-- Toastr -->
  	<link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style type="text/css">

	</style>

	@yield('css-file')

	@yield('css-code')

</head>
<!-- sidebar-mini layout-fixed text-sm accent-primary -->
<body class="@yield('body-class', 'sidebar-mini layout-navbar-fixed layout-fixed text-sm accent-primary')">

	@yield('main-body')

	<!-- jQuery -->
	<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>

	<!-- Bootstrap 4 -->
	<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<!-- Toastr -->
	<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
	<script src="{{ asset('js/extendjQuery.js') }}"></script>

	<script type="text/javascript">

	</script>

	@yield('script-file')

	@yield('script-code')

</body>

</html>
