<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppOauthController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			"app/oauth/appOauthModel"
		]);
		
	}

	protected function errorValidation()
  	{
	    $response = ["text" => validation_errors()];
	    $this->load->view("app/response/text", $response);
  	}

	protected function dataOauth(){
		$this->form_validation->set_rules('_email', '_email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('_key', '_key', 'trim|required|xss_clean');
		return $this->form_validation->run();
	}

	public function oauthAutorized()
	{
		if ($this->input->is_ajax_request()) {
			if (self::dataOauth()) {
				$response = ["text" => json_encode( [
		        	"data" => $this->appOauthModel->oauthAutorized($this->input->post())])];
		        $this->load->view("app/response/text", $response);
			} else {
				self::errorValidation();
			}
		} else {
			$this->session->sess_destroy();
	        redirect(URL_WEB,'auto');
		}
		
	}

	public function destroySession()
  	{
    	$this->appOauthModel->oauthDestroySession();
  	}

}

/* End of file AppOauthController.php */
/* Location: ./application/controllers/app/oauth/AppOauthController.php */