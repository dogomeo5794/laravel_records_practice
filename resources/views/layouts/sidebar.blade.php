
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-dark-info">
	<!-- Brand Logo -->
	<a href="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" class="brand-link navbar-dark">
		<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
		<span class="brand-text font-weight-light" title="Brgy. E-Health Services Information System">
			<strong>Brgy. E-Health Services IS</strong>
		</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<style type="text/css">
			.sidebar .user-info {
				padding: 13px 15px 12px 15px;
				white-space: nowrap;
				position: relative;
				border-bottom: 1px solid #e9e9e9;
				background: url("{{ asset('adminlte/dist/img/user-img-background.jpg') }}") no-repeat no-repeat;
				height: 135px;
				left: -8px;
				width: 249px;
			}
			.sidebar .user-info .image {
				margin-right: 12px;
				display: inline-block;
			}

			.sidebar .user-info .info-container {
				cursor: default;
				display: block;
				position: relative;
				top: 25px;
			}
			.sidebar .user-info .image img {
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				-ms-border-radius: 50%;
				border-radius: 50%;
				vertical-align: bottom !important;
				border: 0;
			}

			.sidebar .user-info .info-container .name {
				white-space: nowrap;
				-ms-text-overflow: ellipsis;
				-o-text-overflow: ellipsis;
				text-overflow: ellipsis;
				overflow: hidden;
				font-size: 14px;
				max-width: 200px;
				color: #fff;
			}
			.sidebar .user-info .info-container .email {
				white-space: nowrap;
				-ms-text-overflow: ellipsis;
				-o-text-overflow: ellipsis;
				text-overflow: ellipsis;
				overflow: hidden;
				font-size: 12px;
				max-width: 200px;
				color: #fff;
			}
			.sidebar .user-info .info-container {
				cursor: default;
				display: block;
				position: relative;
				top: 25px;
			}

			.sidebar .user-info .info-container .user-helper-dropdown {
				position: absolute;
				right: -3px;
				bottom: -12px;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				-ms-box-shadow: none;
				box-shadow: none;
				cursor: pointer;
				color: #fff;
			}

			.sidebar .btn-group, .btn-group-vertical {
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
			}

			.sidebar .btn-group, .btn-group-vertical {
				position: relative;
				display: inline-block;
				vertical-align: middle;
			}

			.sidebar .user-info .info-container .user-helper-dropdown {

			}
			.dropdown-menu.pull-right {
				right: 0;
				left: auto;
			}
			.sidebar .dropdown-menu {
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				-ms-border-radius: 0;
				border-radius: 0;
				margin-top: -35px !important;
				box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
				border: none;
			}

			.dropdown-menu {
				position: absolute;
				top: 100%;
				left: 0;
				z-index: 1000;
				display: none;
				float: left;
				min-width: 160px;
				padding: 5px 0;
				margin: 2px 0 0;
				font-size: 14px;
				text-align: left;
				list-style: none;
				background-color: #fff;
				-webkit-background-clip: padding-box;
				background-clip: padding-box;
				border: 1px solid #ccc;
				border: 1px solid rgba(0, 0, 0, .15);
				border-radius: 4px;
				-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
				box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
			}

			.sidebar .dropdown-menu > li > a:hover {
				background-color: rgba(0, 0, 0, 0.075);
			}

			.sidebar .user-info .info-container {
				cursor: default;
				display: block;
				position: relative;
				top: 25px;
			}
			.sidebar .user-info .info-container .user-helper-dropdown {
				position: absolute;
				right: -3px;
				bottom: -12px;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				-ms-box-shadow: none;
				box-shadow: none;
				cursor: pointer;
				color: #fff;
			}

			.sidebar .dropdown-menu.custom > li > a {
				padding: 7px 18px !important;
				color: #666;
				-moz-transition: all 0.5s;
				-o-transition: all 0.5s;
				-webkit-transition: all 0.5s;
				transition: all 0.5s;
				font-size: 14px;
				line-height: 25px;
			}
			.sidebar .dropdown-menu.custom > li > a {
				display: block;
				padding: 3px 20px;
				clear: both;
				font-weight: normal;
				line-height: 1.42857143;
				color: #333 !important;
				white-space: nowrap;
			}
			.dropdown-menu.custom .waves-effect {
				position: relative;
				cursor: pointer;
				display: inline-block;
				overflow: hidden;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				-webkit-tap-highlight-color: transparent;
			}

			.sidebar .dropdown-menu.custom .divider {
				margin: 5px 0;
			}
			.sidebar .dropdown-menu.custom .divider {
				height: 1px;
				margin: 9px 0;
				overflow: hidden;
				background-color: #e5e5e5;
			}
			.sidebar .dropdown-menu.custom li a i.fas {
				margin-right: 10px;
			}

			.sidebar-collapse:not(.sidebar-closed) .sidebar .info-container {
				display: none !important;
			}
			.sidebar-collapse:not(.sidebar-closed) .sidebar .user-info {
				height: auto;
				width: 4.6rem;
			}
			.sidebar-collapse:not(.sidebar-closed) .sidebar .user-info .image {
				margin-left: -3px;
			}
			.sidebar-collapse:not(.sidebar-closed) .sidebar #profile-nav {
				display: block !important;
				border-bottom: 0.15rem solid grey;
				padding-bottom: 15px;
				margin-bottom: 15px;
			}

			.sidebar-collapse:not(.sidebar-closed) a.nav-link.profile-link-collapse {
				border: 1px solid grey;
				border-radius: 0;
			}
		</style>

		<div class="user-info">
			<div class="image">
				<img src="{{ Auth::user()->profile===null?Storage::url('uploaded/profile/default/profile.png'):Storage::url(Auth::user()->profile) }}" width="48" height="48" alt="User">
			</div>
			<div class="info-container">
				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ ucwords(Auth::user()->fullname) }}
				</div>
				<div class="email">
					[{{strtoupper(Auth::user()->role)}}] - {{ Auth::user()->email }}
				</div>
				<div class="btn-group user-helper-dropdown" 
				style="
				position: absolute;
				right: -3px;
				bottom: -12px;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				-ms-box-shadow: none;
				box-shadow: none;
				cursor: pointer;
				color: #fff;
				top: 19px;
				">
				<i class="fas fa-chevron-down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" 
				style="
				font-size: 13px;
				font-weight: 600 !important;
				"></i>
				<ul class="dropdown-menu custom pull-right" style="border-radius: 0;">
					<li>
						<a href="{{ route(Auth::user()->role=='admin'?'admin.profile':'user.profile') }}" class=" waves-effect waves-block">
							<i class="fas fa-user"></i> Profile
						</a>
					</li>
					<li role="seperator" class="divider"></li>
					@if (Route::has('app.logout')) 
					<li>
						<form id="form-logout" class="d-none" action="{{ route('app.logout') }}" method="POST">
							@csrf
						</form>
						<a href="javascript:void(0);" onclick="$('#form-logout').submit();" class=" waves-effect waves-block">
							<i class="fas fa-power-off"></i> Sign Out
						</a>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</div>


	<nav class="mt-2" id="profile-nav" style="display: none;">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{ route(Auth::user()->role=='admin'?'admin.profile':'user.profile') }}" class="nav-link profile-link-collapse" title="Profile">
					<i class="nav-icon fas fa-user"></i>
					<p>
						Profile
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="javascript:void(0);" onclick="$('#form-logout').submit();" class="nav-link profile-link-collapse" title="Sign Out">
					<i class="nav-icon fas fa-power-off"></i>
					<p>
						Sign Out
					</p>
				</a>
			</li>
		</ul>
	</nav>

	@if(Auth::user()->role == 'admin')
	<nav class="mt-2" id="list-nav">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-header">MAIN</li>
			<li class="nav-item">
				<a href="{{ route('admin.dashboard') }}" class="nav-link {{ active('admin.dashboard') }}">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>
						Dashboard
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('accounts') }}" class="nav-link {{ active('accounts') }}">
					<i class="nav-icon fas fa-users"></i>
					<p>
						Accounts
					</p>
				</a>
			</li>
			@if ( countResetPassword() )
			<li class="nav-item">
				<a href="{{ route('password.request') }}" class="nav-link {{ active('password.request') }}">
					<i class="nav-icon fas fa-lock"></i>
					<p>
						Reset Passwords
						<span class="badge badge-danger right">
							{{ countResetPassword() }} Request
						</span>
					</p>
				</a>
			</li>
			@endif
			<!-- <li class="nav-item">
				<a href="{{ route('admin.reports') }}" class="nav-link">
					<i class="nav-icon fas fa-print"></i>
					<p>
						Reports
					</p>
				</a>
			</li> -->

			<li class="nav-header">SETTINGS</li>

			<li class="nav-item">
				<a href="{{ route('admin.settings') }}" class="nav-link {{ active('admin.settings') }}">
					<i class="nav-icon fas fa-cogs"></i>
					<p>
						Settings
					</p>
				</a>
			</li>
		</ul>
	</nav>
	@else
	<nav class="mt-2" id="list-nav">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-header">MAIN</li>
			<li class="nav-item">
				<a href="{{ route('user.dashboard') }}" class="nav-link {{ active('user.dashboard') }}">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>
						Dashboard
					</p>
				</a>
			</li>
            <li class="nav-item">
				<a href="{{ route('patient.list') }}" class="nav-link {{ active('patient.list') }}">
					<i class="nav-icon fas fa-signature"></i>
					<p>
						Patient List
					</p>
				</a>
			</li>
			<li class="nav-header">CHILD</li>
			<li class="nav-item">
				<a href="{{ route('children.index') }}" class="nav-link {{ active('children.index') }}">
					<i class="nav-icon fas fa-baby"></i>
					<p>
						Child List
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('immunization.index') }}" class="nav-link {{ active('immunization.index') }}">
					<i class="nav-icon fas fa-paste"></i>
					<p>
						Immunize Records
					</p>
				</a>
			</li>
			<li class="nav-header">PARENT</li>
			<li class="nav-item">
				<a href="{{ route('pregnants.index') }}" class="nav-link {{ active('pregnants.index') }}">
					<i class="nav-icon fas fa-edit"></i>
					<p>
						Pregnant List
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('prenatal.index') }}" class="nav-link {{ active('prenatal.index') }}">
					<i class="nav-icon fas fa-lock"></i>
					<p>
						Prenatal Records
					</p>
				</a>
			</li>

			<li class="nav-header">REPORTS</li>
			<!-- <li class="nav-header">SETTINGS</li> -->

			<li class="nav-item">
				<a href="{{ route('reports.index') }}" class="nav-link {{ active('reports.index') }}">
					<i class="nav-icon fas fa-print"></i>
					<p>
						Reports
					</p>
				</a>
			</li>

			<!-- <li class="nav-item">
				<a href="/admin/settings.html" class="nav-link">
					<i class="nav-icon fas fa-cogs"></i>
					<p>
						Settings
					</p>
				</a>
			</li> -->
		</ul>
	</nav>
	@endif

</div>

</aside>
