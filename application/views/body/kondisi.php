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
							<a href="<?php echo base_url(); ?>kondisi/add" style="text-decoration:none">Tambah Data Kondisi</a>
						</div>
						<div class="panel-body">
							<?php echo $this->session->flashdata("msg"); ?>
							<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
									<tr>
										<th data-field="no" data-sortable="true" width="10px"> No</th>
										<th data-field="id" data-sortable="true">Kondisi</th>
										<?php foreach ($kriteria as $key => $value) { ?>
											<th><?php echo $value['code'] . " - " . $value['description'] ?></th>
										<?php } ?>
										<!-- <th data-field="ids" data-sortable="true">Waktu Respon</th> -->
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 0;
									foreach ($datakondisi as $row) : $no++; ?>
										<tr>
											<td data-field="no" width="10px"><?php echo $no; ?></td>
											<td data-field="nama_kondisi"><?php echo $row->nama_kondisi; ?></td>
											<?php foreach ($kriteria as $key => $value) { ?>
												<?php foreach ($kondisi_quest as $key2 => $value2) { ?>
													<?php if ($row->id_kondisi == $value2['kondisi_id']) {
														if ($value2['kriteria_id'] == $value['id']) { ?>
															<td><?php echo $value2['score'] ?></td>
													<?php }
													} ?>
												<?php } ?>
												<!-- <td><?php echo $value['code'] . " - " . $value['description'] ?></td> -->
											<?php } ?>
											<!-- <td data-field="id"><?php //echo $row->waktu_respon; 
																		?></td> -->

											<td>
												<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url(); ?>kondisi/edit/<?php echo $row->id_kondisi; ?>"><span class="glyphicon glyphicon-edit"></span></a>
												<a data-toggle="modal" title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi1" data-id="<?php echo $row->id_kondisi; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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

			<!-- <script>
				$(document).ready(function() {
					$("#oke").click(function() {
						var id = $("#mod").text();

						var data = 'id=' + id;

						$.ajax({
							url: "<?php //echo base_url(); 
									?><?php //echo $link; 
																?>",
							type: "POST",
							data: data,
							dataType: 'html',
							cache: false,
							success: function(data) {
								location.reload();
							}
						});

					});
				});
			</script> -->


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

						$(".modal-body #mod1").text(id);

					});
					$("#oke1").click(function() {
						var id = $("#mod1").text();
						console.log("CLICK", "<?php echo base_url(); ?>kondisi/delete/"+id);

						var data = 'id=' + id;

						$.ajax({
							url: "<?php echo base_url(); ?>kondisi/delete/"+id,
							type: "POST",
							cache: false,
							success: function(data) {
								location.reload();
							}
						});

					});
				});
			</script>



			</div>
			</div>
			</div>
			</div>
			<!--/.row-->
