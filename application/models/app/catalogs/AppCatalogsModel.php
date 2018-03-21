<?php
/**
 * Created Manuel Rodriguez.
 * User: manueljrp
 * Date: 12-03-18
 * Time: 11:51
 */

class AppCatalogsModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getCountrys($status = 'a') {
        return $this->db->where(['_status' => $status])->get('country')->result();
    }

    public function getGender($status = 'a') {
        return $this->db->where(['_status' => $status])->get('gender')->result();
    }

}