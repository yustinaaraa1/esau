<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
            $crud->set_table('tb_kategori');
            $crud->set_subject('Kategori');
            $crud->columns('nama_kategori');
            $crud->order_by('id_kategori','DESC');
            $crud->fields('id_kategori','nama_kategori');
            $crud->change_field_type('id_kategori','invisible');
            $crud->unset_read();
            $output = $crud->render();

            $this->render_page($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

}
