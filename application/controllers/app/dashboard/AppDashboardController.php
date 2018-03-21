<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppDashboardController extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->appOauthModel->oauthChecked();
        $this->load->model([
            "app/dashboard/appDashboardModel",
            "app/interests/appInterestsModel",
        ]);
    }

    public function index() {
        $data = [
            'listinterests' => $this->appInterestsModel->getInterests(),
            'root' => 'dashboard',
            'file' => 'index',
        ];
        $this->load->view('app/templates/app_template', $data);
    }

    public function putInterest() {
        if ($this->input->is_ajax_request()) {
            $response = ["text" => json_encode(["data" => $this->appInterestsModel->putInterest($this->input->post())])];
            $this->load->view("app/response/text", $response);
        } else {
            $this->session->sess_destroy();
            redirect(URL_WEB, 'auto');
        }

    }

    public function getCommonInterest() {
        header('Content-Type: application/json');
        $response = [
            "text" => json_encode([
                "myinterest" => $this->appInterestsModel->getMyInterests($this->input->get()),
                "data" => $this->appInterestsModel->getCommonInterest($this->input->get()),
            ]),
        ];
        $this->load->view("app/response/text", $response);
    }

}

/* End of file AppDashboardController.php */
/* Location: ./application/controllers/app/parse/AppDashboardController.php */