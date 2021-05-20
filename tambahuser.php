<?php 
	
    if(!isset($_SESSION["login"])){
        header("Location: index.php?target=login");
        exit;
    }else if(($_SESSION["role"])!='admin'){
        header("Location: index.php?target=home");
        exit;
    }
	require 'function.php'; 
	
?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			// Menangkap isi variabel dari file yang telah kita isi 
			$username = strtolower(stripslashes($_POST['username']));
			$email = $_POST['email'];
			$saldo = $_POST['saldo'];
			$role = $_POST['role'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            //cek username yang double
            $cek = mysqli_fetch_assoc(mysqli_query($db,"SELECT username FROM users WHERE username = '$username'"));
			//query db
			if($cek){
                echo '<div class="alert alert-warning">Username telah terdaftar.</div>';
            }else {
                //Insert user
                $sql = "INSERT INTO users VALUES ('', '$username', '$email', '$password','$role','$saldo')";
                $query = mysqli_query($db,$sql); 
			    if($query){
				    echo '<script>alert("Berhasil menambahkan data."); document.location="database.php?page=datauser";</script>';
			    }else{
                    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>'; }
            }
			
		}
		?>

		<form action="" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Username :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="username" class="form-control" size="4" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Password :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="password" name="password" class="form-control" size="4" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Email :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="email" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Role :</label>
				<div class="col-md-6 col-sm-6">
					<select name="role" class="form-control" required>
						<option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Saldo :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="saldo" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
			</div>
		</form>
	</div>