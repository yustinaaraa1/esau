<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {
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
            $crud->set_table('tb_pinjam');
            $crud->set_subject('Pinjam');
            $crud->columns('id_buku', 'bulan','tahun', 'jumlah_dipinjam');
            $crud->order_by('id_pinjam', 'DESC');
            $crud->set_relation('id_buku', 'tb_buku', 'judul_buku');
            $crud->display_as('id_buku', 'Nama Buku');
            $crud->change_field_type('id_pinjam','invisible');
            $crud->unset_read();
            //$crud->unset_edit();
            //$crud->unset_delete();
            $output = $crud->render();

            $this->render_page($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }


}
