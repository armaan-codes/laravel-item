<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		
		<!-- Sidebar user panel -->
		<div class="user-panel">
			
			<div class="pull-left image">
				
				<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			
			</div>
			
			<div class="pull-left info">
				
				<p>Alexander Pierce</p>
				
				<a href="#">

					<i class="fa fa-circle text-success"></i> Online

				</a>
			
			</div>

		</div>

		<!-- search form (Optional) -->
		<form action="#" method="get" class="sidebar-form">
		
			<div class="input-group">
			
				<input type="text" name="q" class="form-control" placeholder="Search...">
		
				<span class="input-group-btn">
					
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
					
						<i class="fa fa-search"></i>
					
					</button>
		
				</span>
			
			</div>
		
		</form>

		<ul class="sidebar-menu" data-widget="tree">
			
			<li class="header">HEADER</li>

			<li class="active">

				<a href="{{ route('home') }}">

					<i class="fa fa-link"></i> <span>Dashboard</span>

				</a>

			</li>
			
			<li>

				<a href="{{ route('configuration') }}">

					<i class="fa fa-link"></i> <span>Configuration</span>

				</a>

			</li>

		</ul>

	</section>

</aside>