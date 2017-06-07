<p class="login-box-msg">Đăng nhập vào hệ thống</p>
<form id="frmDangNhap">
	<div class="form-group has-feedback">
		<input type="email" name="Email" class="form-control" placeholder="Email">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<input type="password" name="MatKhau" class="form-control" placeholder="Mật khẩu">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	</div>
	
	<div class="row">
		<div class="col-xs-8">
			<div class="checkbox icheck">
				<label>
					<input type="checkbox" name="NhoMatKhau"> Ghi nhớ mật khẩu
				</label>
			</div>
		</div>
		<div class="col-xs-4">
			<button class="btn btn-primary btn-block btn-flat" onclick="DangNhap();return false;">Đăng nhập</button>
		</div>
	</div>
</form>
<div id="errDangNhap" style="display: none;"></div>
<div id="ajaxLoadingBar" style="display: none;"></div>
<hr>
<a href="<?php echo BASE_URL; ?>/taikhoan/quenmatkhau">Quên mật khẩu?</a>