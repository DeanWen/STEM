<?php
include "db_connect.php";
$title = "Funding Source";
$sql = "SELECT * FROM FundingSource";
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
					<th>FundingAgency ID</th>
                    <th>Funding Agency</th>
                    <th>Short Name</th>
                    <th>Action</th>
				</tr> 
			</thead> 
			<tbody>
HERE;
    while ($row = mysql_fetch_assoc($result))
    {
        $FundID = $row["FundID"];
        $FundingAgency = $row["FundingAgency"];
        $EntityShortName = $row["EntityShortName"];
        $content .= <<< HERE
        <tr>
            <td>$FundID</td>
            <td>$FundingAgency</td>
            <td>$EntityShortName</td>
			<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
        </tr>
HERE;
    }
    $content .= "</tbody>";
    $content .= "</table>";
    return $content;
}
?>