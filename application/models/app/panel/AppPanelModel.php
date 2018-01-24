<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppPanelModel extends CI_Model {

	public function oauthAutorized($data){
	    $quser = $this->db->where("_email", strtolower("panelmaster@panelmaster.xxx"))
	    ->get("oauth")
	    ->row();

	    if($quser){
	        if (password_verify(base64_decode($data["_key"]), $quser->_key)) {
	              $data = $this->oauthAutorizedSesion($quser);
	              return ["msg" => true, "session" => $data];
	        }
	        else {
	          return "badpass";
	        }
	    }
	    else {
	      return FALSE;
	    }
  	}

  	public function oauthAutorizedSesion($quser){

        $data_session = [
			"id"    => $quser->id,
			"email" => $quser->_email,
			"fname" => $quser->_firtsname,
			"lname" => $quser->_lastname,
        ];

        $this->session->set_userdata($data_session);

        return $data_session;

    }

    public function getListInterest(){
    	return $this->db->order_by("id", "asc")->get("interests")->result();
    }


     public function getListRegister(){
    	return $this->db->get("oauth")->result();
    }


    protected function dataRegister($data){

		return [
			"_interests" => ucwords($data["_inter"]),			];
	}

	public function putRegister($data){
		return $this->db->insert("interests", self::dataRegister($data));
	}

	public function deleteInterests($data){
		return $this->db->where(["id" => $data["id"]])->delete("interests");
	}

}

/* End of file AppPanelModel.php */
/* Location: ./application/models/app/panel/AppPanelModel.php */