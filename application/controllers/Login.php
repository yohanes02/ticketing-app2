<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['model_app', 'Login_m']);
		$this->load->library('email');
		// $this->load->library('phpmailer_lib');
	}


	function index()
	{
		$data = "";

		$this->load->view('login', $data);
	}


	function login_akses()
	{

		$username = trim($this->input->post('username'));
		$password = md5(trim($this->input->post('password')));

		$akses = $this->db->query("select A.username, B.nama, A.level, B.id_jabatan, C.id_dept FROM user A 
		LEFT JOIN karyawan B ON B.nik = A.username
        LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept
	 WHERE A.username = '$username' AND A.password = '$password'");

		if ($akses->num_rows() == 1) {

			foreach ($akses->result_array() as $data) {

				$session['id_user'] = $data['username'];
				$session['nama'] = $data['nama'];
				$session['level'] = $data['level'];
				$session['id_jabatan'] = $data['id_jabatan'];
				$session['id_dept'] = $data['id_dept'];

				$this->session->set_userdata($session);
				redirect('home');
			}
		} else {
			$this->session->set_flashdata("msg", '<div class="alert bg-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<strong>Error!</strong> Username / Password salah, coba periksa kembali.
  </div>');
			redirect('login');
		}
	}

	public function forgot_password()
	{
		$this->load->view('forgot_password');
	}

	public function submit_forgot_password()
	{
		$email = trim($this->input->post('email'));
		$data = $this->Login_m->checkEmailExist($email)->row_array();

		if (empty($data)) {
			// echo "EMAIL TIDAK ADA"; die;
			$htmlError = '
			<div class="alert bg-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Error!</strong> Email tidak ditemukan, tolong periksa kembali.
			</div>
			';
			$this->session->set_flashdata("msg", $htmlError);
			redirect('login/forgot_password');
		}

		// print_r($data);die;


		$html = '
		<div class="alert bg-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Berhasil!</strong> Password untuk akses sudah terkirim di email.
		</div>
		';
		$this->session->set_flashdata("msg_success", $html);

		// SEND EMAIL
		$randomString = $this->generateRandomString();
		// echo $randomString;die;
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
							<h2>Reset password</h2>
							<div>
								<p>Yth, Bapak/Ibu ' . $data['nama'] . '.</p>
								<br>
								<p>Anda telah mengajukan permintaan atur ulang kata sandi melalui aplikasi smart helpdesk ticketing.</p>
								<p>Berikut ini password yang dapat Anda gunakan untuk mengakses sistem:</p>
								<p>Password: <strong>'. $randomString .'</strong></p>
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
		$this->email->to($data['email']);
		$this->email->subject('Permintaan Atur Ulang Sandi');
		$this->email->message($content);
		$this->email->send();

		$dataQuery = [
			"password" => md5($randomString)
		];
		$this->Login_m->updatePassFromForgot($data['nik'], $dataQuery);
		// print_r($this->db->last_query());die;

		redirect('login');
	}

	public function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function logout()
	{

		$this->session->sess_destroy();

		redirect('login');
	}
}
