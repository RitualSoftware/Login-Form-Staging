<!DOCTYPE html>
<?php
session_start();
        
if(!empty($_POST)){
    $userUsername = $_POST["username"];
    $userPassword = $_POST["password"];
    
    $mysqli = new mysqli("NULLED_FOR_SECURITY", "NULLED_FOR_SECURITY", "NULLED_FOR_SECURITY", "NULLED_FOR_SECURITY");
    
    // Check connection
    if(mysqli_connect_errno()) {
        echo "Connection Failed: " . mysqli_connect_errno();
        exit();
    }
    
    /* create a prepared statement */
    if ($stmt = $mysqli->prepare("SELECT `NULLED_FOR_SECURITY` FROM `NULLED_FOR_SECURITY` WHERE NULLED_FOR_SECURITY = ?")) {
    
        /* Bind parameters: s - string, b - blob, i - int, etc */
        $stmt -> bind_param("s", $userUsername);
        /* Execute it */
        $stmt -> execute();
        /* Bind results */
        $stmt -> bind_result($result);
        /* Fetch the value */
        $stmt -> fetch();
        /* Close statement */
        $stmt -> close();
        echo $result;
    }
    
    if(password_verify($userPassword, $result)){
        $_SESSION['stagingLoggedIn'] = true;
        header("Location: index.php");
    }else{
       header("Location: staging.php"); 
    }
    $mysqli->close(); 
}
?>

<html lang="en">
<head>
	<title>Ritual Software Staging Server</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="staging/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="staging/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="staging/css/util.css">
	<link rel="stylesheet" type="text/css" href="staging/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('staging/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Ritual Software
				</span>
				<form action="staging.php" autocomplete="off" class="login100-form validate-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" id="username" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Authenticate
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="staging/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="staging/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="staging/vendor/bootstrap/js/popper.js"></script>
	<script src="staging/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="staging/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="staging/vendor/daterangepicker/moment.min.js"></script>
	<script src="staging/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="staging/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="staging/js/main.js"></script>

</body>
</html>
