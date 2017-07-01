<div id="content-DoanCS">
	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Quản lý Đoàn cơ sở <small> - Trang chính</small></h3>
			</div>
			<!-- Main content -->
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalThemDCS"><i class="fa fa-plus"></i> Thêm mới</button>
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr class="text-success bg-green">
									<th class="text-center">STT</th>
									<th class="text-center">Mã Đoàn cơ sở</th>
									<th class="text-center">Tên Đoàn cơ sở</th>
									<th class="text-center">Chức năng</th>
								</tr>
							<?php if (isset($listDCS) && !empty($listDCS)): ?>
							<?php foreach ($listDCS as $i => $item) { ?>
								<tr>
									<td class="text-center"><?php echo $i + 1; ?></td>
									<td class="text-center"><?php echo $item['MADCS']; ?></td>
									<td class="text-center"><?php echo $item['TENDCS']; ?></td>
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
		</div>
	</section>
</div>

<!-- Modal -->
<div id="modalThemDCS" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thêm Đoàn cơ sở</h4>
			</div>
			<div class="modal-body" style="padding: 15px;">
				<form id="frmThemDCS" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Mã Đoàn sơ sở</label>
								<input type="text" class="form-control" name="MADCS" placeholder="Mã Đoàn cơ sở">
							</div>
							<div class="form-group">
								<label>Tên Đoàn sơ sở</label>
								<input type="text" class="form-control" name="TENDCS" placeholder="Tên Đoàn cơ sở">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row" style="margin: 0px;">
					<div id="errThemDCS" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
					<div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
				</div>
				<div class="row" style="margin: 0px;">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
					<button type="submit" class="btn btn-success btn-flat" onclick="App.DoanCS.ThemDCS();return false;">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>