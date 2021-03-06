<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Libur extends CI_Controller
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

	function index()
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active24'] = "active";
		$data['body'] = "body/libur";

		$sql = "SELECT * FROM libur";
		$data['hari_libur'] = $this->db->query($sql)->result_array();

		$data['link'] = "libur/hapus";

		$this->load->view('template', $data);
	}

	function add()
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active24'] = "active";
		$data['body'] = "body/form_libur";
		$data['flag'] = 'add';

		$this->load->view('template', $data);
	}

	function save()
	{
		$post = $this->input->post();
		$data['event'] = $post['nama_event'];
		$data['tanggal'] = date('Y-m-d', strtotime($post['tanggal']));

		$this->db->trans_start();
		$this->db->insert('libur', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
			redirect('libur');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
			redirect('libur');
		}
	}

	function edit($id)
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active24'] = "active";
		$data['body'] = "body/form_libur";

		$sqlRes = $this->db->where(['id' => $id])->get('libur')->row();

		$data['id'] = $sqlRes->id;
		$data['event'] = $sqlRes->event;
		$data['tanggal'] = date('d F Y', strtotime($sqlRes->tanggal));
		$data['flag'] = 'edit';

		$this->load->view('template', $data);
	}

	function update()
	{
		$post = $this->input->post();
		$id = $post['id_event'];
		$data['event'] = $post['nama_event'];
		$data['tanggal'] = date('Y-m-d', strtotime($post['tanggal']));

		$this->db->trans_start();
		$this->db->where(['id' => $id]);
		$this->db->update('libur', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Update data gagal.
			    </div>");
			redirect('libur');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Update data berhasil.
			    </div>");
			redirect('libur');
		}
	}

	function hapus()
	{
		$id = $_POST['id'];

		$this->db->trans_start();

		$this->db->where('id', $id);
		$this->db->delete('libur');

		$this->db->trans_complete();
	}
}
