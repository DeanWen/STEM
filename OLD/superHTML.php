<?php
class SuperHTML
{
    var $title;
    var $thePage;

    //Constructor
    function __construct($tTitle = "Super HTML")
    {
        $this->setTitle($tTitle);
    }
    
    function getTitle()
    {
        return $this->title;
    }
    
    function setTitle($tTitle)
    {
        $this->title = $tTitle;
    }
    
    function getPage()
    {
        return $this->thePage;
    }
    
    function addText($content)
    {
        $this->thePage .= $content;
        $this->thePage .= "\n";
    }
    
    function gAddText($content)
    {
        $temp = $content;
        $temp .= "\n";
        return $temp;
    }
    
    function buildTop()
    {
        $temp = <<<HERE
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8"/>
            <title>Dashboard I Admin Panel</title>
            
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
                $('.column').equalHeight();
            });
        </script>
        </head>
HERE;
        $this->addText($temp);
    }
    
    function buildBody()
    {
        $temp = <<<HERE
        <body>
<header id="header">
        <hgroup>
            <h1 class="site_title"><a href="index.php">SERI Funding Management</a></h1>
            <h2 class="section_title">Dashboard</h2>
        </hgroup>
    </header> <!-- end of header bar -->
    
    <section id="secondary_bar">
        <div class="user">
            <p>Dean Wen</p>
            <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs"><a href="index.php">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
        </div>
    </section><!-- end of secondary bar -->
    
    <aside id="sidebar" class="column">
        <form class="quick_search">
            <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
        </form>
        <hr/>
        <h3>Content</h3>
        <ul class="toggle">
            <li class="icn_tags"><a href="people.php">People</a></li>
            <li class="icn_tags"><a href="keyword.php">Keyword</a></li>
            <li class="icn_tags"><a href="audience.php">Audience</a></li>
            <li class="icn_tags"><a href="stem.php">STEM Program</a></li>
            <li class="icn_tags"><a href="fundingagency.php">Fund Agency</a></li>
            <li class="icn_tags"><a href="grant.php">Grant</a></li>
            <li class="icn_tags"><a href="#">School/Division</a></li>
        </ul>
        <h3>Admin</h3>
        <ul class="toggle">
            <li class="icn_add_user"><a href="#">Add New User</a></li>
            <li class="icn_view_users"><a href="#">View Users</a></li>
            <li class="icn_profile"><a href="#">Your Profile</a></li>
            <li class="icn_jump_back"><a href="#">Logout</a></li>
        </ul>
        
        <footer>
            <hr />
            <p><strong>Copyright &copy; 2014 IUPUI STEM</strong></p>
            <p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
        </footer>
    </aside><!-- end of sidebar -->
    </header>
    <section id="main" class="column">

HERE;
    $this->addText($temp);
    }
    
    function buildBottom()
    {
        $temp = <<<HERE
             </section>
         </body>
        </html>
HERE;
        $this->addText($temp);
    }

    function startTable(){
        $this->thePage .= "<table>\n";
    } // end startTable

    function tRow ($rowData, $rowType = "td"){
      //expects an array in rowdata, prints a row of th values
      $this->thePage .= "<tr> \n";
      foreach ($rowData as $cell){
        $this->thePage .= "  <$rowType>$cell</$rowType> \n";
      } // end foreach
      $this->thePage .= "</tr> \n";
    } // end tRow
  
    function endTable(){
      $this->thePage .= "</table> \n";
    } // end 
}
?>