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
global $sessionUser;
if (!$sessionUser->isLoggedIn()) {
    redirectTo("login.php");
}
if (isset($_POST['submit'])) {
    $sessionUser->logout();
    redirectTo("login.php");
    \MFS\database\MySql::closeConnection();
}
?>
<html>
<head>
	<title>
		Menu Page
	</title>
</head>
<body><h1>
	Hey this is menu page!
	</h1>

  <form  action="menu.php" method="post">
  	<input type="submit" name="submit" value="Logout">
  </form></body>
</html>