<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if(empty($_SESSION['username'])){
		    redirect('akses/login');
		}
	}
    
    public function index(){
    	$this->load->model('M_dashboard');
        $data['buku'] = $this->M_dashboard->get_count('tb_buku');
        $data['kategori'] = $this->M_dashboard->get_count('tb_kategori');
        $data['pinjam'] = $this->M_dashboard->get_count('tb_pinjam');
        //$data['pelanggan'] = $this->M_dashboard->get_count('tb_pelanggan', ' WHERE aktif="1"');
        //$data['pesanan'] = $this->M_dashboard->get_count('tb_pesanan');
        $this->render_page('v_dashboard/dashboard_view',$data);
    }


}