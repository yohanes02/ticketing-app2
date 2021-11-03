<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myassignment extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');

		if (!$this->session->userdata('id_user')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
			redirect('login');
		}
	}


	function myassignment_list()
	{

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/myassignment";

		$id_dept = trim($this->session->userdata('id_dept'));
		$id_user = trim($this->session->userdata('id_user'));

		//notification 

		$sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
		$row_listticket = $this->db->query($sql_listticket)->row();

		$data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

		$sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
		$row_approvalticket = $this->db->query($sql_approvalticket)->row();

		$data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

		$sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
		$row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

		$data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

		//end notification


		$datamyassignment = $this->model_app->datamyassignment($id_user);
		$data['datamyassignment'] = $datamyassignment;

		$this->load->view('template', $data);
	}


	function terima($ticket)
	{


		$id_user = trim($this->session->userdata('id_user'));
		$tanggal = $time = date("Y-m-d  H:i:s");

		$tracking['id_ticket'] = $ticket;
		$tracking['tanggal'] = $tanggal;
		$tracking['status'] = "Diproses oleh teknisi";
		$tracking['deskripsi'] = "";
		$tracking['id_user'] = $id_user;

		$data['status'] = 4;
		$data['tanggal_proses'] = $tanggal;

		$this->db->trans_start();

		$this->db->where('id_ticket', $ticket);
		$this->db->update('ticket', $data);

		$this->db->insert('tracking', $tracking);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {

			redirect('myassignment/myassignment_list');
		} else {

			redirect('myassignment/myassignment_list');
		}
	}

	function pending($ticket)
	{
		$data['status'] = 5;

		$id_user = trim($this->session->userdata('id_user'));
		$tanggal = $time = date("Y-m-d  H:i:s");

		$tracking['id_ticket'] = $ticket;
		$tracking['tanggal'] = $tanggal;
		$tracking['status'] = "Pending oleh teknisi";
		$tracking['deskripsi'] = "";
		$tracking['id_user'] = $id_user;

		$this->db->trans_start();

		$this->db->where('id_ticket', $ticket);
		$this->db->update('ticket', $data);

		$this->db->insert('tracking', $tracking);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {

			redirect('myassignment/myassignment_list');
		} else {

			redirect('myassignment/myassignment_list');
		}
	}


	function ticket_detail($id)
	{

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/up_progress";

		$id_dept = trim($this->session->userdata('id_dept'));
		$id_user = trim($this->session->userdata('id_user'));

		//notification 

		$sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
		$row_listticket = $this->db->query($sql_listticket)->row();

		$data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

		$sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
		$row_approvalticket = $this->db->query($sql_approvalticket)->row();

		$data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

		$sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
		$row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

		$data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

		//end notification

		$sql = "SELECT A.progress, A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, A.tanggal_solved, B.nama_sub_kategori, C.nama_kategori, D.email, A.problem_summary, A.problem_detail, A.file, A.comment, F.nama_dept, E.nama_bagian_dept, G.nama_kondisi
                FROM ticket A 
                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                LEFT JOIN karyawan D ON D.nik = A.reported 
				LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept
				LEFT JOIN departemen F ON F.id_dept = E.id_dept
				LEFT JOIN kondisi G ON G.id_kondisi = A.id_kondisi
                WHERE A.id_ticket = '$id'";

		$row = $this->db->query($sql)->row();

		$id_kategori = $row->id_kategori;

		$data['url'] = "Myassignment/up_progress";

		$data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
		$data['id_teknisi'] = "";

		$data['id_ticket'] = $id;
		$data['progress'] = $row->progress;
		$data['tanggal'] = $row->tanggal;
		$data['tanggal_solved'] = $row->tanggal_solved;
		$data['nama_dept'] = $row->nama_dept;
		$data['nama_divisi'] = $row->nama_bagian_dept;
		$data['nama_sub_kategori'] = $row->nama_sub_kategori;
		$data['nama_kategori'] = $row->nama_kategori;
		$data['reported'] = $row->nama;
		$data['reported_email'] = $row->email;
		$data['problem_summary'] = $row->problem_summary;
		$data['problem_detail'] = $row->problem_detail;
		$data['file'] = $row->file;
		$file = explode("/", $row->file);
		$data['file_name'] = $file[count($file) - 1];
		$data['comment'] = $row->comment;
		$data['priority'] = $row->nama_kondisi;

		$this->load->view('template', $data);
	}


	function up_progress()
	{


		$id_user = trim($this->session->userdata('id_user'));
		$tanggal = $time = date("Y-m-d  H:i:s");

		$ticket = strtoupper(trim($this->input->post('id_ticket')));
		$ticket_name = strtoupper(trim($this->input->post('problem_summary')));
		$ticket_priority = strtoupper(trim($this->input->post('nama_kondisi')));

		// $sql = "SELECT nama_kondisi FROM kondisi WHERE id_kondisi = $ticket_priority";
		// $row = $this->db->query($sql)->row(); 

		$progress = strtoupper(trim($this->input->post('progress')));

		if ($progress == 100) {
			$data['status'] = 6;
			$data['tanggal_solved'] = $tanggal;
		} else {
			$data['status'] = 4;
		}

		$deskripsi_progress = strtoupper(trim($this->input->post('deskripsi_progress')));

		$tracking['id_ticket'] = $ticket;
		$tracking['tanggal'] = $tanggal;
		$tracking['status'] = "Up Progress To " . $progress . " %";
		$tracking['deskripsi'] = $deskripsi_progress;
		$tracking['id_user'] = $id_user;

		$data['progress'] = $progress;

		//SEND EMAIL
		$reported_email = $this->input->post('reported_email');
		$reported = $this->input->post('reported');

		if ($progress == '100') {
			$content = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				 </head>
				 <body>
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="1000" style="margin:0px">
						<tr>
							<td style="background-color:rgb(0, 178, 255); color: rgb(255, 255, 255);">
								<h1>Smart Helpdesk Ticketing</h1>
							</td>
						</tr>
						<tr>
							<td>
								<h2>Ticket Selesai / Solved</h2>
								<div>
									<p>Yth, Bapak/Ibu ' . $reported . '.</p>
									<br>
									<p>Tiket berikut ini kami informasikan bahwa telah selesai/solved.</p>
									<br>
									<p>Nomor Tiket: <strong>' . $ticket . '</strong></p>
									<p>Nama Tiket: <strong>' . $ticket_name . '</strong></p>
									<p>Prioritas Tiket: <strong>' . $ticket_priority . '</strong></p>
									<br>
									<p>Hormat kami,</p>
									<p><strong>Smart Helpdesk Ticketing</strong></p>
								<div>
							</td>
						</tr>
					</table>
				 </body>
			</html>';
			$this->email->from('helpdeskticketing@gmail.com', 'Smart Helpdesk Ticketing');
			$this->email->to($reported_email);
			$this->email->subject('Ticket Telah Solved');
			$this->email->message($content);
			$this->email->send();
		}



		$this->db->trans_start();

		$this->db->where('id_ticket', $ticket);
		$this->db->update('ticket', $data);

		$this->db->insert('tracking', $tracking);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Progress gagal tersimpan.
			</div>");
			redirect('myassignment/myassignment_list');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Progress tersimpan.
			</div>");
			redirect('myassignment/myassignment_list');
		}
	}
}
