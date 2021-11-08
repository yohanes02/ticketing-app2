<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sla extends CI_Controller
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

	function index() {
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active25'] = "active";
		$data['body'] = "body/sla";

		$sql = "SELECT A.*, B.nama_kondisi FROM sla A LEFT JOIN kondisi B ON B.id_kondisi = A.kondisi_id";
		$data['daftar_sla'] = $this->db->query($sql)->result_array();
		
		$this->load->view('template', $data);
	}

	function add()
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active25'] = "active";
		$data['body'] = "body/form_sla";
		$data['flag'] = 'add';

		$query = "SELECT id_kondisi, nama_kondisi FROM kondisi";
		$data_kondisi = $this->db->query($query)->result_array();
		$data['data_kondisi'] = $data_kondisi;

		$this->load->view('template', $data);
	}

	function save()
	{
		$post = $this->input->post();
		$data['kondisi_id'] = $post['kondisi'];
		$data['proses'] = $post['proses_sla'];
		$data['durasi'] = $post['durasi'];
		$data['indikator_id'] = $post['indikator'];
		$data['warna'] = $post['warna'];

		// $data['tanggal'] = date('Y-m-d', strtotime($post['tanggal']));

		$this->db->trans_start();
		$this->db->insert('sla', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
			redirect('sla');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
			redirect('sla');
		}
	}

	function edit($id)
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['active25'] = "active";
		$data['body'] = "body/form_sla";
		
		$sqlRes = $this->db->where(['id'=>$id])->get('sla')->row();

		$data['id'] = $sqlRes->id;
		$data['kondisi_id'] = $sqlRes->kondisi_id;
		$data['proses'] = $sqlRes->proses;
		$data['durasi'] = $sqlRes->durasi;
		$data['indikator_id'] = $sqlRes->indikator_id;
		$data['warna'] = $sqlRes->warna;
		$data['flag'] = 'edit';

		$query = "SELECT id_kondisi, nama_kondisi FROM kondisi";
		$data_kondisi = $this->db->query($query)->result_array();
		$data['data_kondisi'] = $data_kondisi;

		$this->load->view('template', $data);
	}

	function update() {
		$post = $this->input->post();
		$id = $post['id_sla'];
		$data['kondisi_id'] = $post['kondisi'];
		$data['proses'] = $post['proses_sla'];
		$data['durasi'] = $post['durasi'];
		$data['indikator_id'] = $post['indikator'];
		$data['warna'] = $post['warna'];

		// $data['tanggal'] = date('Y-m-d', strtotime($post['tanggal']));

		$this->db->trans_start();

		$this->db->where('id', $id);
		$this->db->update('sla', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
			redirect('sla');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
			redirect('sla');
		}
	}

	function delete($id) {
		$sql = "DELETE FROM sla WHERE id = $id";
		$this->db->query($sql);
	}
}
