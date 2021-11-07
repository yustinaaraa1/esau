<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
            $crud->set_table('tb_admin');
            $crud->set_subject('Admin');
            $crud->columns('nama_lengkap','username');
            $crud->fields('id_admin','nama_lengkap','username','password');
            $crud->order_by('id_admin', 'DESC');
            $crud->change_field_type('id_admin','invisible');
            $crud->unset_read();
            $output = $crud->render();
            $this->render_page($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

}
