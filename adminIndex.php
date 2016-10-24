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
require "include/functions.php";
require "include/session.php";
require "include/database.php";
require "include/user.php";
global $session_admin;
\MFS\database\MySql::createDb();
if (!$sessionAdmin->isLoggedIn()) {
    redirectTo("admin.php");
}
if (isset($_POST['logout'])) {
    $sessionAdmin->logout();
    redirectTo("admin.php");
    \MFS\database\MySql::close_connection();
}   
?>
<html>
<head>
	<title>
		Admin Page
	</title><link rel="stylesheet" type="text/css" href="stylesheets/admin.css">
</head>
<body><h1>
	Hey this is a admin home page!
	</h1>
	
    <form  action="adminIndex.php" method="post">
    <input type="submit" name ="showAll" value="Show All data!" /><br><hr>
    <input type="text" name="id"/>
    <input type="submit" name="showById" value="Show by Id" />
    <div id ="output"><b><h1>Result<h1></b>
        <?php 
        if (isset($_POST['showAll'])) {
            $result = MFS\User::findAll();
            while ($row = $result->fetch_assoc()) {
                echo "<p id='name'>Name : <b>" . $row['fname'] .
                 "</b><button type='button'>Delete?</button></p>";
            }
        } 
    
        if (isset($_POST['showById'])) {
            $id = trim($_POST['id']);
            if (empty($id)) {
                echo "<p id='error'><b>please enter the id!</b></p>";
            } elseif (preg_match("/^[1-9][0-9]*$/", $id)) {
                $result = MFS\User::findById($id);
                if ($row = $result->fetch_assoc()) {
                    echo "<p id='name'>Name : <b>" . $row['fname'] .
                    "</b><button type='button'>Delete?</button></p>";
                } else {
                    echo "<p id='error'><b>NO Data Found!</b></p>";
                }
            } else {
                echo "<p id ='error'><b>Input must be a number!</b></p>";
            } // main else
        } 
    ?>
    </div>
    <hr><input type="submit" name="logout" value="Logout"><br>
  </form></body><br><hr>
  <a href="sendSms.php">Send A Sms </a>
</html>