<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $doanvien['HODV'] . ' ' . $doanvien['TENDV']; ?> <small> - <?php echo $doanvien['MADV']; ?></small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<form id="frmSuaDV" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Mã Đoàn viên (mã số sinh viên)</label>
								<input type="text" class="form-control" name="MADV" placeholder="Mã Đoàn viên (mã số sinh viên)" value="<?php echo $doanvien['MADV']; ?>" readonly>
							</div>
							<div class="row">
								<div class="col-xs-8">
									<div class="form-group">
										<label>Họ và tên đệm</label>
										<input type="text" class="form-control" name="HODV" placeholder="Họ và tên đệm" value="<?php echo $doanvien['HODV']; ?>">
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label>Tên</label>
										<input type="text" class="form-control" name="TENDV" placeholder="Tên" value="<?php echo $doanvien['TENDV']; ?>">
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
											<input type="text" class="form-control pull-right" name="NGAYSINH" id="datepicker2" value="<?php echo day_decode($doanvien['NGAYSINH']); ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Giới tính</label>
										<div class="radio-group">
											<label>
												<input type="radio" name="GIOITINH" class="minimal-blue icheck" value="1" <?php echo (($doanvien['GIOITINH'] == 1) ? 'checked' : ''); ?>>
												Nam
											</label>
											<label style="padding-left: 40px;">
												<input type="radio" name="GIOITINH" class="minimal-blue icheck" value="0" <?php echo (($doanvien['GIOITINH'] == 0) ? 'checked' : ''); ?>>
												Nữ
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Quê quán</label>
								<input type="text" class="form-control" name="QUEQUAN" placeholder="Quê quán" value="<?php echo $doanvien['QUEQUAN']; ?>">
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
											<input type="text" class="form-control pull-right" name="NGAYVAODOAN" id="datepicker" value="<?php echo day_decode($doanvien['NGAYVAODOAN']); ?>">
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
											<option value="<?php echo $cd['MACD']; ?>" <?php echo (($doanvien['MACD'] == $cd['MACD']) ? 'selected' : ''); ?>><?php echo $cd['TENCD']; ?></option>
										<?php endif ?>
									<?php endforeach ?>
									</optgroup>
								<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Chức vụ</label>
								<select name="CHUCVU" class="form-control select2" style="width: 100%;">
									<option value="Đoàn viên" <?php echo (($doanvien['CHUCVU'] == "Đoàn viên") ? 'selected' : ''); ?>>Đoàn viên</option>
									<option value="Ủy viên Chi đoàn" <?php echo (($doanvien['CHUCVU'] == "Ủy viên Chi đoàn") ? 'selected' : ''); ?>>Ủy viên Chi đoàn</option>
									<option value="Phó bí thư Chi đoàn" <?php echo (($doanvien['CHUCVU'] == "Phó bí thư Chi đoàn") ? 'selected' : ''); ?>>Phó bí thư Chi đoàn</option>
									<option value="Bí thư Chi đoàn" <?php echo (($doanvien['CHUCVU'] == "Bí thư Chi đoàn") ? 'selected' : ''); ?>>Bí thư Chi đoàn</option>
									<option value="Ủy viên Đoàn cơ sở" <?php echo (($doanvien['CHUCVU'] == "Ủy viên Đoàn cơ sở") ? 'selected' : ''); ?>>Ủy viên Đoàn cơ sở</option>
									<option value="Phó bí thư Đoàn cơ sở" <?php echo (($doanvien['CHUCVU'] == "Phó bí thư Đoàn cơ sở") ? 'selected' : ''); ?>>Phó bí thư Đoàn cơ sở</option>
									<option value="Bí thư Đoàn cơ sở" <?php echo (($doanvien['CHUCVU'] == "Bí thư Đoàn cơ sở") ? 'selected' : ''); ?>>Bí thư Đoàn cơ sở</option>
								</select>
							</div>
						</div>
					</div>
				</form>
				<div class="row" style="margin: 0px;">
					<div id="errSuaDV" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-warning btn-flat" onclick="App.DoanVien.SuaDV();return false;">Cập nhật</button>
					<a href="<?php echo base_url('doanvien'); ?>" class="btn btn-default btn-flat">Hủy</a>
				</div>
			</div>
		</div>
	</section>
</div>