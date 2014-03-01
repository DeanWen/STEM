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
$objGrid->FormatColumn("Personnel", "Personnel", 100, 100, 0, "100", "center","select: * FROM Personnel",);
$objGrid->checkable(); 

if (!isset($_REQUEST["DG_ajaxid"])){ // If we intercept an AJAX request from page  
                                     // then do not display data below     
    buildTop();
    $objGrid -> setHeader(); 
    buildBody();

    } // if (!isset($_REQUEST["DG_ajaxid"])) end interception, until here, script wont be processed when DG_ajaxid is set 

    //$objGrid -> ajax('silent'); //disabled online editing
    $objGrid -> grid(); 
    $objGrid -> desconectar(); 

    buildBottom();
?>