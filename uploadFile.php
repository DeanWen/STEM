<?php
include "db_connect.php";

function uploadFile($filetempname,$leadExcel)    
{           
	require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';
    //require_once 'PHPExcel\Reader\Excel5.php';//excel 2003   
    require_once 'Classes/PHPExcel/Reader/Excel2007.php';//excel 2007   
  
    //upload file path   
    $filePath = 'upFile/'; 
    $uploadfile=$filePath.date("y-m-d h-m-s").".xlsx";//upload file name    
  
    $result=move_uploaded_file($filetempname,$uploadfile);//move to upload folder  
    $msg = "fail";
    $count = 0;
    $active = "N";

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
    if($leadExcel == 'people'){
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
    	    $sql = "INSERT INTO People VALUES('".$UID."','".$DepartmentID."','".$LastName."','".$FirstName."','".$FullName."','".$Email."','".$Phone."','".$Title."')";
    	    //echo $sql;
        // if(mysql_query($sql,$conn))
        //    $msg = "success";    
        if(mysql_query($sql,$conn)) $count++;   	
       }
    }
    if($leadExcel == 'school'){
      for($j=2;$j<=$highestRow;$j++)
      {
          $SchoolDivisionID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
          $SchoolDivisionName = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
          $OrgID = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
          $sql = "INSERT INTO School_Division VALUES('".$SchoolDivisionID."','".$SchoolDivisionName."','".$OrgID."')";
          //echo $sql;
        // if(mysql_query($sql,$conn))
        //    $msg = "success";        
        if(mysql_query($sql,$conn)) $count++; 
       }
    }
    if($leadExcel == 'department'){
      for($j=2;$j<=$highestRow;$j++)
      {
          $DepartmentID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
          $DepartmentName = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
          $SchoolDivisionID = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
          $sql = "INSERT INTO Department_Center VALUES('".$DepartmentID."','".$DepartmentName."','".$SchoolDivisionID."')";
          //echo $sql;
        // if(mysql_query($sql,$conn))
        //    $msg = "success"; 
        if(mysql_query($sql,$conn)) $count++;  
      }
    }
    if($leadExcel == 'fundingsource'){
      for($j=2;$j<=$highestRow;$j++)
      {
          $FundID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
          $FundName = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
          $ShortName = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
          $sql = "INSERT INTO FundingSource VALUES('".$FundID."','".$FundName."','".$ShortName."')";
          //echo $sql;
        // if(mysql_query($sql,$conn))
        //    $msg = "success"; 
        if(mysql_query($sql,$conn)) $count++;  
      }
    }
    if($leadExcel == 'stem'){
      for($j=2;$j<=$highestRow;$j++)
      {
          $STEMID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
          $UID = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
          if(empty($UID))
            $UID='0';
          $FundID = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
          if(empty($FundID))
            $FundID='0';            
          $GrantID = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
           if(empty($GrantID))
            $GrantID='0';
          $InitiativeName = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
          $Relationship = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
          $FundAmount = $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();
          $StartDate = PHPExcel_Style_NumberFormat::toFormattedString($objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue(), 'YYYY-MM-DD');
          $EndDate = PHPExcel_Style_NumberFormat::toFormattedString($objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue(), 'YYYY-MM-DD');
          $Evaluator = $objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();
          $ProjectURL = $objPHPExcel->getActiveSheet()->getCell("K".$j)->getValue();

          $sql = "INSERT INTO STEM VALUES('".$STEMID."','".$UID."','".$FundID."','".$GrantID."','".$InitiativeName."',
                                          '".$Relationship."','".$FundAmount."','".$StartDate."','".$EndDate."',
                                          '".$Evaluator."','".$ProjectURL."','".$active."')";
          //echo $sql;
        if(mysql_query($sql,$conn)) $count++; 
      }
    }

    if($count == $highestRow)
      $msg = "success"; 
    else
      $msg = "incomplete";

       unlink ($uploadfile); //delete uploaded file 
       mysql_close($conn); 
    }else{  
       $msg = "fail";   
    }   
    return $msg;   
}
?>