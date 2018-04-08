<?php

namespace model;

require_once('DBconnection.php'); 


class User
{
    private $dbConnection;
    private $responseData;
    function __construct(){
        echo "<br />>>>>>>> User : Constructor";
        $this->dbConnection = new DBconnection;
        
    }
    function __destruct() {
        echo "<br />>>>>>>> User : Disstructor";
    }

    function getUserList(){
        echo "<br />>>>>>>> User : getUserList()";
        $this->responseData = $this->dbConnection->getOne('SELECT * FROM users');


        return $this->responseData;

    }

    function getUserById($userId){
        echo "<br />>>>>>>> User : getUserList()";
        if($userId !=null){
            $this->responseData = $this->dbConnection->getOne('SELECT * FROM users WHERE id='.$userId);
        }
        return $this->responseData;
    }
}

?>

