<?php
    include('./login_script.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>JRPOSMS Login</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
    * {
		box-sizing: border-box;
		font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
		font-size: 16px;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
	body {
		background-image: url("../image/restuarant3.jpg");
		background-color: #cccccc;
		height: 100%;
		width: 100%;	
		margin: 0;
		
	}
	.login-back {	
		background-color: rgba(255, 255, 255, 0.9);
		width: 50%;
		height: 1080px;
		position: absolute;
  		top: 0;
	}
	.login-back  h1 {
		text-align: center;
		font-size: 24px;
		padding: 20px 0 20px 0;
		border-bottom: 1px solid #dee0e4;
	}
	.login-back  form {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		padding-top: 20px;
	}
	.login-back  form label {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: #4F80C0;
		color: #ffffff;
	}
	.login {
		width: 400px;
		background:transparent;
		margin: 100px auto;
	}
	.login h1 {
		text-align: center;
		color: #354446;
		font-size: 24px;
		padding: 20px 0 20px 0;
		border-bottom: 1px solid #dee0e4;
	}
	.login form {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		padding-top: 20px;
	}
	.login form label {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: #4F80C0;
		color: #ffffff;
	}
	.login form input[type="password"], .login form input[type="text"] {
		width: 310px;
		height: 50px;
		border: 1px solid #dee0e4;
		margin-bottom: 20px;
		padding: 0 15px;
	}
	.login form input[type="submit"] {
		width: 100%;
		padding: 15px;
		margin-top: 20px;
		background-color: #4F80C0;
		border: 0;
		cursor: pointer;
		font-weight: bold;
		color: #ffffff;
		transition: background-color 0.2s;
	}
	.login form input[type="submit"]:hover {
		background-color: #4F80C0;
		transition: background-color 0.2s;
	}
	
</style>
</head>
	<body>	
			<div class="login-back">
				<div class="login">
					<h1>Jupiter Restaurant</h1>
					<form action="" method="post" autocomplete="off">
						<label for="username">
							<i class="fas fa-user"></i>
						</label>
						<input type="text" name="username" placeholder="Email" required>
						<label for="password">
							<i class="fas fa-lock"></i>
						</label>
						<input type="password" name="password" placeholder="Password" required>
						<input type="submit" name="login" value="Login">
					</form>
				</div>		
			</div>			
	</body>
</html>