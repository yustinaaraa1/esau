<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_general extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

    function get_($table, $kolom, $where1 = '',$where2 = '', $where3 = ''){
    	$q = "SELECT $kolom FROM $table $where1 $where2 $where3";
    	$qx = $this->db->query($q);
    	return $qx->result();
    }


}