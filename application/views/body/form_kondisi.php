			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home">
								<use xlink:href="#stroked-home"></use>
							</svg></a></li>
					<li class="active">Kondisi</li>
				</ol>
			</div>
			<!--/.row-->

			<br>


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading"><svg class="glyph stroked male user ">
								<use xlink:href="#stroked-male-user" />
							</svg>
							<a href="#" style="text-decoration:none">Tambah Data Kondisi</a>
						</div>
						<div class="panel-body">

							<div class="col-md-6">
								<form method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">

									<input type="hidden" class="form-control" name="id_kondisi" value="<?php echo $id_kondisi; ?>">

									<div class="form-group">
										<label>Nama Kondisi</label>
										<input class="form-control" name="nama_kondisi" value="<?php echo $nama_kondisi; ?>" placeholder="Nama Kondisi" required>
									</div>
									<br>
									<p style="font-size: 20px;">
										<strong>Detail Prioritas</strong>
									</p>
									<hr>
									<div class="col">
										<?php foreach ($kriteria as $key => $value) { ?>
											<div class="col-md-6" style="padding-left: 0px">
												<div class="form-group">
													<label><?php echo $value['code'] . " - " . $value['description'] ?></label>
													<?php if (isset($kondisi_quest)) { ?>
														<?php foreach ($kondisi_quest as $key2 => $value2) {
															if ($value2['kriteria_id'] == $value['id']) { ?>
																<input type="number" class="form-control" name="<?php echo $value['code'] ?>" max="100" placeholder="Masukkan Bobot" value="<?php echo $value2['score'] ?>">
													<?php }
														}
													} else { ?>
																<input type="number" class="form-control" name="<?php echo $value['code'] ?>" max="100" placeholder="Masukkan Bobot">
													<?php } ?>
												</div>
											</div>
										<?php } ?>
										<!-- <div class="col-md-6" style="padding-left: 0px">
											<div class="form-group">
												<label>C1 - Stopper</label>
												<input type="number" class="form-control" name="c1" max="100" placeholder="Masukkan Bobot">
											</div>
										</div>
										<div class="col-md-6" style="padding-left: 0px">
											<div class="form-group">
												<label>C2 - Bugs Major</label>
												<input type="number" class="form-control" name="c2" max="100" placeholder="Masukkan Bobot">
											</div>
										</div>
										<div class="col-md-6" style="padding-left: 0px">
											<div class="form-group">
												<label>C3 - Bugs Minor</label>
												<input type="number" class="form-control" name="c3" max="100" placeholder="Masukkan Bobot">
											</div>
										</div>
										<div class="col-md-6" style="padding-left: 0px">
											<div class="form-group">
												<label>C4 - Costmetic</label>
												<input type="number" class="form-control" name="c4" max="100" placeholder="Masukkan Bobot">
											</div>
										</div> -->
									</div>

									<!-- <div class="form-group">
										<label>Waktu Respon (Hari)</label>
										<input class="form-control" name="waktu_respon" value="<?php echo $waktu_respon; ?>" placeholder="Waktu Respon" required>
									</div> -->

									<button type="submit" class="btn btn-primary">Simpan</button>
									<a href="<?php echo base_url(); ?>kondisi/kondisi_list" class="btn btn-default">Batal</a>
							</div>

							</form>


						</div>
					</div>
				</div>
			</div>
			<!--/.row-->
