<?php
session_start();
if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in']===true){
        require_once('DBconnection.php');
        $dbconnection = new DBconnection();
        $dbconnection->addSystemLog(array("emp_id"=>$_SESSION['login_employee_id'], "action"=>"Logout", "log_details"=>$_SESSION['login_employee_name']." logged out."));
        $_SESSION['login_employee'] = "";
        $_SESSION['login_employee_id'] = "";
        $_SESSION['login_employee_name'] = "";
        $_SESSION['logged_in'] = false;


    }
}
header( "Location: login.php");
exit();