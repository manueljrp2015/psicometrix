<?php

/**
 * Created by PhpStorm.
 * User: developer-tamy
 * Date: 08/03/2018
 * Time: 5:09 PM
 */
class AppProfileController extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model([
            "app/profile/AppProfileModel",
        ]);
    }

    public function index() {
        $data = [
            'root' => 'profile',
            'file' => 'index',
            'getCountry' => $this->AppCatalogsModel->getCountrys(),
            'getGender' => $this->AppCatalogsModel->getGender(),
        ];
        $this->load->view('app/templates/app_template', $data);
    }

}