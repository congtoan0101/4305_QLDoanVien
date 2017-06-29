<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo (!empty($metaTitle) ? $metaTitle.' | ' : ''); ?>Quản lý Đoàn viên | Trường ĐH Thông tin Liên lạc</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php $this->load->view('partials/styles'); ?>
</head>
<body class="hold-transition skin-green sidebar-mini<?php echo (($this->session->has_userdata('SideBar') && $this->session->userdata('SideBar') != 0) ? ' sidebar-collapse' : '');?>">
	<div class="wrapper">
		<?php $this->load->view('partials/header'); ?>
		<?php $this->load->view('partials/sidebar'); ?>
		<div class="content-wrapper">
			<?php if(isset($mainContent)) $this->load->view($mainContent);else echo 'Chưa thiết lập views cho chức năng này.'; ?>
		</div>
		<?php $this->load->view('partials/footer'); ?>
	</div>
	<!-- JAVASCRIPTS -->
	<?php $this->load->view('partials/javascripts'); ?>
</body>
</html>