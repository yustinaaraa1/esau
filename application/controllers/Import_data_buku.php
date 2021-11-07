<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_data_buku extends MY_Controller {

   function index(){
        $this->render_page('v_setting/import_data_buku');
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
                    'id_kategori' => $rowData[0][0],
                    // 'tgl_pinjam' =>  PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][1],'YYYY-MM-DD'),
                    // 'nama_mahasiswa' => PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][2],'H:I:S'),
                    'sku' => $rowData[0][1],
                    'judul_buku' => $rowData[0][2],
                    'pengarang' => $rowData[0][3],
                    'penerbit' => $rowData[0][4],
                    'tahun_terbit' => $rowData[0][5],
                    'jumlah_buku' => $rowData[0][6],
                );
                //print_r($data);
                //echo '<br>';
                $this->db->insert('tb_buku',$data);
        }
        //unlink('./assets/file_excel/siswa_yappi1.xlsx');
        redirect('Import_data_buku');     
    }
}