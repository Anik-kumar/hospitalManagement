<?php
session_start();

if(isset($_POST["submit-login-from"])){
    require_once('DBconnection.php');
    $dbconnection = new DBconnection();

    $username = mysqli_real_escape_string($dbconnection->getconnection(), $_POST['user-email']);
    $password = md5(mysqli_real_escape_string($dbconnection->getconnection(),$_POST['user-password']));
    $query = "SELECT e.*, ec.catagory_name, d.name as department  FROM employee e ";
    $query .= " LEFT JOIN employee_catagory ec ON e.catagory_id=ec.catagory_id ";
    $query .= " LEFT JOIN department d ON e.dep_id=d.dep_id ";
    $query .= "WHERE email='".$username."' and uupass='".$password."'";

    $userData = $dbconnection->getResult($query);
    $dbconnection->addSystemLog(array("emp_id"=>$userData[0]["emp_id"], "action"=>"Login", "log_details"=>$userData[0]["firstname"]." ".$userData[0]["lastname"]." logged in."));
    $message = "";
    if(count($userData)>0){
        $_SESSION['login_employee'] = $username;
        $_SESSION['login_employee_id'] = $userData[0]["emp_id"];
        $_SESSION['login_employee_name'] = $userData[0]["firstname"] . " " . $userData[0]["lastname"];
        $_SESSION['logged_in'] = true;
        header( "Location: index.php");
        exit();
    }else{
        $_SESSION['logged_in'] = false;
        $message = "Could not find any user with the given access.";
    }
}else{
}
//echo md5("testpass")."<br />";
//echo md5("testp@ss");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap-3.3.7/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/style.css" />
   <script src="assets/jquery-2.2.4.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-3.3.7/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/login.js"></script>
</head>
<body background="details/dna_2.jpg">
	<div class="container">
        <div class="card card-container">
            <img id="profile-img-rounded" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="" method="post">
                <?php
                    if(isset($message)){
                        if(strlen($message)>0){?>
                        <p class="message error"><?=$message?></p>
                <?php     }
                    
                    }
                ?>

                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="user-email" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" name="user-password" class="form-control" placeholder="Password" required>
              
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit-login-from">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>