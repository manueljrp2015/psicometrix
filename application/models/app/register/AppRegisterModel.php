<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppRegisterModel extends CI_Model {

	protected function dataRegister($data){

		$hash = $this->appFunctionsModel->hashPassword($data["_k2"]);
		return [
			"_firtsname" => ucwords($data["_fname"]),
			"_lastname"  => ucwords($data["_lname"]),
			"_email"     => strtolower($data["_email"]),
			"_key"       => $hash,
			];
	}

	public function putRegister($data){
		return $this->db->insert("oauth", self::dataRegister($data));
	}

}

/* End of file AppRegisterModel.php */
/* Location: ./application/models/app/register/AppRegisterModel.php */