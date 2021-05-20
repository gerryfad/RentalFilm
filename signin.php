<?php
	session_start();

	require 'function.php';
	
	if(isset($_POST["submit"])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$query = mysqli_query($db,$sql);

		//cek username
		if(mysqli_num_rows($query) === 1){
			//cek password
			$row = mysqli_fetch_assoc($query);
			if(password_verify($password,$row["password"])){
				$_SESSION["login"] = true;
				$_SESSION['user'] = $username;
				$_SESSION["role"] = $row["role"];
				$_SESSION["saldo"] = $row["saldo"];
				header("Location: index.php");
				exit;
			}
		}
		$error = true;
	}


	
?>
	
	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="" class="sign__form" method="post">
							<a href="index.php" class="sign__logo">
								<img src="img/logo.png" alt="">
							</a>
							<?php if(isset($error)) : ?>
								<p style="color : red;font-style :italic;">Username atau Password Salah</p>
							<?php endif; ?>
							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Username" name='username'>
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" name="password">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div>
							
							<button class="sign__btn" name="submit">Sign in</button>

							<span class="sign__text">Don't have an account? <a href="index.php?target=daftar">Sign up!</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>