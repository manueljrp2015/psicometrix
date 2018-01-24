<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppOauthModel extends CI_Model {


	public function oauthAutorized($data){
	    $quser = $this->db->where("_email", strtolower(base64_decode($data["_email"])))
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


     public function oauthChecked()
    {
        if ($this->session->userdata("id")) {
            return TRUE;
        } else {
            $this->session->sess_destroy();
            redirect(URL_WEB, 'auto');
        }
    }

    public function oauthDestroySession()
    {
        if ($this->session->userdata("id")) {
            $this->session->sess_destroy();
            redirect(URL_WEB, 'auto');
        } else {
            $this->session->sess_destroy();
            redirect(URL_WEB, 'auto');
        }
    }
}

/* End of file AppOauthModel.php */
/* Location: ./application/models/app/oauth/AppOauthModel.php */