			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home">
								<use xlink:href="#stroked-home"></use>
							</svg></a></li>
					<li class="active">My Assignment Ticket</li>
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
							<a href="#" style="text-decoration:none">My Assignment Ticket</a>
						</div>
						<div class="panel-body">
							<?php echo $this->session->flashdata("msg"); ?>
							<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
									<tr>
										<th data-field="no" data-sortable="true" width="10px"> No</th>
										<th data-field="idd" data-sortable="true">Nomor Tiket</th>
										<th data-field="idda" data-sortable="true">Nama Tiket</th>
										<th data-field="iddb" data-sortable="true">User</th>
										<th data-field="iddd" data-sortable="true">Tanggal</th>
										<!-- <th data-field="idddd" data-sortable="true">Nama Kategori</th>
										<th data-field="iddddd" data-sortable="true">Nama Sub Kategori</th> -->
										<th data-field="iddc" data-sortable="true">Status (%)</th>
										<th data-field="iddcC" data-sortable="true">Priority</th>
										<th data-field="idde" data-sortable="true">Durasi</th>
										<th data-field="iddf" data-sortable="true">Indikator</th>
										<th data-field="idddddd" data-sortable="true">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 0;
									foreach ($datamyassignment as $row) : $no++; ?>
										<tr>
											<td data-field="no" width="10px"><?php echo $no; ?></td>
											<td data-field="id">
												<?php if ($row->status == 4) { ?>
													<a href="<?php echo base_url(); ?>myassignment/ticket_detail/<?php echo $row->id_ticket; ?>"><?php echo $row->id_ticket; ?></a>
												<?php } else {
													echo $row->id_ticket;
												}
												?>
											</td>
											<td data-field="id"><?php echo $row->problem_summary; ?></td>
											<td data-field="id"><?php echo $this->session->userdata('nama'); ?></td>
											<td data-field="id"><?php echo $row->tanggal; ?></td>
											<!-- <td data-field="id"><?php //echo $row->nama_kategori; 
																		?></td>
											<td data-field="id"><?php //echo $row->nama_sub_kategori; 
																?></td> -->
											<td data-field="id"><?php echo $row->progress; ?></td>
											<td data-field="id"><?php echo $row->nama_kondisi; ?></td>
											<?php $durasiBef; $durasi; $durasiOut; $kondisi; $warnaBefTime; $warnaInTime; $warnaOutTime; foreach($datasla as $sla) : ?>
												<?php if($row->id_kondisi == $sla->kondisi_id) : ?>
													<?php $kondisi = $sla->kondisi_id;?>
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
												$tanggalPembuatan = strtotime($row->tanggal);
												// $tanggalPembuatan = strtotime("2021-12-21 12:38:57");
												// $tanggalTest = strtotime("2021-12-27 10:38:57");
												$tanggalSekarang = strtotime(date("Y-m-d H:i:s"));
												// $tanggalSekarang = strtotime("2021-12-25 13:38:57");
												$dateStart = new DateTimeImmutable($row->tanggal);
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
												// echo $hourWork;
												// echo "<br>";
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
											<?php if(intval($hourWork) >= 24) : ?>
												<?php $modHours = intval($hourWork) % 24; $days = floor(intval($hourWork) / 24); ?>
												<?php if($modHours == 0) : ?>
													<td data-field="id"><?php echo "$days hari" ?></td>
												<?php else : ?>
													<td data-field="id"><?php echo "$days hari $modHours jam" ?></td>
												<?php endif; ?>
											<?php else : ?>
												<td data-field="id"><?php echo floor($hourWork*10) / 10 . " jam" ?></td>
											<?php endif; ?>
											<td data-field="id">
												<div style="padding: 5px; width: 25px; height: 25px; background-color: <?php echo $warna; ?>"></div>
											</td>
											<td data-field="id" class="center_aksi">
												<?php if ($row->status == 4) { ?>
													<a href="<?php echo base_url(); ?>myassignment/ticket_detail/<?php echo $row->id_ticket; ?>" class="btn btn-default">Update Tiket</a>
												<?php } else if ($row->status == 3) { ?>
													<a class="ubah btn btn-success btn-xs" href="<?php echo base_url(); ?>myassignment/terima/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a>
													<a class="ubah btn btn-danger btn-xs" href="<?php echo base_url(); ?>myassignment/pending/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-minus-sign"></span></a>
												<?php } else if ($row->status == 5) { ?>
													<a class="ubah btn btn-success btn-xs" href="<?php echo base_url(); ?>myassignment/terima/<?php echo $row->id_ticket; ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a>
												<?php } ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
			<!--/.row-->



			<script>
				$(function() {
					$('#hover, #striped, #condensed').click(function() {
						var classes = 'table';

						if ($('#hover').prop('checked')) {
							classes += ' table-hover';
						}
						if ($('#condensed').prop('checked')) {
							classes += ' table-condensed';
						}
						$('#table-style').bootstrapTable('destroy')
							.bootstrapTable({
								classes: classes,
								striped: $('#striped').prop('checked')
							});
					});
				});

				function rowStyle(row, index) {
					var classes = ['active', 'success', 'info', 'warning', 'danger'];

					if (index % 2 === 0 && index / 2 < classes.length) {
						return {
							classes: classes[index / 2]
						};
					}
					return {};
				}
			</script>


			<?php $this->load->view('konfirmasi'); ?>

			<script type="text/javascript">
				$(document).ready(function() {

					$(".hapus").click(function() {
						var id = $(this).data('id');

						$(".modal-body #mod").text(id);

					});

				});
			</script>







			</div>
			</div>
			</div>
			</div>
			<!--/.row-->
