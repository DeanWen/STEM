<?php
include "db_connect.php";
$title = "People";
$sql = "SELECT * FROM people_info";
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
					<th>UID</th>
			        <th>Last Name</th>
			        <th>First Name</th>
			        <th>Full Name</th>       
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Title</th>
			        <th>Department/Center</th>
			        <th>School/Division</th>
			        <th>Organization</th>
			        <th>Action</th>
				</tr> 
			</thead> 
			<tbody>
HERE;
    while ($row = mysql_fetch_assoc($result))
    {
        $uid = $row["UID"];
        $lname = $row["Lastname"];
        $fname = $row["Firstname"];
        $fullname = $row["Fullname"];
        $email = $row["Email"];
        $phone = $row["Phone"];
        $title = $row["Title"];
        $dept_name = $row["DepartmentName"];
        $school_name = $row["SchoolDivisionName"];
        $org_name = $row["Orgname"];


        $content .= <<< HERE
        <tr>
            <td>$uid</td>
            <td>$lname</td>
            <td>$fname</td>            
            <td>$fullname</td>
            <td>$email</td>
            <td>$phone</td>
            <td>$title</td>
            <td>$dept_name</td>
            <td>$school_name</td>
			<td>$org_name</td>
			<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>

        </tr>
HERE;
    }
    $content .= "</tbody>";
    $content .= "</table>";
    return $content;
}
?>