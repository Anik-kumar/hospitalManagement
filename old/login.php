<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap-3.3.7/css/bootstrap.css" />
	<link rel="stylesheet" href="login_style.css" />
   <script src="assets/jquery-2.2.4.js"></script> 
  <script type="text/javascript" src="assets/bootstrap-3.3.7/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/login.js"></script>
</head>
<body>
	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-rounded" src="details/Hospital_Logo_02.png"  width="250px" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
    </div>
</body>
</html>