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
				<a href="<?php echo base_url() ?>sla/add" style="text-decoration: none;">Tambah SLA</a>
			</div>
			<div class="panel-body">
				<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-sortable="true">No</th>
							<th data-sortable="true">Priority</th>
							<th data-sortable="true">Proses</th>
							<th data-sortable="true">Durasi</th>
							<th data-sortable="true">Indikator</th>
							<th data-sortable="true">Warna</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($daftar_sla as $value) { ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $value['nama_kondisi']; ?></td>
								<td>
									<?php if ($value['proses'] == '1') {
										echo 'Progress Teknisi';
									} ?>
								</td>
								<td>
									<?php if (intval($value['durasi']) >= 24) {
										$modHours = intval($value['durasi']) % 24;
										$days = floor(intval($value['durasi']) / 24);
										if ($modHours == 0) {
											echo "$days hari";
										} else {
											echo "$days hari $modHours jam";
										}
									} else {
										echo $value['durasi'] . " jam";
									} ?>
								</td>
								<td>
									<?php
									if ($value['indikator_id'] == '1') {
										echo "Lebih dari durasi yang ditentukan";
									}
									if ($value['indikator_id'] == '2') {
										echo "Sama dengan durasi yang ditentukan";
									}
									if ($value['indikator_id'] == '3') {
										echo "Kurang dari durasi yang ditentukan";
									}
									?>
								</td>
								<td align="center">
									<div>
										<div style="padding: 5px; width: 25px; height: 25px; background-color: <?php echo $value['warna']; ?>"></div>
									</div>
								</td>
								<td>
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url(); ?>sla/edit/<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
									<a data-toggle="modal" title="Hapus SLA" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi1" data-id="<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modKonfirmasi1" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight:bold"><span class="glyphicon glyphicon-info-sign" style="color:#FFFFFF; font-size:24px"></span>Konfirmasi </h4>
			</div>
			<div class="modal-body">
				Anda yakin akan menghapus data dengan ID : (<span id="mod1"></span>) ?
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-primary" id="oke1">Ya </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$(".hapus").click(function() {
			var id = $(this).data('id');

			$(".modal-body #mod1").text(id);

		});
		$("#oke1").click(function() {
			var id = $("#mod1").text();
			console.log("CLICK", "<?php echo base_url(); ?>sla/delete/" + id);

			var data = 'id=' + id;

			$.ajax({
				url: "<?php echo base_url(); ?>sla/delete/" + id,
				type: "POST",
				cache: false,
				success: function(data) {
					location.reload();
				}
			});

		});
	});
</script>
