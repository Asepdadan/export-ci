<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {
	public function index(){

	echo "test";

	}


	public function excel()
        {
	 $this->load->library("PHPExcel");
 
            //membuat objek
            $objPHPExcel = new PHPExcel();
 
            //Sheet yang akan diolah
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Hello')
                        ->setCellValue('B2', 'Ini')
                        ->setCellValue('C1', 'Excel')
                        ->setCellValue('D2', 'Pertamaku');
            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
            //Nama File
            header('Content-Disposition: attachment;filename="hasilExcel.xls"');
 
            //Download
            $objWriter->save("php://output");
 
        }

}