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
namespace MFS;
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
class User
{
    protected static $tableName = "user";
    private $_sql = '';
    /**
    * Function to authenticate user's credientials
    *
    * @param string $user name
    * @param string $pass password
    *
    * @return resultset
    */
    public static function authenticate($user, $pass)
    {
        $user   = \MFS\database\MySql::MySqlPrep($user);
        $pass   = \MFS\database\MySql::MySqlPrep($pass);
        $_sql    = "select * from user where email = '{$user}' AND password  = '{$pass}' LIMIT 1";
        $result = \MFS\database\MySql::query($_sql);
        return $result;
    }
    /**
    * Function to authenticate admin's credientials
    *
    * @param string $user name
    * @param string $pass password
    *
    * @return resultset
    */
    public static function authenticateAdmin($user, $pass)
    {
        $user   = \MFS\database\MySql::MySqlPrep($user);
        $pass   = \MFS\database\MySql::MySqlPrep($pass);
        $_sql    = "select * from admin where email = '{$user}' AND password  = '{$pass}' LIMIT 1";
        $result = \MFS\database\MySql::query($_sql);
        return $result;
    }
    /**
    * Function to show all data from table
    *
    * @return resultset
    */
    public static function findAll()
    {
        $_sql    = "select fname from " . self::$tableName;
        $result = \MFS\database\MySql::query($_sql);
        return $result;
    }
    /**
    * Function to show all data for specific user
    *
    * @param int $id user's id
    *
    * @return resultset
    */
    public static function findById($id)
    {
        $_sql    = "select fname from " . self::$tableName . " where id = {$id}";
        $result = \MFS\database\MySql::query($_sql);
        return $result;
    }
}
?> 