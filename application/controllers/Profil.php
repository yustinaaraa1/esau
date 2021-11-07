<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller { 

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil');
    }

    public function index(){
        $this->render_page('v_profil/profil_form');
    }

    public function action(){
    	$data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
    		'password' => $this->input->post('password')
    	);
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('tb_admin', $data);
        $this->session->set_userdata($data);
    	redirect('dashboard', 'refresh');
    }
}
