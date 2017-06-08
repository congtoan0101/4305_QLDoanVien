<section class="content">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Tài khoản <small> - Trang quản lý</small></h3>
		</div>
		<!-- Main content -->
		<div class="box-body">
			<div class="row">
				<div class="col-xs-12">
					<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalThemTK"><i class="fa fa-plus"></i> Thêm mới</button>
				</div>
				
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div id="modalThemTK" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thêm tài khoản</h4>
			</div>
			<div class="modal-body" style="padding: 15px;">
				<form id="frmThemSV" enctype="multipart/form-data">
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="EMAIL" placeholder="Nhập email">
					</div>
					<div class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" name="MATKHAU" placeholder="Nhập mật khẩu">
					</div>
					<div class="form-group">
						<label>Phân quyền</label>
						<select name="QUYEN" class="form-control select2" style="width: 100%;">
							<option selected value="1">Admin</option>
							<option value="2">Super Admin</option>
						</select>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<div class="radio-group">
							<label>
								<input type="radio" name="TRANGTHAI" class="minimal-blue icheck" value="1" checked>
								<span class="text-success">Hoạt động</span>
							</label>
							<label style="padding-left: 40px;">
								<input type="radio" name="TRANGTHAI" class="minimal-blue icheck" value="0">
								<span class="text-danger">Tạm khóa</span>
							</label>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row" style="margin: 0px;">
					<div id="errThemTK" class="pull-right" style="display: none;margin-bottom: 10px;">2222</div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="button" class="btn btn-success btn-flat" onclick="ThemTK();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>