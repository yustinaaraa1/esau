<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_akses extends CI_Model
{

    function __construct(){
        parent::__construct();
    }


    function get_table(){
        $table = "tb_user";
        return $table;
    }


    function get_user_count($column, $value){
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_user($column, $value)
    {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        return $query->result();
    }



}
