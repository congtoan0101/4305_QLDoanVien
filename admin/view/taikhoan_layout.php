<?php $this->view = $this; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo ((isset($metaTitle) && !empty($metaTitle)) ? $metaTitle . ' | ' : '') . 'Quản lý Đoàn viên | TCU'; ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<?php $this->view->load('partials/css') ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/public/img/logo-tcu.png" alt="" style="display: block;width: 80px;margin: 5px auto;">QUẢN LÝ ĐOÀN VIÊN</a>
	</div>
	<div class="login-box-body">

		<?php if(isset($contentView)) $this->view->load($contentView, $data); else echo 'Please set $contentView'; ?>

	</div>
</div>

<?php $this->view->load('partials/js') ?>

</body>
</html>