<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $doancs['TENDCS']; ?> <small> - Sửa thông tin</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<form id="frmSuaDCS" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Mã Đoàn sơ sở</label>
								<input type="text" class="form-control" name="MADCS" placeholder="Mã Đoàn cơ sở" value="<?php echo $doancs['MADCS']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Tên Đoàn sơ sở</label>
								<input type="text" class="form-control" name="TENDCS" placeholder="Tên Đoàn cơ sở" value="<?php echo $doancs['TENDCS']; ?>">
							</div>
						</div>
					</div>
				</form>
				<div class="row" style="margin: 0px;">
					<div id="errSuaDCS" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-warning btn-flat" onclick="App.DoanCS.SuaDCS();return false;">Cập nhật</button>
					<a href="<?php echo base_url('doancs'); ?>" class="btn btn-default btn-flat">Hủy</a>
				</div>
			</div>
		</div>
	</section>
</div>