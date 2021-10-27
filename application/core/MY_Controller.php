<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
	}

	public function ups($input, $data, $isCreate)
	{
		$loc = $this->session->userdata("dir_upload");

		// $loc = str_replace("_", "/", $loc);
		// $root = str_replace("application", "", APPPATH);
		// $dir = $root . "/uploads/" . $loc;
		// $dir = str_replace(array("\\", "//"), "/", $dir);

		// print_r($dir);

		$temp = $_FILES[$input]['tmp_name'];
		// print_r(getimagesize($temp));
		// print_r($_FILES);
		// die();

		// if (!file_exists("./photos")) {
		// 	mkdir($dir, 0777, true);
		// }

		// if (file_exists("./photos/" . $data['name'])) {
		// 	// unlink("./photos/" . $data['name']);
		// 	$data_session = array(
		// 		'error_upload' => 'Filename already exist'
		// 	);
		// }

		// $config['upload_path'] = $dir;
		$config['upload_path']		= "./photos";
		// $config['allowed_types'] = 'jpg|gif|png|doc|docx|xls|xlsx|ppt|pptx|pdf|jpeg|zip|rar|tgz|7zip|tar';
		$config['allowed_types']	= 'jpg|png|jpeg';
		// $config['file_name']		= $data['name'];
		// $config['raw_name']			= $data['name'];
		$config['max_size']			= 10240;
		$config['overwrite'] 		= TRUE;
		// $config['max_widht'] 	= 1000;
		// $config['max_height']  	= 1000;
		// $config['file_name'] 		= round(microtime(true)*1000);
		
		// print_r($config);

		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload($input)) {
			// print_r("ERROR");
			// die();
			// print_r($this->upload->display_errors());die;
			if($isCreate) {
				$data_session = array(
					"errImage" => "Make sure all image is an image file and less than 2000 px"
				);
				$this->session->set_flashdata($data_session);
				// return redirect()->back()->withInput();
				
				$referred_from = $this->session->userdata('referred_from');
				redirect('ticket/add');
				// redirect('device/page_create');
			} else {
				$data_session = array(
					"errImage" => "Make sure all image is an image file and less than 2000 px"
				);
				$this->session->set_flashdata($data_session);
				redirect('device/page_edit/'.$data['id']);
			}
			// return $this->upload->display_errors('', '');
		}
		// print_r($this->upload->data());
		// $newFile = fopen('./photos/'.$name, 'w+');
		// chmod("./photos/" . $name, 0777);

		$fileSize = getimagesize($temp);

		if($fileSize[0] > 2000 || $fileSize[1] > 2000) {
			if($isCreate) {
				$data_session = array(
					"errImage" => "Make sure all image is an image file and less than 2000 px"
				);
				$this->session->set_flashdata($data_session);
				redirect('ticket/add');
			} else {
				$data_session = array(
					"errImage" => "Make sure all image is an image file and less than 2000 px"
				);
				$this->session->set_flashdata($data_session);
				redirect('device/page_edit');
			}
		}

		// ig(getimagesize($_FILES[$input]['tmp_name'])){echo 'image';};

		return $this->upload->data('orig_name');
	}
}
