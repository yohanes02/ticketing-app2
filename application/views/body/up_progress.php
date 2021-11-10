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
											<strong>File</strong>
										</div>
										<div class="col-md col-sm">
											<!-- <?php //echo ": " . $photo; ?> -->
											<!-- <img src="<?php //echo base_url() . $photo ?>" alt="" width="500px" height="300px"> -->
											<a href="<?php echo base_url() . $file ?>" target="_blank"><?php echo ": " . $file_name ?></a>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Prioritas Task</strong>
										</div>
										<div class="col-md col-sm">
											<?php echo ": " . $priority; ?>
										</div>
									</div>
								</div>
								<?php 
								$durasiBef=0;
								$durasi=0;
								$durasiOut=0;
								$kondisi;
								$warnaBefTime;
								$warnaInTime;
								$warnaOutTime="";
								foreach($datasla as $sla) : ?>
									<?php if($id_priority == $sla->kondisi_id) : ?>
										<?php $kondisi = $id_priority;?>
										<?php if($sla->indikator_id == '3') : ?>
											<?php $durasiBef = intval($sla->durasi); $warnaBefTime = $sla->warna; ?>
										<?php endif; ?>
										<?php if($sla->indikator_id == '2') : ?>
											<?php $durasi = intval($sla->durasi); $warnaInTime = $sla->warna ?>
											<?php if(intval($sla->durasi) >= 24) : ?>
												<?php $modHours = intval($sla->durasi) % 24; $days = floor(intval($sla->durasi) / 24); ?>
												<?php if($modHours == 0) : ?>
													<!-- <td data-field="id"><?php //echo "$days hari" ?></td> -->
												<?php else : ?>
													<!-- <td data-field="id"><?php //echo "$days hari $modHours jam" ?></td> -->
												<?php endif; ?>
											<?php else : ?>
												<!-- <td data-field="id"><?php //echo $sla->durasi . " jam" ?></td> -->
											<?php endif; ?>
										<?php endif; ?>
										<?php if($sla->indikator_id == '1') : ?>
											<?php $durasiOut = intval($sla->durasi); $warnaOutTime = $sla->warna; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php
									$warna;
									$hourMinus = null;
									$tanggalPembuatan = strtotime($tanggal);
									// $tanggalPembuatan = strtotime("2021-12-21 12:38:57");
									// $tanggalTest = strtotime("2021-12-27 10:38:57");
									$tanggalSekarang = strtotime(date("Y-m-d H:i:s"));
									// $tanggalSekarang = strtotime("2021-12-25 13:38:57");
									$dateStart = new DateTimeImmutable($tanggal);
									// $dateStart = new DateTimeImmutable("2021-12-21 12:38:57");
									$dateNow = new DateTimeImmutable(date("Y-m-d H:i:s"));
									// $dateNow = new DateTimeImmutable("2021-12-25 13:38:57");
									$diffHour = abs($tanggalSekarang - $tanggalPembuatan)/(60*60);
									// echo "FLOOR ".floor($diffHour/24); 1
									// echo "<br>"; 2
									// $diffHourTest = abs($tanggalTest - $tanggalPembuatan)/(60*60);
										$idx = 0;
										$idxWork = 0;
										// for ($i=0; $i < ceil($diffHourTest/24); $i++) {
										// for ($i=0; $i < round($diffHour/24); $i++) { 
										
										/// START LOOP
										// for ($i=0; $i < floor($diffHour/24); $i++) { 
										// 	// $date = new DateTimeImmutable($row->tanggal);
										// 	$date = new DateTimeImmutable("2021-11-09 12:38:57");
										// 	$date = $date->modify('+'.($i+1).' day');
										// 	if($date->format("Y-m-d") != $dateNow->format("Y-m-d")) {
										// 		$willPrint = $date->format('Y-m-d H:i:s');
										// 		if($date->format('D') == 'Sat' || $date->format('D') == 'Sun') {
										// 			if($dateNow->format("Y-m-d") == $date->format("Y-m-d")) {
										// 				echo "WEEKEND".$dateNow->format("Y-m-d")."<br>";
										// 				if(intval($dateNow->format("H")) < 23 && intval($dateNow->format("i")) <= 59) {
										// 					$hourMinus = 24 - intval($dateNow->format("H"));
										// 				} else {
										// 					$idx++;
										// 				}
										// 			} else {
										// 				$idx++;
										// 			}
										// 			// echo $date->format('Y-m-d');
										// 			// echo "<br>";
										// 			// $idx++;
										// 			// $willPrint = $date->format('D');
										// 		}
										// 		elseif(in_array($date->format("Y-m-d"), $datalibur)) {
										// 			if($dateNow->format("Y-m-d") == $date->format("Y-m-d")) {
										// 				// echo "LIBUR".date("Y-m-d");
										// 				if(intval($dateNow->format("H")) < 23 && intval($dateNow->format("i")) <= 59) {
										// 					$hourMinus = 24 - intval($dateNow->format("H"));
										// 				} else {
										// 					$idx++;
										// 				}
										// 			} else {
										// 				$idx++;
										// 			}
										// 		}
										// 	}			
										// }
										// END LOOP
										for ($i=0; $i < floor($diffHour/24); $i++) { 
											$date = $dateStart;
											$date = $date->modify('+'.($i+1).' day');
											if($date->format("Y-m-d") != $dateNow->format("Y-m-d")) {
												if($date->format('D') == 'Sat' || $date->format('D') == 'Sun'){
													$idx++;
												} elseif (in_array($date->format("Y-m-d"), $datalibur)) {
													$idx++;
												} else {
													$idxWork++;
												}
											}			
										}
									$startLeftTime;$endPastTime;
									if($dateNow->format("D") != "Sat" && $dateNow->format("D") != "Sun" && in_array($dateNow->format("Y-m-d"), $datalibur) == false) {
										if($dateNow->format("Y-m-d") != $dateStart->format("Y-m-d")) {
											$endPastTime = intval($dateNow->format("H"));
											// if(intval($dateNow->format("H")) == 0) {
												$endPastTime = $endPastTime + intval($dateNow->format("i"))/60;
											// }
										} else {
											$endPastTime = 0;
										}
									} else {
										$endPastTime = 0;
									}

									if($dateStart->format("D") != "Sat" && $dateStart->format("D") != "Sun" && in_array($dateStart->format("Y-m-d"), $datalibur) == false) {
										if($dateNow->format("Y-m-d") != $dateStart->format("Y-m-d")) {
											$a = 23 - intval($dateStart->format("H"));
											$b = 60 - intval($dateStart->format("i"));
											$minutes = ($a*60) + $b;
											$startLeftTime = $minutes / 60;
											// $startLeftTime = 23 - intval($dateStart->format("H"));
										// if(intval($dateStart->format("H")) == 23) {
											// $startLeftTime = $startLeftTime + (60-intval($dateNow->format("i")))/60;
										// }
										} else {
											// echo "AAAA <br>";
											$a = $dateStart->format("H");
											$b = $dateNow->format("H");
											$c = 0;
											$d = intval($b) - intval($a);
											if($d > 0 && intval($dateNow->format("i")) < intval($dateStart->format("i"))) {
												$c = intval($dateStart->format("i")) - intval($dateNow->format("i"));
											}
											$e = ($d*60) - $c;
											if($d == 0) {
												$e = intval($dateNow->format("i")) - intval($dateStart->format("i"));
											}
											$startLeftTime = $e/60;
										}
									} else {
										$startLeftTime = 0;
									}

									// echo $startLeftTime." <<<<>>>>>> ".$endPastTime." <<<<<>>>>>".$idx; 3
									// echo "<br>"; 4
									// echo $diffHourTest;
									// echo "<br>";
									// $diffHourTest = $diffHourTest - $idx*24;
									// echo $diffHourTest;
									// echo "<br>";
									// echo $diffHour;
									// echo "<br>";
									// $tanggalSekarang = strtotime(date("Y-m-d H:i:s"));
									// $diffHour = abs($tanggalSekarang - $tanggalPembuatan)/(60*60);
									$diffHour = $diffHour-($idx*24);
									if($hourMinus != null) {
										// echo "HOURMINUS"."<br>";
										$diffHour = $diffHour - $hourMinus;
									}

									$hourWork = ($startLeftTime + ($idxWork*24) + $endPastTime);
									// echo date("Y-m-d"); 7
									// echo "<br>"; 8
									// print_r($datalibur); 9
									// echo "<br>"; 10
									// echo $idx; 11
									// echo "<br>"; 12

									// if($diffHour <= $durasiBef) {
									// 	$warna = $warnaBefTime;
									// } elseif($diffHour > $durasiBef && $diffHour <= $durasiOut) {
									// 	$warna = $warnaInTime;
									// } else {
									// 	$warna = $warnaOutTime;
									// }
									if($hourWork <= $durasiBef) {
										$warna = $warnaBefTime;
									} elseif($hourWork > $durasiBef && $hourWork <= $durasiOut) {
										$warna = $warnaInTime;
									} else {
										$warna = $warnaOutTime;
									}
								?>
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
								<div class="list-group-item">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Durasi</strong>
										</div>
										<div class="col-md col-sm">
											<?php if(intval($hourWork) >= 24) : ?>
												<?php $modHours = intval($hourWork) % 24; $days = floor(intval($hourWork) / 24); ?>
												<?php if($modHours == 0) : ?>
													<?php echo ": $days hari" ?>
												<?php else : ?>
													<?php echo ": $days hari $modHours jam" ?>
												<?php endif; ?>
											<?php else : ?>
												<?php echo ": ".floor($hourWork*10) / 10 . " jam" ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
								
								<div class="list-group-item" style="height: 45px;">
									<div class="col">
										<div class="col-md-2 col-sm-4">
											<strong>Indikator</strong>
										</div>
										<div class="col-md-10 col-sm-6">
											<!-- <span>:</span> -->
											<div style="height: 25px; background-color: <?php echo $warna; ?>"></div>
										</div>
									</div>
								</div>
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
										<input type="hidden" class="form-control" name="nama_kondisi" value="<?php echo $priority; ?>">

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
											<th>Tanggal Mulai</th>
											<th>Proses Terakhir</th>
											<th>Komentar</th>
										</tr>

<?php $no = 1; foreach ($datatracking as $row) { ?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $tanggal; ?></td>
											<td><?php echo $row->tanggal; ?></td>
											<td><?php echo $row->deskripsi; ?></td>
										</tr>
<?php $no++;} ?>

										<!-- <tr>
											<td>1</td>
											<td><?php //echo $reported; ?></td>
											<td><?php //echo $tanggal; ?></td>
											<td>
												<?php //if ($tanggal_solved == '0000-00-00 00:00:00') {
													//echo $tanggal;
												//} else {
													//echo $tanggal_solved;
												//}; ?>
											</td>
											<td><?php //echo $comment; ?></td>
										</tr> -->
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
							<input type="hidden" name="durasi_ticket" value="<?php echo $hourWork ?>">
							<button type="submit" class="btn btn-primary">Simpan</button>

							</form>


						</div>
					</div>
				</div>

			</div>
			<!--/.row-->
