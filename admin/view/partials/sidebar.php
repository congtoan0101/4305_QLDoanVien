<?php
	$c = ((isset($_GET['c']) ? $_GET['c'] : 'home'));
	$ca = ((isset($_GET['c']) ? $_GET['c'] : 'home') . "-". (isset($_GET['a']) ? $_GET['a'] : 'index'));
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">DANH MỤC CHỨC NĂNG</li>
			<li class="treeview <?php echo (($c == 'home') ? 'active' : ''); ?>">
				<a href="<?php echo BASE_URL; ?>">
					<i class="fa fa-dashboard"></i> <span>Trang chủ</span>
				</a>
			</li>
			<li class="treeview <?php echo (($c == 'doanvien') ? 'active' : ''); ?>">
				<a href="<?php echo BASE_URL; ?>/doanvien">
					<i class="fa fa-users"></i> <span>Đoàn viên</span>
				</a>
			</li>
			<li class="treeview <?php echo (($c == 'taikhoan') ? 'active' : ''); ?>">
				<a href="<?php echo BASE_URL; ?>/doanvien">
					<i class="fa fa-user"></i> <span>Tài khoản</span>
					<span class="pull-right-container">
	              		<i class="fa fa-angle-left pull-right"></i>
	            	</span>
          		</a>
				<ul class="treeview-menu mn-lv-1">
					<?php if(isset($_SESSION['QUYEN']) && $_SESSION['QUYEN'] == 2) { ?>
						<li class="mn-lv-2 <?php echo (($ca == 'taikhoan-them') ? 'active' : ''); ?>"><a href="<?php echo BASE_URL; ?>/taikhoan/them"><i class="fa fa-plus"></i> Thêm mới</a></li>
					<?php } ?>
					<li class="mn-lv-2 <?php echo (($ca == 'taikhoan-doimatkhau') ? 'active' : ''); ?>"><a href="<?php echo BASE_URL; ?>/taikhoan/doimatkhau"><i class="fa fa-lock"></i> Đổi mật khẩu</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>
