<!DOCTYPE html>
<html lang="en">
<head>
	<title>ระบบบริหารจัดการห้องพยาบาล | Log in</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>
<body style="background-color: #666666; font-family: 'Kanit', sans-serif;">
<?
session_start();
?>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../check.php" method="post">
					<span class="login100-form-title p-b-40" style="font-family: 'Kanit', sans-serif;">
						ห้องพยาบาล วิทยาลัยเทคนิคเชียงใหม่
					</span>
					
					<?php 
        				if(isset($_GET['state'])){
          				echo "<p class='login-box-msg'>เซลชันของคุณหมดเวลาแล้ว กรุณาเข้าสู่ระบบใหม่อีกครั้ง</p>";
        				}
      				?>
					<div class="wrap-input100 validate-input" data-validate = "ชื่อผู้ใช้: xxxxxxxxxx">
						<input class="input100" type="text" name="username_log">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="ต้องการรหัสผ่าน">
						<input class="input100" type="password" name="password_log">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<!-- <input class="" id="ckb1" type="hidden" name="remember-me"> -->
							<!--<label class="label-checkbox100" for="ckb1">
								 Remember me 
							</label>-->
						</div>

						<div>
							<a href="#" class="txt1" style="font-family: 'Kanit', sans-serif;font-size:16px;">
								 วิธีการเข้าใช้งานระบบ ?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2" style="font-family: 'Kanit', sans-serif; font-size:16px;color:black;">
							หรือ สมัครสมาชิกใหม่
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="../frm_register/index.php" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						</a>

						
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../img/ห้องพยาบาล_๑๗๑๒๐๕_0008.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>