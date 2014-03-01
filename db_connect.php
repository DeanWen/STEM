<?php
function connect()
{
    $conn = mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("STEM_DB", $conn);
    return $conn;
}
?>