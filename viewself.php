<?php

    include "layoutTemplate.php";
    include"db_connect.php";
    
    buildTop();
    buildBody();

    // define variables and set to empty values
    $username = $_SESSION['myusername'];
    $adminlevel = $_SESSION['myadminlevel'];

    $conn = connect();
    $sql="SELECT * FROM Admin WHERE username = '" . $username . "'";
    $result = mysql_query($sql, $conn) or die(mysql_error());

    while ($row = mysql_fetch_assoc($result))
    {
        $g_firstname = $row["FirstName"];
        $g_lastname = $row["LastName"];    
        $g_email = $row["Email"];
        $g_phone = $row["Phone"]; 
    }

    mysql_close();
?>

    <table class="tablesorter" cellspacing="0">
        <tbody>
            <tr><th>Username</th><td><? echo $username; ?></td></tr>
            <tr><th>Passcode</th><td>*****</td></tr>
            <tr><th>First Name</th><td><? echo $g_firstname; ?></td></tr>
            <tr><th>Last Name</th><td><? echo $g_lastname; ?></td></tr>
            <tr><th>Admin Level</th><td><? echo $adminlevel;?></td></tr>
            <tr><th>Email</th><td><? echo $g_email; ?></td></tr>
            <tr><th>Phone</th><td><? echo $g_phone; ?></td></tr>
        </tbody>
    </table>
    <div align="center">
        <br />
        <input type="button" onclick="window.location.href='editProfile.php';" value="Edit"> 
    </div>

<?
    buildBottom();
?>