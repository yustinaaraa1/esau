<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_data_pinjam extends MY_Controller {

   function index(){
        $this->render_page('v_setting/import_data_pinjam');
    }

    public function act() {
        $fileName = $_FILES['file']['name'];
         
        $config['upload_path'] = './assets/file_excel/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        
        $this->load->library('excel');
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data();
        $inputFileName = './assets/file_excel/'.$media['file_name'];
        // print_r ($media);die();
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
         
        for ($row = 4; $row <= $highestRow; $row++){                         
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);                   
                $data = array(
                    'id_buku' => $rowData[0][0],
                    // 'tgl_pinjam' =>  PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][1],'YYYY-MM-DD'),
                    // 'nama_mahasiswa' => PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][2],'H:I:S'),
                    'bulan' => $rowData[0][1],
                    'tahun' => $rowData[0][2],
                    'jumlah_dipinjam' => $rowData[0][3],
                );
                //print_r($data);
                //echo '<br>';
                $this->db->insert('tb_pinjam',$data);
        }
        //unlink('./assets/file_excel/siswa_yappi1.xlsx');
        redirect('Import_data_pinjam');     
    }
}