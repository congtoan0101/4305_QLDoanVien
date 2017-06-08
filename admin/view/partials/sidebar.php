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
			<?php if(isset($_SESSION['QUYEN']) && $_SESSION['QUYEN'] == 2) { ?>
			<li class="treeview <?php echo (($c == 'taikhoan') ? 'active' : ''); ?>">
				<a href="<?php echo BASE_URL; ?>/taikhoan">
					<i class="fa fa-user"></i> <span>Tài khoản</span>
				</a>
			</li>
			<?php } ?>
			<li class="header"><?php echo $_SESSION['EMAIL']; ?></li>
			<li class="treeview">
				<a href="<?php echo BASE_URL; ?>/taikhoan/doimatkhau">
					<i class="fa fa-lock"></i> <span>Đổi mật khẩu</span>
				</a>
			</li>
			<li class="treeview">
				<a href="<?php echo BASE_URL; ?>/taikhoan/dangxuat">
					<i class="fa fa-sign-out text-danger"></i> <span class="text-danger">Đăng xuất</span>
				</a>
			</li>
		</ul>
	</section>
</aside>
