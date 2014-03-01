<?php
include "db_connect.php";
$title = "Keyword";
$sql = "SELECT * FROM Keyword";
$page_content = bind($sql);
include "master.php";


function bind($sql)
{
    $conn = connect();
    $result = mysql_query($sql, $conn) or die(mysql_error());

    $content = <<< HERE
    <article class="module width_quarter">
        <header><h3 class="tabs_involved">Content Manager</h3></header>
        <div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
					<th>Keyword</th>
                    <th>Action</th>
				</tr> 
			</thead> 
			<tbody>
HERE;
    while ($row = mysql_fetch_assoc($result))
    {
        $keyword = $row["Keyword"];
        $content .= <<< HERE
        <tr>
            <td>$keyword</td>
			<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
        </tr>
HERE;
    }
    $content .= "</tbody>";
    $content .= "</table>";
    return $content;
}
?>