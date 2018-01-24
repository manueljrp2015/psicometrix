<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppFunctionsModel extends CI_Model {

  	public function hashPassword($password)
  	{
		$opciones = [
            'cost' => 12,
        ];
    	return password_hash($password, PASSWORD_BCRYPT, $opciones);
  	}


  	public function generatePassword()
    {
        $tokenrand = '';
        $string = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'W', 'X', 'Y', 'Z','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'w', 'x', 'y', 'z');
        $number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        for ($i = 0; $i <= 3; $i++) {
            $rand = rand(0, 48);
            $randn = rand(0, 9);
            $tokenrand .= $number[$randn];
            $tokenrand .= $string[$rand];
        }

        return $tokenrand;
    }

}

/* End of file AppFunctionsModel.php */
/* Location: ./application/models/app/functions/AppFunctionsModel.php */