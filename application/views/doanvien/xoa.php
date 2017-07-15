<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $doanvien['HODV'] . ' ' . $doanvien['TENDV']; ?> <small> - Xóa đoàn viên</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<h3>Bạn có chắc chắn muốn xóa Đoàn viên này?</h3>
						
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Mã Đoàn viên
							</div>
							<div class="col-xs-6">
								<strong><?php echo $doanvien['MADV']; ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Họ tên Đoàn viên
							</div>
							<div class="col-xs-6">
								<strong><?php echo $doanvien['HODV']; ?> <?php echo $doanvien['TENDV']; ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Chi đoàn
							</div>
							<div class="col-xs-6">
								<strong><?php echo $this->Model_Chidoan->get($doanvien['MACD'])['TENCD']; ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Ngày sinh
							</div>
							<div class="col-xs-6">
								<strong><?php echo day_decode($doanvien['NGAYSINH']); ?></strong>
							</div>
						</div>
						<div class="row" style="margin-top: 10px;">
							<div class="col-xs-3">
								Chức vụ
							</div>
							<div class="col-xs-6">
								<strong><?php echo $doanvien['CHUCVU']; ?></strong>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row" style="margin: 0px; margin-top: 20px;">
					<div id="errXoaDV" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-danger btn-flat" onclick="App.DoanVien.XoaDV('<?php echo $doanvien['MADV']; ?>');return false;">Xóa</button>
					<a href="<?php echo base_url('doanvien'); ?>" class="btn btn-default btn-flat">Hủy</a>
				</div>
			</div>
		</div>
	</section>
</div>