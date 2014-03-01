<?php
include "db_connect.php";

function uploadFile($filetempname)    
{           
	require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';
    //require_once 'PHPExcel\Reader\Excel5.php';//excel 2003   
    require_once 'Classes/PHPExcel/Reader/Excel2007.php';//excel 2007   
  
    //upload file path   
    $filePath = 'upFile/'; 
    $uploadfile=$filePath.date("y-m-d h-m-s").".xlsx";//upload file name    
  
    $result=move_uploaded_file($filetempname,$uploadfile);//move to upload folder  

    if($result) //if upload successed, then read and insert data  
    {   
       // $objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2003   
       $objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007    
       // $objPHPExcel = $objReader->load($uploadfile); //httpd crash   
       $objPHPExcel = PHPExcel_IOFactory::load($uploadfile);   
  
       $sheet = $objPHPExcel->getSheet(0); 
       $highestRow = $sheet->getHighestRow(); // total rows    
       $highestColumn = $sheet->getHighestColumn(); // total columns   
       
	$conn = connect();

	for($j=2;$j<=$highestRow;$j++)
	{
	    $UID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
	    $LastName = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
	    $FirstName = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
	    $FullName = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
	    $Email = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
	    $Phone = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
	    $Title = $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();
	    $DepartmentID = $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();
	    $sql = "INSERT INTO People VALUES('".$UID."','1','".$LastName."','".$FirstName."','".$FullName."','".$Email."','".$Phone."','".$Title."')";
	    //echo $sql;
	 	mysql_query($sql,$conn);
	}
  
     
       unlink ($uploadfile); //delete uploaded file 
       mysql_close($conn); 
       $msg = "success";  
    }else{  
       $msg = "fail";   
    }   
    return $msg;   
}
?>