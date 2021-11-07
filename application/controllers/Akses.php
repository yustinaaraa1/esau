<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('login');
    }

    public function login_act(){
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[64]|alpha');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]|max_length[64]');
            
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $s_count = $this->M_general->get_('tb_admin', 'COUNT(id_admin) as count', 'WHERE username="'.$username.'" AND password="'.$password.'"');
                $count = $s_count[0]->count;
                if ($count == 0) {
                    $link = base_url();
                    $login= 'FALSE';
                    $pesan= 'Username / Password Salah';
                } else {
                    $user=$this->M_general->get_('tb_admin', '*', 'WHERE username="'.$username.'" AND password="'.$password.'"');
                    //print_r($user);
                    $newdata = array(
                        'logged_in'  => true,
                        'id_admin'  => $user[0]->id_admin,
                        'nama_lengkap' => $user[0]->nama_lengkap,
                        'username'  => $user[0]->username,
                        'password' => $user[0]->password
                    );
                    $this->session->set_userdata($newdata);
                    $link = base_url().'/dashboard';
                    $login= 'TRUE';
                    $pesan= 'oke';
                } 
                $json=array(
                    'login'=>$login,
                    'link'=>$link,
                    'pesan'=>$pesan,
                );
                print_r(json_encode($json)); 
            } else {
                $json=array(
                    'login'=>'FALSE',
                    'pesan'=> validation_errors()
                );

                print_r(json_encode($json));
            }
        }
    }


    public function logout(){
        $newdata = array(
            'id_admin',
            'nama_lengkap',
            'username',
            'password'
        );
        $this->session->unset_userdata($newdata);
        redirect('akses','refresh');
    }

}