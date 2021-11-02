			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home">
								<use xlink:href="#stroked-home"></use>
							</svg></a></li>
					<li class="active">Update Progress</li>
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
							<a href="<?php echo base_url(); ?>departemen/add" style="text-decoration:none">Update Progress</a>
						</div>
						<div class="panel-body">

							<div class="list-group">
								<div class="list-group-item active">
									<strong>DETAIL TIKET</strong>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>No Tiket</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $id_ticket; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>User</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $reported; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Departemen</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $nama_dept; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Divisi</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $nama_divisi; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Layanan</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $nama_kategori; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Sub Layanan</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $nama_sub_kategori; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Nama Tiket</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $problem_summary; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Deskripsi</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $problem_detail; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Foto</strong>
										</div>
										<div class="col-md col-sm">
											<!-- <?php //echo ": " . $photo; ?> -->
											<img src="<?php echo base_url() . $photo ?>" alt="" width="500px" height="300px">
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Prioritas Task</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . "priority"; ?>
										</div>
									</div>
								</div>
								<!-- <a href="#" class="list-group-item"><strong></strong> &nbsp;<?php //echo $tanggal; 
																									?></a>
								<a href="#" class="list-group-item"><strong></strong> &nbsp;<?php //echo $nama_kategori; 
																							?></a>
								<a href="#" class="list-group-item"><strong></strong> &nbsp;<?php //echo $nama_sub_kategori; 
																							?></a>
								<a href="#" class="list-group-item"><strong></strong> &nbsp;<?php //echo $reported; 
																							?></a>
								<a href="#" class="list-group-item"><strong></strong> &nbsp;<?php //echo $reported_email; 
																							?></a> -->
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item active">
									<strong>Disposisi</strong>
								</a>
								<a href="#" class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Engineer</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $this->session->userdata('nama'); ?>
										</div>
									</div>
								</a>
							</div>

							<div class="row">

								<div class="col-lg-6">

									<form method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">

										<input type="hidden" class="form-control" name="id_ticket" value="<?php echo $id_ticket; ?>">
										<input type="hidden" class="form-control" name="reported_email" value="<?php echo $reported_email; ?>">
										<input type="hidden" class="form-control" name="reported" value="<?php echo $reported; ?>">
										<input type="hidden" class="form-control" name="problem_summary" value="<?php echo $problem_summary; ?>">

										<div class="form-group">
											<label>Progress Penyelesaian</label>
											<select name="progress" class="form-control">
												<?php for ($i = $progress; $i <= 100; $i += 10) { ?>
													<option value="<?php echo $i; ?>">PROGRESS <?php echo $i; ?> %</option>
												<?php } ?>
											</select>
										</div>

										<div class="progress">
											<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%">
												<span class="sr-only"><?php echo $progress; ?> % Complete (Progress)</span>
											</div>
										</div>

										<!-- <div class="form-group">
											<label>Deskripsi Progress</label>
											<textarea name="deskripsi_progress" class="form-control" rows="10"></textarea>
										</div> -->


										<!-- <button type="submit" class="btn btn-primary">Simpan</button> -->

								</div>

								<div class="col-lg-9">

									<div id="div-order">



									</div>


								</div>

							</div>
							<!-- <div class="list-group">
								<a href="#" class="list-group-item active">
									<strong>Riwayat Komentar</strong>
								</a>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Nama</strong>
										</div>
										<div class="col-md col-sm">
											<?php //echo ": " . $reported; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Tanggal Mulai</strong>
										</div>
										<div class="col-md col-sm">
											<?php //echo ": " . $tanggal; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Tanggal Selesai</strong>
										</div>
										<div class="col-md col-sm">
											<?php //if ($tanggal_solved == '0000-00-00 00:00:00') {
												//echo ": " . $tanggal;
											//} else {
												//echo ": " . $tanggal_solved;
											//}; ?>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Komentar</strong>
										</div>
										<div class="col-md col-sm">
											<?php //echo ": " . $comment; ?>
										</div>
									</div>
								</div>
							</div> -->
							<div class="panel panel-danger">
								<div class="panel-heading">Riwayat Komentar</div>
								<div class="panel-body">

									<table class="table table-condensed">
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Tanggal Mulai M</th>
											<th>Tanggal Selesai</th>
											<th>Komentar</th>
										</tr>

										<tr>
											<td>1</td>
											<td><?php echo $reported; ?></td>
											<td><?php echo $tanggal; ?></td>
											<td>
												<?php if ($tanggal_solved == '0000-00-00 00:00:00') {
													echo ": " . $tanggal;
												} else {
													echo ": " . $tanggal_solved;
												}; ?>
											</td>
											<td><?php echo $comment; ?></td>
										</tr>
									</table>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Komentar</label>
										<textarea name="deskripsi_progress" class="form-control" rows="10"></textarea>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>

							</form>


						</div>
					</div>
				</div>

			</div>
			<!--/.row-->
