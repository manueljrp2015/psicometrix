<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppValidationsController extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("app/validations/appValidationsModel");
	}

	public function validateEmail(){

	    if($this->input->is_ajax_request()){
	      $email = $this->input->post("email");
	      $response = ["text" => ($this->appValidationsModel->validationEmail($email) ? $text = "false" : $text = " true")];
	      $this->load->view("app/response/text", $response);
	    }
	    else{
	      $this->session->sess_destroy();
	      redirect('/','auto');
	    }
  }

}

/* End of file AppValidationsController.php */
/* Location: ./application/controllers/app/validations/AppValidationsController.php */