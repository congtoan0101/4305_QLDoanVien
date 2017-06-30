<div id="content-DoanVien">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Quản lý Đoàn viên <small> - Trang chính</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalThemDV"><i class="fa fa-plus"></i> Thêm mới</button>
					</div>
					
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div id="modalThemDV" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thêm Đoàn viên</h4>
			</div>
			<div class="modal-body" style="padding: 15px;">
				<form id="frmThemSV" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Mã Đoàn viên (mã số sinh viên)</label>
								<input type="text" class="form-control" name="MaDV" placeholder="Mã Đoàn viên (mã số sinh viên)">
							</div>
							<div class="row">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Họ và tên đệm</label>
										<input type="text" class="form-control" name="HoDV" placeholder="Họ và tên đệm">
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label>Tên</label>
										<input type="text" class="form-control" name="TenDV" placeholder="Tên">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Ngày sinh</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" name="NgaySinh" id="dpic-ngsinh">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Giới tính</label>
										<div class="radio-group">
											<label>
												<input type="radio" name="GioiTinh" class="minimal-blue icheck" value="1" checked>
												Nam
											</label>
											<label style="padding-left: 40px;">
												<input type="radio" name="GioiTinh" class="minimal-blue icheck" value="0">
												Nữ
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Quê quán</label>
								<input type="text" class="form-control" name="QueQuan" placeholder="Quê quán">
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label>Ngày vào Đoàn</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" name="NgayVaoDoan" id="dpic-ngvaodoan">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Chi đoàn</label>
								<select name="MaCD" class="form-control select2" style="width: 100%;">
									<option selected="selected">Chọn Chi đoàn</option>
									<optgroup label="Công nghệ thông tin">
										<option>ĐHCN1A</option>
										<option>ĐHCN1B</option>
									</optgroup>
									<optgroup label="Kỹ thuật viễn thông">
										<option>ĐHVT1A</option>
										<option>ĐHVT1B</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label>Chức vụ</label>
								<select name="ChucVu" class="form-control select2" style="width: 100%;">
									<option value="0" selected="selected">Chọn chức vụ</option>
									<option selected>Đoàn viên</option>
									<option>Ủy viên Chi đoàn</option>
									<option>Phó bí thư Chi đoàn</option>
									<option>Bí thư Chi đoàn</option>
									<option>Ủy viên Đoàn cơ sở</option>
									<option>Phó bí thư Đoàn cơ sở</option>
									<option>Bí thư Đoàn cơ sở</option>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row" style="margin: 0px;">
					<div id="errThemDV" class="pull-right" style="display: none;margin-bottom: 10px;">2222</div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="button" class="btn btn-success btn-flat" onclick="ThemDV();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>