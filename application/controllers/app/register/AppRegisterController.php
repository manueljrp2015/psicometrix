<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppRegisterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			"app/register/appRegisterModel"
		]);
		
	}


	protected function errorValidation()
  	{
	    $response = ["text" => validation_errors()];
	    $this->load->view("app/response/text", $response);
  	}


	public function index()
	{
		$this->load->view('app/templates/app_template_register');
	}

	protected function dataRegister(){
		$this->form_validation->set_rules('_lname', '_lname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('_fname', '_fname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('_email', '_email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('_k1', '_k1', 'trim|required|xss_clean');
		$this->form_validation->set_rules('_k2', '_k2', 'trim|required|xss_clean');

		return $this->form_validation->run();
	}

	public function putRegister(){
		if ($this->input->is_ajax_request()) {
			if (self::dataRegister()) {
				$response = ["text" => json_encode( [
		        	"data" => $this->appRegisterModel->putRegister($this->input->post())])];
		        $this->load->view("app/response/text", $response);
			} else {
				self::errorValidation();
			}
			
		} else {
			$this->session->sess_destroy();
	        redirect(URL_WEB,'auto');
		}
		
	}

}

/* End of file AppRegisterController.php */
/* Location: ./application/controllers/app/register/AppRegisterController.php */