			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home">
								<use xlink:href="#stroked-home"></use>
							</svg></a></li>
					<li class="active">Bagian Departemen</li>
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
							<a href="#" style="text-decoration:none">Tambah Data Divisi</a>
						</div>
						<div class="panel-body">

							<div class="col-md-6">
								<form method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">

									<input type="hidden" class="form-control" name="id_bagian_dept" value="<?php echo $id_bagian_dept; ?>">
									
									<div class="form-group">
										<label>Departemen</label>
										<?php echo form_dropdown('id_departemen', $dd_departemen, $id_departemen, 'class="form-control"'); ?>
									</div>
									<div class="form-group">
										<label>Divisi</label>
										<input class="form-control" name="nama_bagian_dept" value="<?php echo $nama_bagian_dept; ?>" placeholder="Nama Divisi" required>
									</div>


									<button type="submit" class="btn btn-primary">Simpan</button>
									<a href="<?php echo base_url(); ?>bagian_departemen/bagian_departemen_list" class="btn btn-default">Batal</a>
							</div>

							</form>


						</div>
					</div>
				</div>
			</div>
			<!--/.row-->
