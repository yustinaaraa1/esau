<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('general_helper');
    }

    public function render_page($output = null)
    {
        $this->load->view('main.php',(array)$output);
    }


    public function index()
    {     
        try{
            $crud = new grocery_CRUD();
            $crud->set_theme('flexigrid');
            $crud->set_table('tb_buku');
            $crud->set_subject('Buku');
            $crud->columns('sku','judul_buku','pengarang','penerbit','tahun_terbit','jumlah_buku');
            $crud->order_by('id_buku', 'DESC');
            $crud->fields('id_buku','id_kategori','sku','judul_buku','pengarang','penerbit','tahun_terbit','jumlah_buku');
            $crud->change_field_type('id_buku','invisible');
            $crud->set_relation('id_kategori','tb_kategori', 'nama_kategori');
            $crud->display_as('id_kategori','Nama Kategori');
            $output = $crud->render();
            $this->render_page($output);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

}
