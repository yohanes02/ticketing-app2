		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="padding-top: 10px !important;">
							<!-- <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> -->
							<i class="fa fa-4x fa-ticket"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket;?></div>
							<div class="text-muted">Total Tickets</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="padding-top: 10px !important;">
							<!-- <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> -->
							<i class="fa fa-4x fa-ticket"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_solved_raw;?></div>
							<div class="text-muted">Ticket Solved</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="padding-top: 10px !important;">
							<!-- <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> -->
							<i class="fa fa-4x fa-ticket"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket_process_raw;?></div>
							<div class="text-muted">Ticket On Progress</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php //echo $jml_teknisi;?></div>
							<div class="text-muted">Total Teknisi</div>
						</div>
					</div>
				</div>
			</div> -->
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets<br>Solved</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $jml_ticket_solved;?>" ><span class="percent"><?php echo round($jml_ticket_solved);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets On<br>Process</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $jml_ticket_process;?>" ><span class="percent"><?php echo round($jml_ticket_process);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets Waiting Approval Internal</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php //echo $jml_ticket_app_int;?>" ><span class="percent"><?php //echo ceil($jml_ticket_app_int);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets Waiting Approval Technition</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php //echo $jml_ticket_app_tek;?>" ><span class="percent"><?php //echo ceil($jml_ticket_app_tek);?>%</span>
						</div>
					</div>
				</div>
			</div> -->
		</div><!--/.row-->
		
		<div class="row">
			<?php foreach ($priority as $key => $value) { ?>
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="panel panel-blue panel-widget">
						<div class="row no-padding">
							<div class="col-sm-3 col-lg-5 widget-left">
								<!-- <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> -->
								<i class="fa fa-3x fa-ticket"></i>
							</div>
							<div class="col-sm-9 col-lg-7 widget-right">
								<div class="large"><?php echo $value['jumlah'];?></div>
								<div class="text-muted"><?php  echo $value['nama']; ?></div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div><!--/.row-->

		<div class="row">




			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="padding-top: 10px !important;">
							<!-- <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg> -->
							<i class="fa fa-4x fa-thumbs-up"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_positiv);?>%</div>
							<div class="text-muted">Feedback Positif</div>
						</div>
					</div>
				</div>

			</div>


			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="padding-top: 10px !important;">
							<!-- <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> -->
							<i class="fa fa-4x fa-thumbs-down"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_negativ);?>%</div>
							<div class="text-muted">Feedback Negatif</div>
						</div>
					</div>
				</div>

			</div>



			

		</div><!--/.row-->
								
		
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
