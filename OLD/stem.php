<?php
include "db_connect.php";
$title = "Audience";
$sql = "SELECT * FROM stem_view";
$page_content = bind($sql);
include "master.php";


function bind($sql)
{
    $conn = connect();
    $result = mysql_query($sql, $conn) or die(mysql_error());

    $content = <<< HERE
    <article class="module width_full">
        <header><h3 class="tabs_involved">Content Manager</h3></header>
        <div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
					<th>ProgramID</th>
                    <th>InitiativeName</th>
                    <th>Relationship</th>
                    <th>FundingAmount</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Evaluator</th>
                    <th>ProjecURL</th>
                    <th>FundingSource</th>
                    <th>GrantName</th>
                    <th>Keyword</th>
                    <th>Audienc</th>
                    <th>Action</th>    
				</tr> 
			</thead> 
			<tbody>
HERE;
    while ($row = mysql_fetch_assoc($result))
    {
        $ProgramID = $row["ProgramID"];
        $InitiativeName = $row["InitiativeName"];
        $Relationship = $row["Relationship"];
        $FundingAmount = $row["FundingAmount"];
        $StartDate = $row["StartDate"];
        $EndDate = $row["EndDate"];
        $Evaluator = $row["Evaluator"];
        $ProjecURL = $row["ProjectURL"];
        $GrantName = $row["GrantName"];
        $EntityShortName = $row["EntityShortName"];
        $Keyword = $row["Keyword"];
        $Audience = $row["Audience"];
        
        $content .= <<< HERE
        <tr>
            <td>$ProgramID</td>
            <td>$InitiativeName</td>
            <td>$Relationship</td>
            <td>$FundingAmount</td>
            <td>$StartDate</td>
            <td>$EndDate</td>
            <td>$Evaluator</td>
            <td>$ProjecURL</td>
            <td>$EntityShortName</td>
            <td>$GrantName</td>
            <td>$Keyword</td>
            <td>$Audience</td>
			<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
        </tr>
HERE;
    }
    $content .= "</tbody>";
    $content .= "</table>";
    return $content;
}
?>