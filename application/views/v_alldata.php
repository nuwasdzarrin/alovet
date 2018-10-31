<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Tables</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i> Data Table Example</div>
			<div class="card-body">
				<button class="new-data btn btn-primary" data-idb="" data-namab="" data-bulanb="<?php echo date('F Y');?>" data-meterb="" style="margin: 0 0 10px 10px;"> Data Baru </button>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>ID</th>
								<th>Nama</th>
								<th>Bulan</th>
								<th>Mtr/Hsl/Rp</th>
								<th>Petugas</th>
								<th>Control</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Tanggal</th>
								<th>ID</th>
								<th>Nama</th>
								<th>Bulan</th>
								<th>Mtr/Hsl/Rp</th>
								<th>Petugas</th>
								<th>Control</th>
							</tr>
						</tfoot>
						<tbody>
							<?php date_default_timezone_set('Asia/Jakarta');?>
							<?php foreach ($alldt->result() as $dt) { ?>
								<tr>
									<td><?php echo $dt->intime; ?></td>
									<td><?php echo $dt->id_cus; ?></td>
									<td><?php echo $dt->name_cus; ?></td>
									<td><?php echo $dt->bulan; ?></td>
									<?php 
									$isi=FALSE;
									foreach ($updat->result() as $test) {
										if ($dt->id_cus==$test->id_cus)
											$isi=TRUE;	
									}
									?>
									<td><?php echo "Meter: ".$dt->meter_seb." s/d ".$dt->meter_cus; ?><br>
										<?php echo "Hasil: ".$dt->meter_hasil; ?><br>
										<?php echo "Meter: Rp".$dt->harga; ?>
									</td>
									<td><?php echo $dt->name; ?></td>
									<td>
										<?php if(date('F Y', strtotime('+1 month', strtotime( $dt->bulan )))==date('F Y')&&$isi==FALSE){ ?>
											<button class="show-modal btn btn-success fa fa-plus" data-id="<?php echo $dt->id;?>" data-idcus="<?php echo $dt->id_cus;?>" data-name_cus="<?php echo $dt->name_cus;?>" data-mater="<?php echo $dt->meter_cus;?>" data-idmonth="<?php echo date('F Y');?>" title="Tambah Data"></button>
											<button class="edit-data btn btn-warning fa fa-edit" data-id="<?php echo $dt->id;?>" data-idcus="<?php echo $dt->id_cus;?>" data-name_cus="<?php echo $dt->name_cus;?>" data-mater="<?php echo $dt->meter_cus-$dt->meter_hasil;?>" data-idmonth="<?php echo date('F Y');?>" title="Edit Data"></button>
											<!-- <a href="<?php echo site_url('alldata/delfile/'.$dt->id);?>" class="btn btn-danger fa fa-trash" title="Hapus Dokumen"></a>	 -->
										<?php } ?>
										
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
	<!-- /.container-fluid-->
	<!-- tambah record/data -->
	<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('alldata/addData')?>">
					<div class="modal-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nomor Pelanggan:</label>
									<input type="hidden" class="form-control" id="id_show" value="id_show" name="id">
									<input type="hidden" class="form-control" id="id_cust" value="id_cust" name="id_cus">
									<input type="text" class="form-control" id="id_cus" style="width: 150px" disabled>
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="content">Meter Lalu:</label>
									<input type="text" class="form-control" id="meters" style="width: 150px;" disabled>
									<input type="hidden" class="form-control" id="mtr" name="meterlalu">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nama Pelanggan:</label>
									<input type="hidden" class="form-control" id="nam_cust" value="nam_cust" name="name_cus">
									<input type="text" class="form-control" id="nam_cus" disabled>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="content">Bulan Sekarang:</label>
									<input type="text" class="form-control" id="bulans" style="width: 150px;" disabled>
									<input type="hidden" class="form-control" id="bln" name="bulan">
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="content">Meter Sekarang:</label>
									<input type="text" class="form-control" maxlength="10" name="meterskg" style="width: 200px;">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Input</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- data baru -->
	<div class="modal fade" id="newData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Baru</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('alldata/dataBaru')?>">
					<div class="modal-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nomor Pelanggan:</label>
									<input type="text" class="form-control" id="idb" name="id_cus" style="width: 150px">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nama Pelanggan:</label>
									<input type="text" class="form-control" id="namab" name="name_cus">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="content">Bulan Sekarang:</label>
									<input type="text" class="form-control" id="bulanb" style="width: 150px;" disabled>
									<input type="hidden" class="form-control" id="blnb" name="bulan">
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="content">Meter Sekarang:</label>
									<input type="text" class="form-control" maxlength="10" name="meterskg" style="width: 200px;">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Input</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- edit data -->
	<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo site_url('alldata/upData')?>">
					<div class="modal-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nomor Pelanggan:</label>
									<input type="hidden" class="form-control" id="id_showe" value="id_showe" name="id">
									<input type="hidden" class="form-control" id="id_custe" value="id_custe" name="id_cus">
									<input type="text" class="form-control" id="id_cuse" style="width: 150px" disabled>
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="content">Meter Lalu:</label>
									<input type="text" class="form-control" id="metere" style="width: 150px;" disabled>
									<input type="hidden" class="form-control" id="mtre" name="meterlalu">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="title">Nama Pelanggan:</label>
									<input type="hidden" class="form-control" id="nam_custe" value="nam_cust" name="name_cus">
									<input type="text" class="form-control" id="nam_cuse" disabled>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-sm-6">
									<label class="control-label" for="content">Bulan Sekarang:</label>
									<input type="text" class="form-control" id="bulane" style="width: 150px;" disabled>
									<input type="hidden" class="form-control" id="blne" name="bulan">
								</div>
								<div class="col-sm-6">
									<label class="control-label" for="content">Meter Sekarang:</label>
									<input type="text" class="form-control" maxlength="10" name="meterskg" style="width: 200px;">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Input</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		/*js for modal add record*/
		$(document).on('click', '.show-modal', function() {
			$('.modal-judul').text('Tambah Data');
			$('#id_show').val($(this).data('id'));
			$('#id_cust').val($(this).data('idcus'));
			$('#id_cus').val($(this).data('idcus'));
			$('#nam_cus').val($(this).data('name_cus'));
			$('#nam_cust').val($(this).data('name_cus'));
			$('#meters').val($(this).data('mater'));
			$('#mtr').val($(this).data('mater'));
			$('#bulans').val($(this).data('idmonth'));
			$('#bln').val($(this).data('idmonth'));
			$('#showModal').modal('show');
		});
		/*js for edit data*/
		$(document).on('click', '.edit-data', function() {
			$('.modal-judul').text('Tambah Data');
			$('#id_showe').val($(this).data('id'));
			$('#id_custe').val($(this).data('idcus'));
			$('#id_cuse').val($(this).data('idcus'));
			$('#nam_cuse').val($(this).data('name_cus'));
			$('#nam_custe').val($(this).data('name_cus'));
			$('#metere').val($(this).data('mater'));
			$('#mtre').val($(this).data('mater'));
			$('#bulane').val($(this).data('idmonth'));
			$('#blne').val($(this).data('idmonth'));
			$('#editData').modal('show');
		});
		/*js for add new record*/
		$(document).on('click', '.new-data', function() {
			$('.modal-judul').text('Data Baru');
			$('#idb').val($(this).data('idb'));
			$('#namab').val($(this).data('namab'));
			$('#bulanb').val($(this).data('bulanb'));
			$('#blnb').val($(this).data('bulanb'));
			$('#meterb').val($(this).data('name_cus'));
			$('#newData').modal('show');
		});

	</script>