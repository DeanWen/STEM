<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>SERI Funding Management-Guest View</title>       
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
    $(function(){
        $(".column").equalHeight();
    });
</script>
</head>
<?php
include ("phpmydatagrid.class.php"); 

$objGrid = new datagrid; 
$objGrid->closeTags(true);   
$objGrid->friendlyHTML();   
$objGrid->methodForm("get");  
$objGrid->conectadb("localhost", "root", "", "STEM_DB");
$objGrid->salt("Myc0defor5tr0ng3r-Pro3EctiOn"); 
$objGrid->language("en");
$objGrid->buttons(true,false,false,true);
$objGrid->Form('STEM', true);
$objGrid->searchby("ProgramID,InitiativeName");
$objGrid->tabla ("STEM");
$objGrid->keyfield("ProgramID");
$objGrid->datarows(20);
$objGrid->orderby("InitiativeName", "ASC");
$objGrid->where("active = 'Y'");
$objGrid->FormatColumn("ProgramID", "Program ID", 10, 10, 0, "50", "center", "text");
$objGrid->FormatColumn("InitiativeName", "Initiative Name", 50, 50, 0, "100", "center", "text");
$objGrid->FormatColumn("UID", "PI", 50, 50, 0, "100", "center", "select:SELECT UID, FullName FROM People");
$objGrid->FormatColumn("FundID", "Funding Source", 50, 50, 0, "80", "center", "select:SELECT FundID, EntityShortName FROM FundingSource");
$objGrid->FormatColumn("GrantID", "Grant Name", 50, 50, 0, "80", "center", "select:SELECT GrantID, GrantName FROM GrantProgram");
$objGrid->FormatColumn("Relationship", "Relationship", 50, 50, 0, "50", "center", "text");
$objGrid->FormatColumn("FundingAmount", "Amount", 50, 50, 0, "10", "center", "integer");
$objGrid->FormatColumn("StartDate", "Start Date", 50, 50, 0, "80", "center", "text");
$objGrid->FormatColumn("EndDate", "End Date", 50, 50, 0, "80", "center", "text");
$objGrid->FormatColumn("ProjectURL", "Project URL", 50, 50, 0, "100", "center", "text");
//$objGrid->checkable(); 
$objGrid -> poweredby = false;

if (!isset($_REQUEST["DG_ajaxid"])){ // If we intercept an AJAX request from page  
    
    //buildTop();                                 // then do not display data below         
    $objGrid -> setHeader(); 
?>
<body>
<header id="header">
        <hgroup>
            <h1 class="site_title"><a href="index.php">SERI Funding Management</a></h1>
            <h2 class="section_title">Dashboard</h2>
        </hgroup>
    </header> <!-- end of header bar -->
    
    <section id="secondary_bar">
        <div class="user">
            <p>Guest</p>
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs"><a href="index.php">Index</a><div class="breadcrumb_divider"></div> <a class="current">Guest View</a></article>
        </div>
    </section><!-- end of secondary bar -->
        <aside id="sidebar" class="column">
        <h3>Instruction</h3>
        <p>
            Welcome to the SERI Funding Management Website.<br/>
            You can search the program by clicking <img src="images/icn_search.png">.<br/>
            You can add new program record by clicking <img src="images/icn_add_user.png">.<br/>
            You can view record by clicking <img src="images/icn_view_users.png">. <br/>
            <br/>
            <b>Please Note:</b> <br/><br/>
            New added record needs approval by admin, it won't be showing up before approval.
        </p>

        <br />

        <article class="breadcrumbs"><a class="admin" href="stem.php">Admin Portal</a></article>
        <footer>
            <hr />
            <p><strong>Copyright &copy; 2014 IUPUI SERI</strong></p>
            <p>Theme by <a href="#">MediaLoot</a></p>
        </footer>
        </aside><!-- end of sidebar -->

    <section id="main" class="column">
        <article class="module width_full">
            <header><h3 class="tabs_involved">Content Manager</h3></header>
            <div id="tab1" class="tab_content">
<?
    
    } // if (!isset($_REQUEST["DG_ajaxid"])) end interception, until here, script wont be processed when DG_ajaxid is set 

    $objGrid -> grid(); 
    $objGrid -> desconectar(); 

?>

            </div>
        </article>
    </section>
</body>
</html>

