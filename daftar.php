<?php 
    require 'function.php';

    if(isset($_POST["submit"])) {
        $username = strtolower(stripslashes($_POST['username']));
        $email = $_POST['email'];
        $password = $_POST['password'];
        $saldo= 0;
        $role = "user";
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //cek username yang double
        $cek = mysqli_fetch_assoc(mysqli_query($db,"SELECT username FROM users WHERE username = '$username'"));

        if($cek){
            echo"
            <script>
                alert('error : username telah terdaftar!');
                document.location.href = 'index.php?target=daftar';
            </script>
            ";
        }else {
            //Insert user
            $sql = "INSERT INTO users VALUES ('', '$username', '$email', '$password','$role','$saldo')";
            $query = mysqli_query($db,$sql);

            if($query){
                echo"
                <script>
                    alert('Berhasil Daftar!');
                    document.location.href = 'index.php?target=login';
                </script>
                ";
            }else {
                echo"
                <script>
                    alert('gagal Daftar!');
                    document.location.href = 'index.php?target=daftar';
                </script>
                ";
            }
        }
    }
?>
	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="#" class="sign__form" method="post">
							<a href="index.php" class="sign__logo">
								<img src="img/logo.png" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Username" name="username" required>
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email" name="email" required>
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" name="password" required>
							</div>
							
							<button class="sign__btn" name="submit">Sign up</button>

							<span class="sign__text">Already have an account? <a href="index.php?target=login">Sign in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>