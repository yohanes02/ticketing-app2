<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg>
			</a>
		</li>
		<li class="active">Service Level Aggrement (SLA)</li>
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
				<a href="#" style="text-decoration:none"><?php if ($flag == 'edit') {
																echo "Edit";
															} else {
																echo "Tambah";
															} ?> SLA</a>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="<?php echo base_url() ?>sla/<?php if ($flag == 'edit') {
																	echo 'update';
																} else {
																	echo 'save';
																} ?>" method="post">
						<div class="col">
							<div class="col-md-6">
								<div class="form-group">
									<label>Priority Task</label>
									<select name="kondisi" id="kondisi" class="form-control" value="<?php if (isset($kondisi_id)) {
																										echo $kondisi_id;
																									} ?>">
										<option disabled <?php if ($flag != 'edit') {
																echo 'selected';
															} ?>>Pilih Priority</option>
										<?php
										foreach ($data_kondisi as $key => $value) { ?>
											<option value="<?php echo $value['id_kondisi'] ?>" <?php if(isset($kondisi_id) && $value['id_kondisi'] == $kondisi_id) {echo "selected";} ?>><?php echo $value['nama_kondisi'] ?></option>
										<?php	}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Proses</label>
									<select name="proses_sla" id="proses_sla" class="form-control" value="<?php if (isset($proses)) {
																												echo $proses;
																											} ?>">
										<option disabled <?php if ($flag != 'edit') {
																echo 'selected';
															} ?>>Pilih Proses</option>
										<option value="1">Progress Teknisi</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Durasi (Jam)</label>
									<input type="number" min="1" name="durasi" class="form-control" value="<?php if (isset($durasi)) {
																												echo $durasi;
																											} ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Indikator</label>
									<select name="indikator" id="indikator" class="form-control" value="<?php if (isset($indikator_id)) {
																											echo $indikator_id;
																										} ?>">
										<option disabled <?php if ($flag != 'edit') {
																echo 'selected';
															} ?>>Pilih Indikator</option>
										<option value="1" <?php if(isset($indikator_id) && $indikator_id == '1') {echo 'selected';} ?>>Lebih dari durasi yang ditentukan</option>
										<option value="2" <?php if(isset($indikator_id) && $indikator_id == '2') {echo 'selected';} ?>>Sama dengan durasi yang ditentukan</option>
										<option value="3" <?php if(isset($indikator_id) && $indikator_id == '3') {echo 'selected';} ?>>Kurang dari durasi yang ditentukan</option>
									</select>
								</div>
							</div>
							<?php if($flag == 'edit') { ?>
								<input type="hidden" name="id_sla" value="<?php echo $id?>">
							<?php } ?>
							<div class="col-md-6">
								<div class="form-group">
									<label>Warna</label>
									<!-- <input id="warna1" type="text" class="form-control" value="#5367ce" /> -->
									<?php if(isset($warna)) {?>
										<input type="color" id="html5colorpicker" name="warna" onchange="clickColor(0, -1, -1, 5)" value="<?php echo $warna ?>" class="form-control">
									<?php } else {?>
										<input type="color" id="html5colorpicker" name="warna" onchange="clickColor(0, -1, -1, 5)" class="form-control">
									<?php } ?>
								</div>

								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?php echo base_url(); ?>sla" class="btn btn-default">Batal</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
