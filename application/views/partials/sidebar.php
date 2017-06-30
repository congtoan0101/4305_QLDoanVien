<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">DANH MỤC MENU</li>
			
			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='home'))?'active':''; ?>">
				<a href="<?php echo base_url(); ?>">
					<i class="fa fa-dashboard"></i> <span>Trang chủ</span>
				</a>
			</li>
	
			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='doanvien'))?'active':''; ?>">
				<a href="<?php echo base_url('doanvien'); ?>">
					<i class="fa fa-users"></i> <span>Đoàn viên</span>
				</a>
			</li>
			
			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='chidoan'))?'active':''; ?>">
				<a href="<?php echo base_url('chidoan'); ?>">
					<i class="fa fa-building"></i> <span>Chi đoàn</span>
				</a>
			</li>
			
			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='doancs'))?'active':''; ?>">
				<a href="<?php echo base_url('doancs'); ?>">
					<i class="fa fa-university"></i> <span>Đoàn cơ sở</span>
				</a>
			</li>
			
			<!-- <li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='taikhoan'))?'active':''; ?>">
				<a href="<?php echo base_url('taikhoan'); ?>">
					<i class="fa fa-database"></i> <span>Tài khoản</span>
				</a>
			</li>

			<li class="header">admin@admin.com</li>

			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='taikhoan/doimatkhau'))?'active':''; ?>">
				<a href="<?php echo base_url('taikhoan/doimatkhau'); ?>">
					<i class="fa fa-lock"></i> <span>Đổi mật khẩu</span>
				</a>
			</li>

			<li class="treeview <?php echo ((isset($sb_page))&&($sb_page=='taikhoan/thoat'))?'active':''; ?>">
				<a href="<?php echo base_url('taikhoan/thoat'); ?>">
					<i class="fa fa-sign-out text-danger"></i> <span class="text-danger">Thoát</span>
				</a>
			</li> -->
		</ul>
	</section>
</aside>
