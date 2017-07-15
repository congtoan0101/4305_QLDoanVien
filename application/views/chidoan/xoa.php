<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $chidoan['TENCD']; ?> <small> - Xóa</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<h3>Bạn có chắc chắn muốn xóa Chi đoàn này?</h3>
						
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Mã Chi đoàn
							</div>
							<div class="col-xs-6">
								<strong><?php echo $chidoan['MACD']; ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Tên Chi đoàn
							</div>
							<div class="col-xs-6">
								<strong><?php echo $chidoan['TENCD']; ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Đoàn cơ sở
							</div>
							<div class="col-xs-6">
								<strong><?php echo $this->Model_Doancs->get($chidoan['MADCS'])['TENDCS']; ?></strong>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row" style="margin: 0px; margin-top: 20px;">
					<div id="errXoaCD" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-danger btn-flat" onclick="App.ChiDoan.XoaCD('<?php echo $chidoan['MACD']; ?>');return false;">Xóa</button>
					<a href="<?php echo base_url('chidoan'); ?>" class="btn btn-default btn-flat">Hủy</a>
				</div>
			</div>
		</div>
	</section>
</div>