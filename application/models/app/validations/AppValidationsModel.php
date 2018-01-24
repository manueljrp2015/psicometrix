<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppValidationsModel extends CI_Model {

  public function validationEmail($email){
    return $this->db->where('_email', $email)->get("oauth")->row();
  }

}

/* End of file AppValidationsModel.php */
/* Location: ./application/models/app/validations/AppValidationsModel.php */