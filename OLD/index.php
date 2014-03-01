<?php
$title = "index";
$page_content = bind();
include "master.php";

function bind()
{
    $content = <<< HERE
        <br />
    	<div style="text-align:center">
             <h1>Welcome to SERI Funding Management System</h1>
        </div>
HERE;
    return $content;
}
?>