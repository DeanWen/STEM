<?php
  include("db_connect.php");
  session_start();
  $error = "";

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
  // username and password sent from Form 
    $t_myusername=addslashes($_POST['username']); 
    $t_mypassword=addslashes($_POST['password']); 

    $myusername= mysql_real_escape_string($t_myusername);
    $mypassword= mysql_real_escape_string($t_mypassword);

    $conn = connect();
    $sql="SELECT username, adminlevel FROM Admin WHERE username='$myusername' and passcode='$mypassword'";

    $result=mysql_query($sql,$conn);
    $row=mysql_fetch_array($result);
    $count=mysql_num_rows($result);
    $myadminlevel = $row["adminlevel"];

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1)
      {
        $_SESSION['myusername']=$myusername;
        $_SESSION['myadminlevel']=$myadminlevel;

        header("location: people.php");
      }
    else 
      {
        $error="Your Login Name or Password is invalid";
      }
  }
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/loginstyle.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to STEM Funding Management</h1>
      <form name="login" method="post">
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
        
      </form>
    </div>

    <div class="login-help">
      <p>
        <? echo $error; ?>
        <!-- Forgot your password? <a href="index.html">Click here to reset it</a>. -->
      </p>
    </div>
  </section>
  </body>
</html>

