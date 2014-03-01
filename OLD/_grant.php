<?php
include "db_connect.php";
$title = "GrantProgram";
$sql = "SELECT * FROM GrantProgram";
$page_content = bind($sql);
include "master.php";


function bind($sql)
{
    $conn = connect();
    $result = mysql_query($sql, $conn) or die(mysql_error());

    $content = <<< HERE
    <article class="module width_3_quarter">
        <header><h3 class="tabs_involved">Content Manager</h3></header>
        <div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
					<th>Grant ID</th>
                    <th>Grant Name</th>
                    <th>Funder</th>
                    <th>Personnel</th>
                    <th>Action</th>
				</tr> 
			</thead> 
			<tbody>
HERE;
    while ($row = mysql_fetch_assoc($result))
    {
        $GrantID = $row["GrantID"];
        $GrantName = $row["GrantName"];
        $Funder = $row["Funder"];
        $Personnel = $row["Personnel"];       
        $content .= <<< HERE
        <tr>
            <td>$GrantID</td>
            <td>$GrantName</td>
            <td>$Funder</td>
            <td>$Personnel</td>
			<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
        </tr>
HERE;
    }
    $content .= "</tbody>";
    $content .= "</table>";
    return $content;
}
?>