<?php
	include("mysqldb.php");
	function myform($error_msg){
		return '<form action="./login.php" method="POST">
				<div class="container">
						<i class="fa fa-key lg-key" aria-hidden="true"></i>
						<div class="company-name">
							Alumini
						</div>
						<div class="login-field" style="color: red;">
							'.$error_msg.'
						</div>
						<div class="login-field">
							<label for="username" style="color: #5C5F61;">username</label><br>
							<input name="username" class="username" id="username">
						</div>
						<div class="login-field">
							<label for="password" style="color: #5C5F61;">password</label><br>
							<input name="password" class="password" type="password" id="password">
						</div>
						<div class="login-field">
							<input type="submit" value="login" class="login-btn">
						</div>
				</div>
			</form>';
	}
?>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<style>
	.container{
		width: 50vw;
		height: 80vh;
		padding: 2rem;
		background-color: #1B2028;
		border-radius: 3%;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-evenly;
	}
	.company-name{
		margin-bottom: 1em;
	}
	.wrapper{
		display: flex;
		height: 100vh;
		align-items: center;
		justify-content: center;
		widht: 100vw;
	}
	body{
		height: 100vh;
		color: white;
		background-color: #232E33;
		widht: 100vw;
		font-family: 'Roboto', sans-serif;
	}
	.lg-key{
		margin: 1rem 0;
		height: 70px;
		font-size: 70px;
		line-height: 70px;
		background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}
	.username,.password{
		background-color: transparent;
		border: none;
		font-size: 1.3rem;
		border-bottom: 2px solid #0DB8DE;
		border-radius: 1%;
		color: #0DB8DE;
		min-width: 80%;
		transition: 0.3s linear;
	}
	.login-field{
		width: 80%;
		display: flex;
		margin: 1rem 0;
		flex-direction: column;
	}
	.username:focus,.password:focus{
		outline: none;
	}
	
	.login-btn{
		font-size: 1.5rem;
		background-color: #1B2028;
		color: #0DB8DE;
		align-self: center;
		padding: 0.6rem;
		border: 2px solid #0DB8DE;
		border-radius: 10%;
		letter-spacing: 0.1rem;
		transition: 0.3s linear;
	}
	.login-btn:hover{
		background-color: #0DB8DE;
		color: #1B2028;
	}

	@media screen and (min-width: 300px) {
 	 	.container{
			width: 40vh;
			height: 60vh;
		}
		.company-name{
			font-size: 6.6rem;
		}
		.lg-key{
			margin: 1rem 0;
			height: 130px;
			font-size: 130px;
			line-height: 130px;
		}
		label{
			font-size: 3.6rem;
			margin-bottom: 1.4rem;
		}
		.username,.password{
			font-size: 4rem;
		}
		.login-btn{
			font-size: 3.5rem;
		}
	}

	@media screen and (min-width: 1100px) {
 	 	.container{
			width: 50vw;
			height: 80vh;
		}
		.company-name{
			font-size: 3.6rem;
		}
		.lg-key{
			margin: 1rem 0;
			height: 80px;
			font-size: 80px;
			line-height: 80px;
		}
		label{
			font-size: 1.6rem;
			margin-bottom: 0rem;
		}
		.username,.password{
			font-size: 1.3rem;
		}
		.login-btn{
			font-size: 1.5rem;
		}
	}
</style>

<div class="wrapper">
	<?php
		if(isset($_SERVER) && $_SERVER["REQUEST_METHOD"] == "POST"){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$query = "select s from data where username='".$username."' and password='".$password."'";
			$res = mysqli_query($db,$query);
			$mybool = false;
			while($row = mysqli_fetch_array($res)){
				$mybool = true;
			}
			if($mybool){
				include("myhome.php");
			}else{
				echo myform("username and password not matched...");
			}
		}else{
			echo myform("");
		}
	?>
</div>