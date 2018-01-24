<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppInterestsModel extends CI_Model {

	public function getInterests(){
		return $this->db->where(["_status" => "a"])->get("interests")->result();
	}

	public function putInterest($data){
		
		for($i=0; $i < count($data["_interest"]); $i++){
			$query = $this->db->where(["_interests_id" => $data["_interest"][$i], "_user_id" => $data["user_id"]])
			->get("user_interests")
			->row();
			if ($query) {
				
			} else {
				$this->db->insert("user_interests",[
					"_user_id" => $data["user_id"],
					"_interests_id" => $data["_interest"][$i]
				]);
			}
			
		}
		return true;
	}

	public function getMyInterests($data){
		return $this->db->query("
						SELECT
							iuser.*, nin._interests
						FROM
							psmtx_user_interests AS iuser
						LEFT JOIN psmtx_interests AS nin ON nin.id = iuser._interests_id
						WHERE
							iuser._user_id = ".$data["id_user"].";
				")->result();
	}

	public function getCommonInterest($data){
		$a = "";
		$query_one = $this->db->query("
			SELECT
				t1._user_id,
				t2._user_id as id_relacion,
			CONCAT(
					oauth2._firtsname,
					' ',
					oauth2._lastname
				) AS el,
				COUNT(t1._interests_id) as nro_intereses
			FROM
				psmtx_user_interests t1
			INNER JOIN psmtx_user_interests t2 ON t2._interests_id = t1._interests_id
			LEFT JOIN psmtx_oauth AS oauth2 ON oauth2.id = t2._user_id
			LEFT JOIN psmtx_interests as nint on nint.id = t1._interests_id
			WHERE
				t1._user_id = ".$data["id_user"]."
			AND t2._user_id <> ".$data["id_user"]."
			GROUP BY t2._user_id
			HAVING COUNT(t1._interests_id) >= 3;
			")->result();

		foreach ($query_one as $key1 => $value_1) {
			$query_two = $this->db->query("
						SELECT
							iuser.*, nin._interests
						FROM
							psmtx_user_interests AS iuser
						LEFT JOIN psmtx_interests AS nin ON nin.id = iuser._interests_id
						WHERE
							iuser._user_id = ".$value_1->id_relacion.";
			")->result();

						if($query_two){
							foreach ($query_two as $key2 => $value_2) {
					    		$ss[$key1][$key2] = $value_2;
					    	}
					    }
						else{
							$ss[$key1][0] = 0;
						}

    		
    		$a[] = [
				"user_id"       => $value_1->_user_id, 
				"id_relacion"   => $value_1->id_relacion, 
				"el"            => $value_1->el, 
				"nro_intereses" => $value_1->nro_intereses, 
				"intereses"     => $ss[$key1]];
		}
		return ($a == null) ? null : $a;
	}

}

/* End of file AppInterestsModel.php */
/* Location: ./application/models/app/interests/AppInterestsModel.php */