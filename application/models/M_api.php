<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_api extends CI_Model
{

    function __construct(){
        parent::__construct();
    }


    function get_table(){
        $table = "tb_pelanggan";
        return $table;
    }


    function get_pelanggan_count($column, $value){
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_pelanggan($column, $value)
    {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        return $query->result();
    }

    function insert_judul($data){
        $this->db->insert('tb_judul', $data);
    }


    function get_skripsi_lama(){
        $q = "SELECT * FROM tb_skripsi_lama WHERE aktif='1'";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_tema(){
        $q = "SELECT * FROM tb_tema WHERE aktif='1'";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_bobot_penjurusan(){
        $q = "SELECT * FROM tb_bobot_penjurusan LIMIT 1";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_bobot_kepentingan(){
        $q = "SELECT * FROM tb_bobot_kepentingan LIMIT 1";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_penjurusan(){
        $q = "SELECT * FROM tb_penjurusan WHERE aktif='1'";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_mahasiswa_byid($id_mahasiswa){
        $q = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
        $qx = $this->db->query($q);
        return $qx->result();
    }

    function get_hasil_bymahasiswa($id_mahasiswa){
        $q = "SELECT * FROM tb_hasil WHERE id_mahasiswa='$id_mahasiswa'";
        $qx = $this->db->query($q);
        return $qx->result();
    }


}
