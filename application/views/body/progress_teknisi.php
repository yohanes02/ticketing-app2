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
					<!-- <a href="#" class="list-group-item">
						<?php //echo $id_ticket; ?>
					</a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> &nbsp;<?php //echo $tanggal; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;<?php //echo $nama_kategori; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;<?php //echo $nama_sub_kategori; ?></a>
					<a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php //echo $reported; ?></a> -->
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
								TANGGAL PROSES : <?php echo $tanggal_proses; ?>
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
