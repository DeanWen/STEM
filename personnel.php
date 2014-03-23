<?php
include ("phpmydatagrid.class.php"); 
include "layoutTemplate.php";

$objGrid = new datagrid; 
$objGrid->closeTags(true);   
$objGrid->friendlyHTML();   
$objGrid->methodForm("get");  
$objGrid->conectadb("localhost", "root", "", "STEM_DB");
$objGrid->salt("Myc0defor5tr0ng3r-Pro3EctiOn"); 
$objGrid->language("en");
$objGrid->buttons(true,true,true,true);
$objGrid->Form('Personnel', true);
$objGrid->searchby("Personnel");
$objGrid->tabla ("Personnel");
$objGrid->keyfield("Personnel");
$objGrid->datarows(20);
$objGrid->orderby("Personnel", "ASC");
$objGrid->FormatColumn("Personnel", "Personnel", 200, 200, 0, "200", "center", "text");
//$objGrid->checkable(); 
$objGrid -> poweredby = false;

if (!isset($_REQUEST["DG_ajaxid"])){ // If we intercept an AJAX request from page  
    
    buildTop();                                 // then do not display data below         
    $objGrid -> setHeader(); 
	buildBody();
    
    } // if (!isset($_REQUEST["DG_ajaxid"])) end interception, until here, script wont be processed when DG_ajaxid is set 
	
	
	$objGrid -> ajax('silent'); 
    $objGrid -> grid(); 
    $objGrid -> desconectar(); 

    buildBottom();
?>