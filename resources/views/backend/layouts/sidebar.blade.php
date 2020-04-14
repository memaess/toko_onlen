<!-- Sidebar -->
<div class="sidebar">
	<!-- Sidebar user (optional) -->
	<div class="user-panel mt-3 pb-3 d-flex">
		<div class="image">
			<img src="{{ asset('') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info ml-2">
			<a href="#" class="d-block">{{ !auth()->user() ? 'Admin' : auth()->user()->first_name }}</a>
		</div>
	</div>
	
	<nav class="mt-1">
		<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
					<i class="nav-icon fa fa-sign-out-alt"></i>
					<p>
						Keluar
					</p>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</nav>

	<div class="user-panel pb-3 mb-3 d-flex" style="margin-top: -16px;">
	</div>

	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="../gallery.html" class="nav-link active">
					<i class="nav-icon fa fa-home"></i>
					<p>
						Dashboard
					</p>
				</a>
			</li>
			{{-- <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fa fa-user"></i>
					<p>
						Admin Menu
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('users.index') }}" class="nav-link">
							<i class="fa fa-chevron-right nav-icon"></i>
							<p>Data User</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fa fa-bus"></i>
					<p>
						Tur Menu
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('type.index') }}" class="nav-link">
							<i class="fa fa-chevron-right nav-icon"></i>
							<p>Data Jenis Tur</p>
						</a>
					</li>
				</ul>
			</li> --}}
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->