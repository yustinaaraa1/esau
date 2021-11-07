<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dashboard extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

    function get_count($table, $where1 = '', $where2 = ''){
    	$q = "SELECT COUNT(1) as jml FROM $table $where1 $where2";
    	$qx = $this->db->query($q);
    	return $qx->result();
    }

}