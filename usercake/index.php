<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");

echo '
<body>
<header id="header">
        <hgroup>
            <h1 class="site_title"><a href="index.php">SERI Funding Management</a></h1>
        </hgroup>
    </header> <!-- end of header bar -->
<div id="left-nav">';

include("left-nav.php");

echo "
</div>
</body>
</html>";

?>
