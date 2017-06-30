<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập | Quản lý Đoàn viên | Trường ĐH Thông tin Liên lạc</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php $this->load->view('partials/styles'); ?>
</head>
<body class="hold-transition login-page">
	<div class="login-box" style="margin: 5% auto;">
		<div class="login-logo">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-tcu.png" alt="" style="display: block;width: 80px;margin: 5px auto;">QUẢN LÝ ĐOÀN VIÊN</a>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">
				- Đăng nhập vào hệ thống -
			</p>
			<form onsubmit="App.TaiKhoan.DangNhap();return false;" id="frmDangNhap">
				<div class="form-group has-feedback">
					<input type="text" name="TENDANGNHAP" class="form-control" placeholder="Tên đăng nhập" autocomplete="off">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="MATKHAU" class="form-control" placeholder="Mật khẩu">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<div id="ajaxLoadingBar"></div>
					<div id="errDangNhap" class="text-danger" style="display: none;"></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<input type="submit" value="Đăng nhập" class="btn btn-primary btn-block btn-flat">
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- JAVASCRIPTS -->
	<?php $this->load->view('partials/javascripts'); ?>
</body>
</html>