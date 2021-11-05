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
				<a href="<?php echo base_url() ?>libur/add" style="text-decoration: none;">Tambah Hari Libur</a>
			</div>
			<div class="panel-body">
				<?php echo $this->session->flashdata("msg"); ?>
				<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-sortable="true">No</th>
							<th data-sortable="true">Event</th>
							<th data-sortable="true">Tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($hari_libur as $libur) { ?>
							<tr>
								<td data-field="no"><?php echo $no ?></td>
								<td data-field="event"><?php echo $libur['event'] ?></td>
								<td data-field="tanggal"><?php echo date('d F Y', strtotime($libur['tanggal'])) ?></td>
								<td>
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url(); ?>libur/edit/<?php echo $libur['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
									<a data-toggle="modal" title="Hapus Libur" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $libur['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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
