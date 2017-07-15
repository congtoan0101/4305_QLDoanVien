<div id="content-DoanVien">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Quản lý Chi đoàn <small> - Trang chính</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalThemCD"><i class="fa fa-plus"></i> Thêm mới</button>
					</div>
					
				</div>

				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr class="bg-green">
									<th class="text-center">STT</th>
									<th class="text-center">Mã Chi đoàn</th>
									<th class="text-center">Tên Chi đoàn</th>
									<th class="text-center">Đoàn cơ sở</th>
									<th class="text-center">Chức năng</th>
								</tr>
							<?php if (isset($listCD) && !empty($listCD)): ?>
							<?php foreach ($listCD as $i => $item) { ?>
								<tr>
									<td class="text-center"><?php echo $i + 1; ?></td>
									<td class="text-center"><?php echo $item['MACD']; ?></td>
									<td class="text-center"><?php echo $item['TENCD']; ?></td>
									<td class="text-center"><?php echo $item['TENDCS']; ?></td>
									<td class="text-center">
										<a href="<?php echo base_url('chidoan/sua/'.$item['MACD']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Sửa</a>
										<a href="<?php echo base_url('chidoan/xoa/'.$item['MACD']); ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i> Xóa</a>
									</td>
								</tr>
							<?php } ?>
							<?php endif ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div id="modalThemCD" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thêm Chi đoàn</h4>
			</div>
			<div class="modal-body" style="padding: 15px;">
				<form id="frmThemCD" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Mã Chi đoàn</label>
								<input type="text" class="form-control" name="MACD" placeholder="Mã Chi đoàn">
							</div>
							<div class="form-group">
								<label>Tên Chi đoàn</label>
								<input type="text" class="form-control" name="TENCD" placeholder="Tên Chi đoàn">
							</div>
							<div class="form-group">
								<label>Đoàn cơ sở</label>
								<select name="MADCS" class="form-control select2" style="width: 100%;">
								<?php foreach ($listDCS as $dcs): ?>
									<option value="<?php echo $dcs['MADCS']; ?>"><?php echo $dcs['TENDCS']; ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row" style="margin: 0px;">
					<div id="errThemCD" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="button" class="btn btn-success btn-flat" onclick="App.ChiDoan.ThemCD();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>