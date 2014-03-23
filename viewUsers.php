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
$objGrid->buttons(false,true,true,false);
$objGrid->Form('admin', true);
$objGrid->searchby("UserName");
$objGrid->tabla ("Admin");
$objGrid->keyfield("UserName");
$objGrid->datarows(20);
$objGrid->orderby("LastName", "ASC");
$objGrid->FormatColumn("UserName", "User Name", 20, 20, 0, "100", "center", "text");
$objGrid->FormatColumn("Passcode", "Passcode", 100, 100, 0, "100", "center","text");
$objGrid->FormatColumn("Adminlevel", "Admin level", 100, 100, 1, "100", "center","selected:general:root");
$objGrid->FormatColumn("FirstName", "First Name", 20, 20, 0, "100", "center", "text");
$objGrid->FormatColumn("LastName", "Last Name", 20, 20, 0, "100", "center", "text");
$objGrid->FormatColumn("Email", "Email", 100, 100, 0, "200", "center","text");
$objGrid->FormatColumn("Phone", "Phone", 100, 100, 0, "100", "center","text");

$objGrid -> poweredby = false;
$objGrid->checkable(); 

if (!isset($_REQUEST["DG_ajaxid"])){ // If we intercept an AJAX request from page  
                                     // then do not display data below     
    buildTop();
    $objGrid -> setHeader(); 
    buildBody();
    //$objGrid -> ajax('silent'); //disabled online editing

    } // if (!isset($_REQUEST["DG_ajaxid"])) end interception, until here, script wont be processed when DG_ajaxid is set 

    $objGrid -> ajax('silent'); //disabled online editing
    $objGrid -> grid(); 
    $objGrid -> desconectar(); 

    buildBottom();
?>