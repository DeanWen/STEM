<?php
session_start();

    function buildTop()
    {
    if(!$_SESSION['myusername'])
        header('location:login.php'); // redirect
    else
        echo '<!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8"/>
            <title>SERI Funding Management</title>
            
            <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
            <!--[if lt IE 9]>
            <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
            <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
            <script src="js/hideshow.js" type="text/javascript"></script>
            <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
            <script type="text/javascript">
            $(document).ready(function() 
                { 
                  $(".tablesorter").tablesorter(); 
             } 
            );
            $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });
        });
            </script>
            <script type="text/javascript">
            $(function(){
                $(".column").equalHeight();
            });
        </script>
        </head>'; 
    }
    
    function buildBody()
    {
        echo '<body>
<header id="header">
        <hgroup>
            <h1 class="site_title"><a href="index.php">SERI Funding Management</a></h1>
            <h2 class="section_title">Dashboard</h2>
        </hgroup>
    </header> <!-- end of header bar -->
    
    <section id="secondary_bar">
        <div class="user">
            <p>'.$_SESSION['myusername'].'</p>
            <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs"><a href="index.php">Index</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
        </div>
    </section><!-- end of secondary bar -->
        <aside id="sidebar" class="column">
        <!-- <form class="quick_search">
            <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=""};this._haschanged=true;">
        </form> 
        <hr/> -->
        <h3>Content</h3>
        <ul class="toggle">
            <li class="icn_tags"><a href="STEM.php">STEM Program</a></li>
            <li class="icn_tags"><a href="people.php">People</a></li>
            <li class="icn_tags"><a href="fundingsource.php">Funding Source</a></li>
            <li class="icn_tags"><a href="grant.php">Grant</a></li>
            <li class="icn_tags"><a href="department.php">Department</a></li>
            <li class="icn_tags"><a href="school.php">School</a></li>
            <li class="icn_tags"><a href="organization.php">Organization</a></li>
            <li class="icn_tags"><a href="audience.php">Audience</a></li>
            <li class="icn_tags"><a href="keyword.php">Keyword</a></li>
            <li class="icn_tags"><a href="personnel.php">Personnel</a></li> 
            <li class="icn_tags"><a href="#">Program/Keyword/Audience</a></li>
        </ul>
        <h3>Admin</h3>
        <ul class="toggle">
'?>

<?php 
    if($_SESSION['myadminlevel'] == "root")
    echo '<li class="icn_add_user"><a href="adduser.php">Add New User</a></li>
          <li class="icn_view_users"><a href="viewUsers.php">View Users</a></li>'
?>

<?
        echo'
            <li class="icn_profile"><a href="viewself.php">Your Profile</a></li>
            <li class="icn_new_article"><a href="upload.php">Upload Data</a></li>
            <li class="icn_jump_back"><a href="logout.php">Logout</a></li>
        </ul>
        
        <footer>
            <hr />
            <p><strong>Copyright &copy; 2014 IUPUI SERI</strong></p>
            <p>Theme by <a href="#">MediaLoot</a></p>
        </footer>
    </aside><!-- end of sidebar -->
    <section id="main" class="column">
    <article class="module width_full">
        <header><h3 class="tabs_involved">Content Manager</h3></header>
        <div id="tab1" class="tab_content">';
    }

    function buildBottom()
    {
        echo ' </div>
            </article>
        </section>
        </body>
        </html>';
    }
?>
