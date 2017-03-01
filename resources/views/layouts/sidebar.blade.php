 <!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="/images/{{Auth::user()->image_url}}" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>{{Auth::user()->name}}</p>
				</div>
			</div>

			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				@if(Auth::user()->hasRole('client') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-male"></i> <span>Clients</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/clients/create"><i class="fa fa-circle-o"></i> Add Client</a></li>
						<li><a href="/clients"><i class="fa fa-circle-o"></i> Manage Clients</a></li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('product') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-suitcase"></i> <span>Products</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/products/create"><i class="fa fa-circle-o"></i>Add Product</a></li>
						<li><a href="/products"><i class="fa fa-circle-o"></i> Manage Products</a></li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('labour') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-group"></i> <span>Labours</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/labours/create"><i class="fa fa-circle-o"></i>Add Labour</a></li>
						<li><a href="/labours"><i class="fa fa-circle-o"></i> Manage Labours</a></li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('quote') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-sticky-note-o"></i> <span>Quote</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/quote/create"><i class="fa fa-circle-o"></i>Generate quote</a></li>
						<li><a href="/quote"><i class="fa fa-circle-o"></i> Manage Quote</a></li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('invoice') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-file-text"></i> <span>Invoice</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/invoice/create"><i class="fa fa-circle-o"></i>Generate Invoice</a></li>
						<li><a href="/invoice"><i class="fa fa-circle-o"></i> Manage Invoice</a></li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin'))
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i> <span>Users</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/users/create"><i class="fa fa-circle-o"></i>Add User</a></li>
						<li><a href="/users"><i class="fa fa-circle-o"></i> Manage Users</a></li>
					</ul>
				</li>
				@endif
				
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
