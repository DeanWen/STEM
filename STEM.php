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
$objGrid->Form('STEM', true);
$objGrid->searchby("ProgramID,InitiativeName,UID,GrantID");
$objGrid->tabla ("STEM");
$objGrid->keyfield("ProgramID");
$objGrid->datarows(20);
$objGrid->orderby("InitiativeName", "ASC");
$objGrid->FormatColumn("Active", "Active", 10, 10, 0, "50", "center", "select:Y:N");
$objGrid->FormatColumn("ProgramID", "Program ID", 10, 10, 0, "50", "center", "text");
$objGrid->FormatColumn("InitiativeName", "Initiative Name", 50, 50, 0, "100", "center", "text");
$objGrid->FormatColumn("UID", "PI", 50, 50, 0, "100", "center", "select:SELECT UID, FullName FROM People");
$objGrid->FormatColumn("FundID", "Funding Source", 50, 50, 0, "80", "center", "select:SELECT FundID, EntityShortName FROM FundingSource");
$objGrid->FormatColumn("GrantID", "GrantName", 50, 50, 0, "80", "center", "select:SELECT GrantID, GrantName FROM GrantProgram");
$objGrid->FormatColumn("Relationship", "Relationship", 50, 50, 0, "50", "center", "text");
$objGrid->FormatColumn("FundingAmount", "Amount", 50, 50, 0, "10", "center", "integer");
$objGrid->FormatColumn("StartDate", "Start Date", 50, 50, 0, "80", "center", "text");
$objGrid->FormatColumn("EndDate", "End Date", 50, 50, 0, "80", "center", "text");
$objGrid->FormatColumn("ProjectURL", "Project URL", 50, 50, 0, "100", "center", "text");
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