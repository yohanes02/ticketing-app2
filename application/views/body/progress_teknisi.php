<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg></a></li>
		<li class="active">Progress Teknisi</li>
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
				<a href="<?php echo base_url(); ?>list_ticket/ticket_list" style="text-decoration:none">PROGRESS TEKNISI</a>
			</div>
			<div class="panel-body">

				<div class="list-group">
					<a href="#" class="list-group-item active"><strong>DETAIL TIKET</strong></a>
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
								<!-- <?php //echo ": " . $photo; 
										?> -->
								<!-- <img src="<?php //echo base_url() . $photo 
												?>" alt="" width="500px" height="300px"> -->
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

					<!-- <a href="#" class="list-group-item">
						<?php //echo $id_ticket; ?>
					</a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> &nbsp;<?php //echo $tanggal; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;<?php //echo $nama_kategori; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;<?php //echo $nama_sub_kategori; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php //echo $reported; ?></a> -->
					<?php
						if($status_ticket == '6') {
							$hourWork = $durasi_solved;
							if($hourWork <= $durasiBef) {
								$warna = $warnaBefTime;
							} elseif($hourWork > $durasiBef && $hourWork <= $durasiOut) {
								$warna = $warnaInTime;
							} else {
								$warna = $warnaOutTime;
							}
						}
					?>
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
						DIPROSES OLEH
					</a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $nama_teknisi; ?></a>
					<a href="#" class="list-group-item">

						<div class="progress">
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%">
								<span><?php echo $progress; ?> % Complete (Progress)</span>
							</div>
						</div>

					</a>

					<a href="#" class="list-group-item">
						<b>PROGRESS : <span class="label label-primary"><?php echo $progress; ?> %</span></b>
					</a>

					<a href="#" class="list-group-item">
						<b>TANGAL TICKET : <?php echo $tanggal; ?></b>
					</a>


					<?php if ($tanggal_solved == "0000-00-00 00:00:00") {
					} else { ?>
						<a href="#" class="list-group-item">
							<b>

								TANGAL SOLVED : <span class="label label-primary"><?php echo $tanggal; ?></span></b>

						</a>

					<?php } ?>

					<a href="#" class="list-group-item">
						<b>
							<?php if ($tanggal_proses == "0000-00-00 00:00:00") {
								echo "BELUM DI PROSES";
							} else { ?>
								TANGGAL PROSES TERAKHIR : <?php echo $tanggal_proses; ?>
							<?php } ?>
						</b>
					</a>


				</div>

				<div class="panel panel-danger">
					<div class="panel-heading">SYSTEM TRACKING TICKET</div>
					<div class="panel-body">

						<table class="table table-condensed">
							<tr>
								<th>NO</th>
								<th>TANGGAL</th>
								<th>STATUS</th>
								<th>DESKRIPISI</th>
								<th>BY</th>
							</tr>

							<?php $no = 0;
							foreach ($data_trackingticket as $row) : $no++; ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $row->tanggal; ?></td>
									<td><?php echo $row->status; ?></td>
									<td><?php echo $row->deskripsi; ?></td>
									<td><?php echo $row->nama; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>

					</div>
				</div>





			</div>
		</div>
	</div>

</div>
<!--/.row-->
