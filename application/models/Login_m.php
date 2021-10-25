<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function checkEmailExist($email) {
        $this->db->where(['email' => $email]);
        return $this->db->get("karyawan");
    }

	function updatePassFromForgot($id, $data) {
		// echo $id."\n";
		// print_r($data);die;
		$this->db->where(['username' => $id])->update("user", $data);
		return $this->db->affected_rows();
	}
}
