<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo BASE_URL; ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><img src="<?php echo BASE_URL; ?>/public/images/logo-DTN.png" alt="Logo Đoàn" height="40px"></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><img src="<?php echo BASE_URL; ?>/public/images/logo-DTN.png" alt="Logo Đoàn" height="40px"> - <img src="<?php echo BASE_URL; ?>/public/images/logo-tcu.png" alt="Logo Đoàn" height="40px"></span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="hidden-xs"><?php echo $_SESSION['EMAIL']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo BASE_URL; ?>/taikhoan/doimatkhau" class="btn btn-default btn-flat">Đổi mật khẩu</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo BASE_URL; ?>/taikhoan/dangxuat" class="btn btn-default btn-flat">Đăng xuất</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>