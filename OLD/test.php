<?php
include ("phpmydatagrid.class.php"); 

$objGrid = new datagrid; 
$objGrid->closeTags(true);   
$objGrid->friendlyHTML();   
$objGrid->methodForm("get");  
$objGrid->conectadb("localhost", "root", "", "STEM_DB");
$objGrid->salt("Myc0defor5tr0ng3r-Pro3EctiOn"); 
$objGrid->language("en");
$objGrid->buttons(true,true,true,false);
$objGrid->Form('grant', true);
$objGrid->searchby("GrantName");
$objGrid->tabla ("GrantProgram");
$objGrid->keyfield("GrantID");
$objGrid->datarows(20);
$objGrid->orderby("GrantName", "ASC");
$objGrid->FormatColumn("GrantID", "Grant ID", 5, 5, 0, "5", "center", "integer");
$objGrid->FormatColumn("GrantName", "Grant Name", 20, 20, 0, "100", "center", "text");
$objGrid->FormatColumn("Funder", "Funder", 20, 20, 0, "100", "center", "text");
$objGrid->FormatColumn("Personnel", "Personnel", 100, 100, 0, "100", "center", "SELECT * FROM Personnel");
$objGrid->checkable(); 

$objGrid -> setHeader(); 
$objGrid -> ajax('silent','1');
$objGrid -> grid(); 
$objGrid -> desconectar(); 


?>