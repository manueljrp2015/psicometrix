<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppPanelController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			"app/oauth/appOauthModel",
			"app/panel/appPanelModel"
		]);
	}

	protected function errorValidation()
  	{
	    $response = ["text" => validation_errors()];
	    $this->load->view("app/response/text", $response);
  	}

	public function index()
	{
		$data = [
			'listinterests' => $this->appPanelModel->getListInterest(),
			'listregister' => $this->appPanelModel->getListRegister(),
	    ];
		$this->load->view('app/templates/app_template_panel', $data);
	}

	protected function dataOauth(){
		$this->form_validation->set_rules('_key', '_key', 'trim|required|xss_clean');
		return $this->form_validation->run();
	}

	public function oauthAutorized()
	{
		if ($this->input->is_ajax_request()) {
			if (self::dataOauth()) {
				$response = ["text" => json_encode( [
		        	"data" => $this->appPanelModel->oauthAutorized($this->input->post())])];
		        $this->load->view("app/response/text", $response);
			} else {
				self::errorValidation();
			}
		} else {
			$this->session->sess_destroy();
	        redirect(URL_WEB,'auto');
		}
		
	}

	protected function dataInterests(){
		$this->form_validation->set_rules('_inter', '_inter', 'trim|required|xss_clean');
		return $this->form_validation->run();
	}


	public function putRegister(){
		if ($this->input->is_ajax_request()) {
			if (self::dataInterests()) {
				$response = ["text" => json_encode( [
		        	"data" => $this->appPanelModel->putRegister($this->input->post())])];
		        $this->load->view("app/response/text", $response);
			} else {
				self::errorValidation();
			}
			
		} else {
			$this->session->sess_destroy();
	        redirect(URL_WEB,'auto');
		}
		
	}

	public function deleteInterests(){
		$response = ["text" => json_encode( [
		        	"data" => $this->appPanelModel->deleteInterests($this->input->post())])];
		        $this->load->view("app/response/text", $response);
	}

}

/* End of file AppPanelController.php */
/* Location: ./application/controllers/app/panel/AppPanelController.php */