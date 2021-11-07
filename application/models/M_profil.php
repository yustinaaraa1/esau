<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_profil extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

    function update_user($data, $id_user){
    	$this->db->where('id_user', $id_user);
    	$this->db->update('tb_user', $data);
    }

}