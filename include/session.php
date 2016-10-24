<?php
/**
 * MyClass File Doc Comment
 *
 * PHP version 7
 *
 * @category Session_Class
 * @package  MyPackage
 * @author   Deepak Tomar <sdeepak2610@gmail.com>
 * @license  General public license
 * @link     www.xyz.com
 */
use mysqli;
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
class Session
{
    private $_loggedIn = false;
    private $_userId;
    /**
    * Constructor
    *
    *@return void
    */
    public function __construct()
    {
        session_start();
        $this->_checkLogin();
        if ($this->_loggedIn) {
            echo "Logged in!";
        } else {
            echo "Not logged in!";
        }
    }
    /**
    *Function to check the state of user (logged in or not)
    *
    * @return void
    */
    private function _checkLogin()
    {
        if (isset($_SESSION['_userId'])) {
            $this->_userId   = $_SESSION['_userId'];
            $this->_loggedIn = true;
        } else {
            unset($this->_userId);
            $this->_loggedIn = false;
        }
    }
    /**
    *Function to return tru of false on the basis of state of user
    *
    * @return true /false
    */
    public function isLoggedIn()
    {
        return $this->_loggedIn;
    }
    /**
    *Function to login the user
    *
    * @param int $useId perform login operation on user (useid)
    *
    * @return void
    */
    public function login($useId)
    {
        $this->_userId   = $_SESSION['_userId'] = $useId;
        $this->_loggedIn = true;
    }
    /**
    *Funtion to perform the logout task
     *
    *@return void
    */
    public function logout()
    {
        unset($this->_userId);
        unset($_SESSION['_userId']);
        $this->_loggedIn = false;
    }
}
$sessionUser  = new Session();
$sessionAdmin = new Session();
