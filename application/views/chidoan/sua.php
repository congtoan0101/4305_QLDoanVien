<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $chidoan['TENCD']; ?> <small> - Sửa thông tin</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<form id="frmSuaCD" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Mã Chi đoàn</label>
								<input type="text" class="form-control" name="MACD" placeholder="Mã Chi đoàn" value="<?php echo $chidoan['MACD']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Tên Chi đoàn</label>
								<input type="text" class="form-control" name="TENCD" placeholder="Tên Chi đoàn" value="<?php echo $chidoan['TENCD']; ?>">
							</div>
							<div class="form-group">
								<label>Đoàn cơ sở</label>
								<select name="MADCS" class="form-control select2" style="width: 100%;">
								<?php foreach ($listDCS as $dcs): ?>
									<option value="<?php echo $dcs['MADCS']; ?>" <?php echo (($chidoan['MADCS'] == $dcs['MADCS']) ? 'selected' : ''); ?>><?php echo $dcs['TENDCS']; ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
				</form>
				<div class="row" style="margin: 0px;">
					<div id="errSuaCD" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-warning btn-flat" onclick="App.ChiDoan.SuaCD();return false;">Cập nhật</button>
					<a href="<?php echo base_url('chidoan'); ?>" class="btn btn-default btn-flat">Hủy</a>
				</div>
			</div>
		</div>
	</section>
</div>