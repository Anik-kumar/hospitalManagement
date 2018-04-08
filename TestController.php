<?php


namespace controller;
require_once('User.php');
use model\User as User;

echo "<br /><h1>Test Controller</h1><br />";

class TestController
{

    function __construct(){
        echo "<br />>> TestController : Construct";
    }

    function __destruct() {
        echo "<br /><br />>> TestController : Disstructor";
    }
    function getUserList(){
        echo "<br />>> TestController : getFirstUser";
        $userModel = new User;
        return $userModel->getUserList();

    }
}

$controller = new TestController;
$data = $controller->getUserList();
echo "<br /><br />";


print_r($data);

?>