 <?php
 /**
 * MyClass File Doc Comment
 *
 * PHP version 7
 *
 * @category MyClass
 * @package  MyPackage
 * @author   Deepak Tomar <sdeepak2610@gmail.com>
 * @license  General public license
 * @link     www.xyz.com
 */
 require "include/database.php";
 require "include/functions.php";
 require "include/session.php";
 require "include/user.php";
 if ($sessionUser->isLoggedIn() ) {
     redirectTo("menu.php");
    }
    $user = $pass ="";
    $userError = $passError ="";
    if (isset($_POST['submit'])) {
        $user = trim($_POST['email']);
        $pass = trim($_POST['password']);
        if (empty($user)) {
            $userError = "Please input the Email!";
        } elseif (empty($pass)) {
                  $passError ="Please input the password!";
        } else {
            \MFS\database\MySql::createDb();
            $result = MFS\User::authenticate($user, $pass);
            if ($row = $result->fetch_assoc()) {
                $sessionUser->login($row['id']);
                redirectTo("menu.php");
            } else {
                $message = "Invalid login details";
                \MFS\database\MySql::closeConnection();
            }
        }// main else
    }
?>
<html>
<head>
	<title>
		Login Page
	</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/design.css">
	</head>
	<script>
	function show(){
	var division=	document.getElementById("recover");
	if(division.style.display != "none") {
		division.style.display = "none";
	}
	else
	{
		division.style.display= "block";
	}
	}
	</script>
	<body><b>
		      <?php
            echo $message;
?></b>
		    <form name="login" action="<?php
            echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<br><br>
			Email :<input type="text" name="email" value="<?php
            echo htmlentities($user);?>" />
            <p id='error'><b><?php echo $userError; ?></b></p>
	        Password : <input type="password" name="password" value="<?php
            echo htmlentities($pass);?>" ><br>
            <p id='error'><b><?php echo $passError; ?><br>
			<input type="submit" name="submit" value="login" /><br>
		</form>
		<button onclick="show()">Forgot Password? </button><br>

	   <div id="recover" style="display:none">
	   	<br>
	   <form action="login.php" method ="post" >
	   <b>Enter your email <b><input type="text" name ="useEmail" /><br><br>
	   <input type="submit" value="submit" name = "forgot" />
	   </form>
	   </div>
	</body>
</html>
