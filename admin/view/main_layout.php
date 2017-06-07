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
<body class="hold-transition skin-blue sidebar-mini">

	<?php $this->view->load('partials/header') ?>

	<?php $this->view->load('partials/sidebar') ?>
	
	<div class="content-wrapper">
		<?php if(isset($contentView)) $this->view->load($contentView, $data); else echo 'Please set $contentView'; ?>
	</div>
	<?php $this->view->load('partials/footer') ?>

	<?php $this->view->load('partials/js') ?>

</body>
</html>