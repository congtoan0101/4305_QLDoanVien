<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
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
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<tr class="text-success">
								<th class="text-center">STT</th>
								<th class="text-center">Chi đoàn</th>
								<th class="text-center">Mã Đoàn viên</th>
								<th class="text-center">Họ và đệm Đoàn viên</th>
								<th class="text-center">Tên Đoàn viên</th>
								<th class="text-center">Ngày sinh</th>
								<th class="text-center">Giới tính</th>
								<th class="text-center">Ngày vào Đoàn</th>
								<th class="text-center">Quê quán</th>
								<th class="text-center">Chức vụ</th>
								<th class="text-center">Chức năng</th>
							</tr>
						<?php if (isset($listDV) && !empty($listDV)): ?>
						<?php foreach ($listDV as $i => $item) { ?>
							<tr>
								<td class="text-center"><?php echo $i + 1; ?></td>
								<td class="text-center"><?php echo $item['TENCD']; ?></td>
								<td class="text-center"><?php echo $item['MADV']; ?></td>
								<td class="text-center"><?php echo $item['HODV']; ?></td>
								<td class="text-center"><?php echo $item['TENDV']; ?></td>
								<td class="text-center"><?php echo $item['NGAYSINH']; ?></td>
								<td class="text-center"><?php echo $item['GIOITINH']; ?></td>
								<td class="text-center"><?php echo $item['NGAYVAODOAN']; ?></td>
								<td class="text-center"><?php echo $item['QUEQUAN']; ?></td>
								<td class="text-center"><?php echo $item['CHUCVU']; ?></td>
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
				<form id="frmThemDV" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Mã Đoàn viên (mã số sinh viên)</label>
								<input type="text" class="form-control" name="MADV" placeholder="Mã Đoàn viên (mã số sinh viên)">
							</div>
							<div class="row">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Họ và tên đệm</label>
										<input type="text" class="form-control" name="HODV" placeholder="Họ và tên đệm">
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label>Tên</label>
										<input type="text" class="form-control" name="TENDV" placeholder="Tên">
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
											<input type="text" class="form-control pull-right" name="NGAYSINH" id="datepicker2">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Giới tính</label>
										<div class="radio-group">
											<label>
												<input type="radio" name="GIOITINH" class="minimal-blue icheck" value="1" checked>
												Nam
											</label>
											<label style="padding-left: 40px;">
												<input type="radio" name="GIOITINH" class="minimal-blue icheck" value="0">
												Nữ
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Quê quán</label>
								<input type="text" class="form-control" name="QUEQUAN" placeholder="Quê quán">
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
											<input type="text" class="form-control pull-right" name="NGAYVAODOAN" id="datepicker">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Chi đoàn</label>
								<select name="MACD" class="form-control select2" style="width: 100%;">
								<?php foreach ($listDCS as $dcs): ?>
									<optgroup label="<?php echo $dcs['TENDCS']; ?>">
									<?php foreach ($listCD as $cd): ?>
										<?php if ($cd['MADCS'] == $dcs['MADCS']): ?>
											<option value="<?php echo $cd['MACD']; ?>"><?php echo $cd['TENCD']; ?></option>
										<?php endif ?>
									<?php endforeach ?>
									</optgroup>
								<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Chức vụ</label>
								<select name="CHUCVU" class="form-control select2" style="width: 100%;">
									<option value="Đoàn viên" selected>Đoàn viên</option>
									<option value="Ủy viên Chi đoàn">Ủy viên Chi đoàn</option>
									<option value="Phó bí thư Chi đoàn">Phó bí thư Chi đoàn</option>
									<option value="Bí thư Chi đoàn">Bí thư Chi đoàn</option>
									<option value="Ủy viên Đoàn cơ sở">Ủy viên Đoàn cơ sở</option>
									<option value="Phó bí thư Đoàn cơ sở">Phó bí thư Đoàn cơ sở</option>
									<option value="Bí thư Đoàn cơ sở">Bí thư Đoàn cơ sở</option>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row" style="margin: 0px;">
					<div id="errThemDV" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="button" class="btn btn-success btn-flat" onclick="App.DoanVien.ThemDV();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>