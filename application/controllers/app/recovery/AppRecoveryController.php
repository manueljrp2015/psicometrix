<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppRecoveryController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			"app/recovery/appRecoveryModel"
		]);
	}

	public function index()
	{
		$this->load->view('app/templates/app_template_recovery');
	}

	protected function errorValidation()
	{
	    $response = ["text" => validation_errors()];
	    $this->load->view("app/response/text", $response);
  	}

	protected function dataRecovery()
	{
		$this->form_validation->set_rules('_email', '_email', 'trim|required|xss_clean');
		return $this->form_validation->run();
	}

	public function recoverPassword()
	{
		if ($this->input->is_ajax_request()) {
			if (self::dataRecovery()) {
				$response = ["text" => json_encode( [
		        	"data" => $this->appRecoveryModel->recoverPassword($this->input->post())])];
		        $this->load->view("app/response/text", $response);
			} else {
				self::errorValidation();
			}
			
		} else {
			$this->session->sess_destroy();
	        redirect('/','auto');
		}
		
	}

}

/* End of file AppRecoveryController.php */
/* Location: ./application/controllers/app/recovery/AppRecoveryController.php */