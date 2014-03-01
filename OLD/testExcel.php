<?php
include "db_connect.php";

require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Reader/Excel5.php';
//以上三步加载phpExcel的类
$objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007 for 2007 format 
$filename="Book1.xlsx";//指定excel文件
$objPHPExcel = $objReader->load($filename); //$filename可以是上传的文件，或者是指定的文件
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); // 取得总行数 
$highestColumn = $sheet->getHighestColumn(); // 取得总列数
//循环读取excel文件,读取一条,插入一条
//j表示从哪一行开始读取
//$a表示列号

$conn = connect();

for($j=2;$j<=$highestRow;$j++)
{
    $UID = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
    $LastName = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
    $FirstName = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取C列的值
    $FullName = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取A列的值
    $Email = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();//获取B列的值
    $Phone = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();//获取C列的值
    $Title = $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();//获取A列的值
    $DepartmentID = $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();//获取B列的值
    $sql = "INSERT INTO People VALUES('".$UID."','1','".$LastName."','".$FirstName."','".$FullName."','".$Email."','".$Phone."','".$Title."')";
    echo $sql;

 	mysql_query($sql,$conn);

}
	mysql_close($conn);

?>