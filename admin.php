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
if ($sessionAdmin->isLoggedIn()) {
    redirectTo("adminIndex.php");
}
$userError = $passError ="";
if (isset($_POST['submit'])) {
    $user   = trim($_POST['email']);
    $pass   = trim($_POST['password']);
    if (empty($user)) {
        $userError = "Please enter the User Name!";
    } elseif (empty($pass)) {
        $passError = "Please enter the password!";
    } else {
         \MFS\database\MySql::createDb();
         $result = MFS\User::authenticateAdmin($user, $pass);
        if ($row = $result->fetch_assoc()) {
               $sessionAdmin->login($row['id']);
               redirectTo("adminIndex.php");
        } else {
            $message = "Invalid login details";
            \MFS\database\MySql::closeConnection();
        }
    }
}
?>
<html>
<head>
	<title>
		Login Page
	</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/design.css">
	</head>
	<body><b>
		      <?php
            echo $message;
?></b>
		<form name="login" action="admin.php" method="post"><br><br>
			Email :<input type="text" name="email" value="<?php
            echo htmlentities($user);
            ?>" /><br>
			<p id='error'><b><?php echo $userError; ?></p></b><br>
			Password : <input type="password" name="password" value="<?php
            echo htmlentities($pass);
            ?>" ><br>
			<p id='error'><b><?php echo $passError; ?></b></p><br>
			<input type="submit" name="submit" value="login" /><br>
			<a href="" > Forgot Password?</a><br>
		</form>
	</body>
</html>
