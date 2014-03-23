<?php
include ("Classes/phpmydatagrid.class.php"); 
include "layoutTemplate.php";

$objGrid = new datagrid; 
$objGrid->closeTags(true);   
$objGrid->friendlyHTML();   
$objGrid->methodForm("get");  
$objGrid->conectadb("localhost", "root", "", "STEM_DB");
$objGrid->salt("Myc0defor5tr0ng3r-Pro3EctiOn"); 
$objGrid->language("en");
$objGrid->buttons(true,true,true,false);
$objGrid->Form('Department', true);
$objGrid->searchby("DepartmentName");
$objGrid->tabla ("Department_Center");
$objGrid->keyfield("DepartmentID");
$objGrid->datarows(20);
$objGrid->orderby("DepartmentName", "ASC");
$objGrid->FormatColumn("DepartmentID", "Department ID", 10, 10, 0, "50", "center", "text");
$objGrid->FormatColumn("DepartmentName", "Department Name", 50, 50, 0, "300", "center", "text");
$objGrid->FormatColumn("SchoolDivisionID", "School Name", 50, 50, 0, "300", "center", "select:SELECT SchoolDivisionID, SchoolDivisionName FROM School_Division");
$objGrid->checkable(); 
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