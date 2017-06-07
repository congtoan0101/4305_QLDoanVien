<script src="<?php echo BASE_URL; ?>/public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo BASE_URL; ?>/public/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL; ?>/public/plugins/select2/select2.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/AdminLTE.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/myJs.js"></script>

<script>
	$(function () {
		$('ul.sidebar-menu').find('li.mn-lv-2.active').parents('li.mn-lv-1').addClass('active');

		$('.icheck').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%'
		});

		$('#dpic-ngsinh,#dpic-ngvaodoan').datepicker({
			format: 'dd/mm/yyyy'
		});

		$(".select2").select2();
	});
</script>