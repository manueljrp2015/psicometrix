<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppRecoveryModel extends CI_Model {

	public function recoverPassword($data){

        $quser = $this->db->where("_email", strtolower($data["_email"]))
            ->get("oauth")
            ->row();

        if ($quser) {


            $new_password = $this->appFunctionsModel->generatePassword();
            $update_pass = [
                "_key" => $this->appFunctionsModel->hashPassword($new_password)
            ];

            $this->db->where(["id" => $quser->id])->update("oauth", $update_pass);
            //$this->appEmailsModel->emailRenewPassword($quser->_mail, $new_password);

            return ["msg" => true, "newp" => $new_password];
        } else {
            return ["msg" => FALSE];
        }
    }

}

/* End of file AppRecoveryModel.php */
/* Location: ./application/models/app/recovery/AppRecoveryModel.php */