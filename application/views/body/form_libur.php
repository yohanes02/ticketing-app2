<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg>
			</a>
		</li>
		<li class="active">Hari Libur</li>
	</ol>
</div>

<br>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<svg class="glyph stroked male user">
					<use xlink:href="#stroked-male-user" />
				</svg>
				<a href="#" style="text-decoration:none"><?php if($flag == 'edit'){echo "Edit";} else {echo "Tambah";} ?> Data Libur</a>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="<?php echo base_url() ?>libur/<?php if($flag=='edit') {echo 'update';} else {echo 'save';} ?>" method="post">
						<div class="col">
							<div class="col-md-6">
								<div class="col">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nama Event</label>
											<input type="text" name="nama_event" class="form-control" placeholder="Masukkan event libur" value="<?php if($flag=='edit') {echo $event;} ?>" required>
											<?php if($flag=='edit') { ?>
												<input type="hidden" name="id_event" value="<?php echo $id ?>">
											<?php } ?>
										</div>
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a href="<?php echo base_url(); ?>libur" class="btn btn-default">Batal</a>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tanggal Libur</label>
											<input class="form-control datepicker" name="tanggal" data-date-format="dd MM yyyy" value="<?php if($flag=='edit') {echo $tanggal;} ?>" placeholder="Pilih tanggal" required>
										</div>
										<!-- <button type="submit" class="btn btn-primary">Simpan</button>
										<a href="<?php echo base_url(); ?>kondisi/kondisi_list" class="btn btn-default">Batal</a> -->
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('.datepicker').datepicker({

	});
</script>
