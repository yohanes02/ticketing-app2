<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<ul class="nav menu">

		<?php if ($this->session->userdata('level') == "ADMIN") { ?>

			<li class=<?php if (isset($active1)) {
							echo $active1;
						} ?>><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class=<?php if (isset($active2)) {
							echo $active2;
						} ?>><a href="<?php echo base_url(); ?>departemen/departemen_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Departemen</a></li>
			<li class=<?php if (isset($active3)) {
							echo $active3;
						} ?>><a href="<?php echo base_url(); ?>bagian_departemen/bagian_departemen_list"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Divisi</a></li>
			<li class=<?php if (isset($active4)) {
							echo $active4;
						} ?>><a href="<?php echo base_url(); ?>kategori/kategori_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Kategori</a></li>
			<li class=<?php if (isset($active5)) {
							echo $active5;
						} ?>><a href="<?php echo base_url(); ?>sub_kategori/sub_kategori_list"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Sub Kategori</a></li>
			<li class=<?php if (isset($active6)) {
							echo $active6;
						} ?>><a href="<?php echo base_url(); ?>kondisi/kondisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> Priority Task</a></li>
			<li class=<?php if (isset($active25)) {
							echo $active25;
						} ?>><a href="<?php echo base_url(); ?>sla"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> SLA</a></li>
			<li class=<?php if (isset($active24)) {
							echo $active24;
						} ?>><a href="<?php echo base_url(); ?>libur"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> Hari Libur</a></li>
			<li class=<?php if (isset($active7)) {
							echo $active7;
						} ?>><a href="<?php echo base_url(); ?>karyawan/karyawan_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Karyawan</a></li>
			<li class=<?php if (isset($active8)) {
							echo $active8;
						} ?>><a href="<?php echo base_url(); ?>user/user_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Akses Pengguna</a></li>
			<li class=<?php if (isset($active9)) {
							echo $active9;
						} ?>><a href="<?php echo base_url(); ?>jabatan/jabatan_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-pen-tip"></use>
					</svg> Jabatan</a></li>
			<li class=<?php if (isset($active10)) {
							echo $active10;
						} ?>><a href="<?php echo base_url(); ?>teknisi/teknisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Teknisi</a></li>
			<li class=<?php if (isset($active11)) {
							echo $active11;
						} ?>><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> Buat Ticket</a></li>
			<!-- <li><a href="<?php echo base_url(); ?>approval/approval_list"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg><use xlink:href="#stroked-male-user"></use></svg> Aprroval Ticket (<?php //if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} 
																																																							?>)</a></li> -->
			<li class=<?php if (isset($active12)) {
							echo $active12;
						} ?>><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> Ticket Saya </a></li>
			<!-- <li><a href="<?php echo base_url(); ?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg>Assigment Ticket (<?php //if (empty($notif_assignment)) {
											//echo "0";
											//} else {
											//	echo $notif_assignment;
											//} 
											?>)</a></li> -->
			<li class=<?php if (isset($active13)) {
							echo $active13;
						} ?>><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Monitor Tiket (<?php if (empty($notif_approval)) {
												echo "0";
											} else {
												echo $notif_list_ticket;
											} ?>)</a></li>
			<li class=<?php if (isset($active14)) {
							echo $active14;
						} ?>><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>
			<!-- <li><a href="<?php //echo base_url(); 
								?>informasi/informasi_list"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Informasi</a></li> -->

			<!-- <li><a href="<?php //echo base_url(); 
								?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li> -->

		<?php
		} else if ($this->session->userdata('level') == "TEKNISI") { ?>

			<li class=<?php if (isset($active1)) {
							echo $active1;
						} ?>><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class=<?php if (isset($active13)) {
							echo $active13;
						} ?>><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Monitor Tiket</a></li>
			<li class=<?php if (isset($active16)) {
							echo $active16;
						} ?>><a href="<?php echo base_url(); ?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg> Daftar Pekerjaan</a></li>
			<li class=<?php if (isset($active14)) {
							echo $active14;
						} ?>><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>
			<!-- <li><a href="<?php //echo base_url(); 
								?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li> -->


		<?php } else if ($this->session->userdata('level') == "HELPDESK") { ?>
			<li class=<?php if (isset($active17)) {
							echo $active17;
						} ?>><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class=<?php if (isset($active18)) {
							echo $active18;
						} ?>><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> Buat Ticket</a></li>
			<li class=<?php if (isset($active19)) {
							echo $active19;
						} ?>><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> Ticket Saya</a></li>
			<li class=<?php if (isset($active13)) {
							echo $active13;
						} ?>><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Monitor Tiket</a></li>
			<li class=<?php if (isset($active23)) {
							echo $active23;
						} ?>><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>
			<!-- <li><a href="<?php //echo base_url(); 
								?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li> -->


		<?php } else if ($this->session->userdata('level') == "USER") { ?>

			<li class=<?php if (isset($active20)) {
							echo $active20;
						} ?>><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li class=<?php if (isset($active13)) {
							echo $active13;
						} ?>><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Monitor Tiket</a></li>
			<!-- <li class=<?php //if (isset($active21)) {
							//echo $active21;
							//} 
							?>><a href="<?php //echo base_url(); 
										?>approval/approval_list"><svg class="glyph stroked email">
						<use xlink:href="#stroked-email" />
					</svg>
					<use xlink:href="#stroked-male-user"></use></svg> Aprroval Ticket
				</a></li> -->
			<!-- <li><a href="<?php //echo base_url(); 
								?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li> -->
			<li class=<?php if (isset($active23)) {
							echo $active23;
						} ?>><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>

		<?php } ?>
	</ul>

</div>
<!--/.sidebar-->
<script>
	$(document).ready(function() {
		// console.log("TEST");
		$(document).on("click", "ul.nav.menu>li", function() {
			$(this).addClass('active');
		})
	});
</script>
