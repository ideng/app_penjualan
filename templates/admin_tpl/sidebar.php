<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<?php
		$page = filter_input(INPUT_GET, 'p');
		?>
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li <?php echo empty($page) || $page == 'dashboard'?'class=\'active\'':''; ?>>
				<a href="dashboard/">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="treeview <?php echo $page == 'data_admin'|| $page == 'tipe_admin'?'active':''; ?>">
				<a href="#">
					<i class="fa fa-users"></i> <span>Administrator</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?php echo $page == 'data_admin'?'class=\'active\'':''; ?>>
						<a href="administrator/data_admin"><i class="fa fa-circle-o"></i> Data Admin</a>
					</li>
					<li <?php echo $page == 'tipe_admin'?'class=\'active\'':''; ?>>
						<a href="administrator/tipe_admin"><i class="fa fa-circle-o"></i> Tipe Admin</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo $page == 'tipe_product'|| $page == 'data_product'?'active':''; ?>">
				<a href="#">
					<i class="fa fa-tags"></i> <span>Manage Product</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?php echo $page == 'tipe_product'?'class=\'active\'':''; ?>>
						<a href="manage_product/tipe_product"><i class="fa fa-circle-o"></i> Tipe Product</a>
					</li>
					<li <?php echo $page == 'data_product'?'class=\'active\'':''; ?>>
						<a href="manage_product/data_product"><i class="fa fa-circle-o"></i> Data Product</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo $page == 'data_warehouse'|| $page == 'data_rak' || $page == 'penerimaan_barang' || $page == 'pengeluaran_barang'?'active':''; ?>">
				<a href="#">
					<i class="fa fa-database"></i> <span>Inventory</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?php echo $page == 'data_warehouse'?'class=\'active\'':''; ?>>
						<a href="inventory/data_warehouse"><i class="fa fa-circle-o"></i> Data Werehouse</a>
					</li>
					<li <?php echo $page == 'data_rak'?'class=\'active\'':''; ?>>
						<a href="inventory/data_rak"><i class="fa fa-circle-o"></i> Data Rak</a>
					</li>
					<li <?php echo $page == 'penerimaan_barang'?'class=\'active\'':''; ?>>
						<a href="inventory/penerimaan_barang"><i class="fa fa-circle-o"></i> Penerimaan Barang</a>
					</li>
					<li <?php echo $page == 'pengeluaran_barang'?'class=\'active\'':''; ?>>
						<a href="inventory/pengeluaran_barang"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a>
					</li>

				</ul>
			</li>
			<li <?php echo $page == 'logout'?'class=\'active\'':''; ?>>
				<a href="logout/">
					<i class="fa fa-sign-out"></i> <span>Logout</span> 
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>