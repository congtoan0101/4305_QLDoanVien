<section class="content">
	<div class="box box-success">
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
			<div class="row" style="margin-top: 15px;">
				<div class="col-xs-12">
					<table class="table table-bordered">
						<tr class="text-success">
							<th class="text-center">STT</th>
							<th class="text-center">Tên đăng nhập</th>
							<th class="text-center">Quyền</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center">Chức năng</th>
						</tr>
					<?php if (isset($listTK) && !empty($listTK)): ?>
					<?php foreach ($listTK as $i => $item) { ?>
						<tr>
							<td class="text-center"><?php echo $i + 1; ?></td>
							<td><strong><?php echo $item['TENDANGNHAP']; ?></strong></td>
							<td class="text-center"><?php echo (($item['QUYEN'] == 2) ? '<span class="text-success">Quản lý hệ thống</span>' : (($item['QUYEN'] == 1) ? '<span class="text-warning">Quản lý đoàn cơ sở</span>' : '<span class="text-danger">Quản lý chi đoàn</span>')); ?></td>
							<td class="text-center"><?php echo (($item['TRANGTHAI'] == 1) ? '<span class="text-success">Đang hoạt động</span>' : '<span class="text-danger">Tạm khóa</span>'); ?></td>
							<td class="text-center">
								<button disabled class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Sửa</button>
								<button disabled class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i> Xóa</button>
							</td>
						</tr>
					<?php } ?>
					<?php endif ?>
					</table>
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
				<form id="frmThemTK" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" class="form-control" name="TENDANGNHAP" placeholder="Nhập tên đăng nhập">
					</div>
					<div class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" name="MATKHAU" placeholder="Nhập mật khẩu">
					</div>
					<div class="form-group">
						<label>Nhập lại mật khẩu</label>
						<input type="password" class="form-control" name="NHAPLAIMATKHAU" placeholder="Nhập lại mật khẩu">
					</div>
					<div class="form-group">
						<label>Phân quyền</label>
						<select name="QUYEN" class="form-control select2" style="width: 100%;">
							<option selected value="0">Quản lý chi đoàn</option>
							<option value="1">Quản lý đoàn cơ sở</option>
							<option value="2">Quản lý hệ thống</option>
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
					<div id="errThemTK" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="button" class="btn btn-success btn-flat" onclick="App.TaiKhoan.ThemTK();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>