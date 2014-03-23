<?php

    include "layoutTemplate.php";
    include"db_connect.php";
    
    buildTop();
    buildBody();

    // define variables and set to empty values
    $username = $_SESSION['myusername'];
    $adminlevel = $_SESSION['myadminlevel'];
    $_SESSION['updateStatus']="false";

    $passcodeErr = $emailErr = "";
    $passcode = $firstname = $lastname = $phone = $email = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["passcode"]))
            {$passcodeErr = "passcode is required";}
           else
             {
             $t_passcode = test_input($_POST["passcode"]);
             // check if username only contains letters and whitespace
             if (!preg_match("/^[a-zA-Z]\w{4,17}$/",$t_passcode))
                $passcodeErr = "Only letters, numbers, and underline allowed in 5-17 charactors"; 
             else
                $passcode = $t_passcode;
             }

        if (empty($_POST["email"]))
             {$emailErr = "Email is required";}
           else
             {
             $t_email = test_input($_POST["email"]);
             // check if e-mail address syntax is valid
             if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$t_email))
               $emailErr = "Invalid email format"; 
             else
               $email = $t_email;
             }

       $firstname = test_input($_POST["firstname"]);
       $lastname = test_input($_POST["lastname"]);
       $phone = test_input($_POST["phone"]);

       if($username && $passcode && $email)
            updateUser($username,$passcode,$firstname,$lastname,$email,$phone);
    }

    function test_input($data)
    {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    function updateUser($username,$passcode,$firstname,$lastname,$email,$phone)
    {
        $conn = connect();
        //prevent sql injection
        $s_passcode = mysql_real_escape_string($passcode);
        $s_firstname = mysql_real_escape_string($firstname);
        $s_lastname = mysql_real_escape_string($lastname);
        $s_phone = mysql_real_escape_string($phone);
        $s_email = mysql_real_escape_string($email);

        $sql = "UPDATE Admin SET passcode = '" . $s_passcode . "',
                                 firstname = '" . $s_firstname . "', 
                                 lastname = '" . $s_lastname . "', 
                                 email = '" . $s_email . "', 
                                 phone = '" . $s_phone . "'
                             WHERE username ='" . $username . "'";

        if (mysql_query($sql, $conn)){
            echo "<h4 class = 'alert_success'> update successfully </h1>  <br /><br />";
            $_SESSION['updateStatus'] = "true";
            //echo "<script>window.location.href='viewself.php'</script>";
        }
        else
            echo "<h4 class = 'alert_error'> fail to update </h1> <br /> <br />";
        mysql_close($conn);
    }


?>

<form id="add_new_user" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table class="tablesorter" cellspacing="0">
        <tbody>
            <tr><th>Username</th><td> <? echo $username; ?>
            <tr><th>Passcode</th><td><input type="password" name="passcode" value="<?php echo $passcode;?>"><span class="error">* <?php echo $passcodeErr;?></span></td></tr>
            <tr><th>First Name</th><td><input type="text" name="firstname" value="<?php echo $firstname;?>"><span class="error"></span></td></tr>
            <tr><th>Last Name</th><td><input type="text" name="lastname" value="<?php echo $lastname;?>"><span class="error"></span></td></tr>
            <tr><th>Admin Level</th><td> <? echo $adminlevel; ?>
            <tr><th>Email</th><td><input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailErr;?></span></td></tr>
            <tr><th>Phone</th><td><input type="text" name="phone" value="<?php echo $phone;?>"><span class="error"></span></td></tr>
        </tbody>
    </table>
    <div align="center">
        <br />
        <input type="submit" name="submit" value="submit" class="alt_btn">
    <?php

        $viewselfVar = "'viewself.php'";
        if($_SESSION['updateStatus']=="true"){
            echo '<input type="button" onclick="window.location.href= ' . $viewselfVar . ';" value="View">';
        }
        else
            echo '<input type="reset" name="reset" value="reset">';
        
    ?>
        <input type="button" onclick="window.location.href='viewself.php';" value="cancel">
    </div>
</form>
<br />

<?
    buildBottom();
?>