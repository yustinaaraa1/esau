<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster extends MY_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('general_helper');
    }

    public function index(){
        $this->render_page('v_perhitungan/perhitungan_view');
    }

    function iterasi_kmeans(){
        $data['tahun'] = $_POST['tahun'];
        $data['bulan'] = $_POST['bulan'];
        $this->session->set_userdata('bulan', $_POST['bulan']);
        $this->session->set_userdata('tahun', $_POST['tahun']);
        $data['buku'] = $this->M_general->get_('tb_buku', '*', 'LEFT JOIN tb_kategori USING(id_kategori)');
        $this->render_page('v_perhitungan/iterasi_kmeans', $data);  
    }


    function k_means_lanjut(){
        $data['bulan'] = $this->session->userdata('bulan');
        $data['tahun'] = $this->session->userdata('tahun');
        $data['buku'] = $this->M_general->get_('tb_buku', '*', 'LEFT JOIN tb_kategori USING(id_kategori)');
        $this->render_page('v_perhitungan/k_means_lanjut', $data);  
    }

    function lihat_hasil(){
        $data['iterasi'] = $this->M_general->get_('centroid_temp','*','GROUP BY rasio ORDER BY id ASC');
        $this->render_page('v_perhitungan/hasil', $data);   
    }

    function print_hasil(){
        $this->load->library('M_pdf');
        $this->load->helper('general'); 
        $data['iterasi'] = $this->M_general->get_('centroid_temp','*','GROUP BY rasio ORDER BY id ASC');
        $html = $this->load->view('v_perhitungan/print_hasil',$data, true); 
        $pdfFilePath ="Hasil Cluster -".time()."-download.pdf";
        $pdf = $this->m_pdf->load(['tempDir' => '/tmp']);
        $pdf->WriteHTML($html,2);
        $pdf->Output($pdfFilePath, "D");
    }

}
