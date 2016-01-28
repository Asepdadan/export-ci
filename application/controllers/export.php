<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {
	public function index(){

	echo "test";

	}


	public function excel()
        {
        	//download phpexcel
        	//lalu simpan di application/libararies

	 $this->load->library("PHPExcel");
 		$data = $this->Model_data->tampil();
 	

 		
            //membuat objek
            $objPHPExcel = new PHPExcel();
 
            //Sheet yang akan diolah
            
		    $this->load->library('PHPExcel');
		    //Create a new Object
		    $objPHPExcel = new PHPExcel();
		    $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
		    //Loop Heading
		
		    //Loop Result
		    
		    
		    
		                $row = 3;
		        		$no = 1;
		        foreach($data as $n){
		            //$numnil = (float) str_replace(',','.',$n->nilai);
		            $objPHPExcel->getActiveSheet()->setCellValue('C2','no');
		            $objPHPExcel->getActiveSheet()->setCellValue('D2','kode');
		            $objPHPExcel->getActiveSheet()->setCellValue('E2','nama');
		            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$no);
		            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n['kode']);
		            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n['nama']);
		            
		            $row++;
		            $no++;
		        }                    

                       
            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
            //Nama File
            $data = date("m-y-d");
            header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
 
            //Download
            $objWriter->save("php://output");
 
        }

}