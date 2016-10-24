<html>
<head>
     <title>
          Registration
     </title>
     <link rel="stylesheet" type="text/css" href="stylesheets/design.css">
     </head>
     <body>
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
    require 'vendor/autoload.php';
    require 'include/database.php';
    require 'include/functions.php';
    $fnameError = $lnameError = $emailError = $passError ="";
if (isset($_POST['submit'])) {
        $fname = trim($_POST['name']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $pass  = trim($_POST['password']);
    if (empty($fname)) {
        $fnameError ="Please input the first name !";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $fname) ) {
            $fnameError = "Only letters and white space allowed"; 
    } elseif (empty($lname)) {
        $lnameError ="Please input the last name!";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
              $lnameError = "Only letters and white space allowed"; 
    } elseif (empty($email)) {
        $emailError ="Please input the Email!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $emailError = "Invalid email format"; 
    } elseif (empty($pass)) {
        $passError ="Please input the Password!";
    } elseif (preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
                    $sql   = "insert into user(fname, lname, email, password) values(
            '{$fname}',
            '{$lname}',
            '{$email}',
            '{$pass}')";
        \MFS\database\MySql::createDb();
        $result = \MFS\database\MySql::query($sql);
        \MFS\database\MySql::closeConnection();

    } else {
         $passError ="Must have one capital letter/digit/small letter and length should be 8";
    }
}
?>
     <form name= "register" action="register.php" method="post"><br><br>
     First name : <input type="text" name="name" value=""/>
     <p id="error"><b><?php echo $fnameError;?></b></b></p>
     Last name : <input type ="text" name = "lname" value=""/>
     <p id="error"><b><?php echo $lnameError;?></b></b></p>
     Email : <input type="text" name="email" value=""/>
     <p id="error"><b><?php echo $emailError;?></b></b></p>
     password : <input type="password"  name="password" value=""/>
     <p id="error"><b><?php echo $passError;?></b></b></p>
     <input type="submit" name ="submit" value ="Register"/>

     </form>
     </body>
</html>