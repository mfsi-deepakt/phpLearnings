<html>
<head>
  <title>
      My first php project
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
    require "vendor/autoload.php";
    require "include/database.php";
    require 'include/user.php';
    require 'include/functions.php';
    \MFS\database\MySql::createDb();
    $result = MFS\User::findAll();
    while ($row = $result->fetch_assoc()) {
        echo "<br><b>" . $row['fname'] . "</b>";
    }
    \MFS\database\MySql::closeConnection();
?>
  

<h1>My first PHP page</h1>
<a href="login.php"><b>Login to account<b></a>
<br><br>
<a href="register.php"><b>Register</b></a>
</body>
</html>