<?php

	include "layoutTemplate.php";
	include"db_connect.php";
	
	buildTop();
	buildBody();

	// define variables and set to empty values
	$nameErr = $passcodeErr = $emailErr = "";
	$username = $passcode = $firstname = $lastname = $adminlevel = $phone = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["username"]))
		    {$nameErr = "Name is required";}
		   else
		     {
		     $t_username = test_input($_POST["username"]);
		     // check if username only contains letters and whitespace
		     if (!preg_match("/^[a-zA-Z]\w{4,17}$/",$t_username))
		       		$nameErr = "Only letters, numbers, and underline allowed in 5-17 charactors"; 
		       else
		       		$username = $t_username;
		     }
		if (empty($_POST["passcode"]))
	     	{$nameErr = "passcode is required";}
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
	   //$username = test_input($_POST["username"]);
	   //$passcode = test_input($_POST["passcode"]);
	   $firstname = test_input($_POST["firstname"]);
	   $lastname = test_input($_POST["lastname"]);
	   $adminlevel = test_input($_POST["adminlevel"]);
	   $phone = test_input($_POST["phone"]);
	   //$email = test_input($_POST["email"]);

	   if($username && $passcode && $email)
	   		insertNewUser($username,$passcode,$firstname,$lastname,$adminlevel,$email,$phone);
	}

	function test_input($data)
	{
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	function insertNewUser($username,$passcode,$firstname,$lastname,$adminlevel,$email,$phone)
	{
		$conn = connect();
		//prevent sql injection
		$s_username = mysql_real_escape_string($username);
		$s_passcode = mysql_real_escape_string($passcode);
		$s_firstname = mysql_real_escape_string($firstname);
		$s_lastname = mysql_real_escape_string($lastname);
		$s_adminlevel = mysql_real_escape_string($adminlevel);
		$s_phone = mysql_real_escape_string($phone);
		$s_email = mysql_real_escape_string($email);

		$sql = "INSERT INTO Admin VALUES ('" . $s_username . "','" . $s_passcode . "','" . $s_firstname . "','" . $s_lastname . "','" . $s_adminlevel . "','" . $s_email . "','" . $s_phone . "')";
		if (mysql_query($sql, $conn))
			echo "<h4 class = 'alert_success'> add successfully </h1>  <br /><br />";
		else
			echo "<h4 class = 'alert_error'> fail to upload </h1> <br /> <br />";
		mysql_close($conn);
		
	}
?>

<form id="add_new_user" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table class="tablesorter" cellspacing="0">
		<tbody>
			<tr><th>Username</th><td><input type="text" name="username" value="<?php echo $username;?>"><span class="error">* <?php echo $nameErr;?></span></td></tr>
			<tr><th>Passcode</th><td><input type="password" name="passcode" value="<?php echo $passcode;?>"><span class="error">* <?php echo $passcodeErr;?></span></td></tr>
			<tr><th>First Name</th><td><input type="text" name="firstname" value="<?php echo $firstname;?>"><span class="error"></span></td></tr>
			<tr><th>Last Name</th><td><input type="text" name="lastname" value="<?php echo $lastname;?>"><span class="error"></span></td></tr>
			<tr><th>Admin Level</th><td><select name="adminlevel">
										<option value="root">Root</option>
        								<option value="general" selected="selected">General</option>
			<tr><th>Email</th><td><input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailErr;?></span></td></tr>
			<tr><th>Phone</th><td><input type="text" name="phone" value="<?php echo $phone;?>"><span class="error"></span></td></tr>
		</tbody>
	</table>
	<div align="center">
		<br />
		<input type="submit" name="submit" value="submit" class="alt_btn">
		<input type="reset" name="reset" value="reset">
	</div>
</form>
<br />

<?
	buildBottom();
?>