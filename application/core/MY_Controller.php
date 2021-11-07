<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
	public $js='';

	function __construct()
	{
		parent::__construct();
	}

    function render_page($content, $data = NULL){
    	// print_r($this->js);die();
       	$template['head'] 	= $this->load->view('layouts/head','',TRUE);
       	$template['sidebar']= $this->load->view('layouts/sidebar','',TRUE);
       	$template['navbar'] = $this->load->view('layouts/navbar','',TRUE);
       	$template['content']= $this->load->view($content,$data,TRUE);
        $template['footer'] = $this->load->view('layouts/footer','',TRUE);
        $template['js'] 	= $this->load->view('layouts/js','',TRUE);
        $template['file_js']= $this->js;  

        $this->load->view('layouts/main', $template);
    }
}