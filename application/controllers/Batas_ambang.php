<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batas_ambang extends CI_Controller {
    function __construct() {
        parent::__construct();
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
            $crud->set_table('ambang_batas');
            $crud->set_subject('Ambang Batas');
            $crud->columns('nama_ambang_batas','batas_atas','batas_bawah');
            $crud->order_by('id_ambang_batas','ASC');
            $crud->fields('id_ambang_batas','nama_ambang_batas','batas_atas','batas_bawah');
            $crud->change_field_type('id_ambang_batas','invisible');
            $crud->change_field_type('nama_ambang_batas','invisible');
            $crud->unset_read();
            $crud->unset_add();
            $crud->unset_delete();
            $output = $crud->render();

            $this->render_page($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

}
