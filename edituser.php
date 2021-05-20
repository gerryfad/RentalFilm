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

		<center><font size="6">Edit Data</font></center>
		<hr>
		<?php
		$id=$_GET['id'];
		if(isset($_POST['submit'])){
			// Menangkap isi variabel dari file yang telah kita isi 
			$username = strtolower(stripslashes($_POST['username']));
			$email = $_POST['email'];
			$saldo = $_POST['saldo'];
			$role = $_POST['role'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            
			//Update user
			$sql = "UPDATE users SET 
						username ='$username',
						email = '$email',
						password = '$password',
						role = '$role',
						saldo = '$saldo'
						WHERE id = $id "; 
			$query = mysqli_query($db,$sql); 
			if($query){
				echo '<script>alert("Berhasil edit data."); document.location="database.php?page=datauser";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>'; }
            
			
		}
		?>
		<?php	
			$sql = "SELECT * FROM users WHERE id = $id";
			$query = mysqli_query($db, $sql);
			$data = mysqli_fetch_assoc($query);
		?>
		<form action="" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Username :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="username" class="form-control" value="<?= $data['username']?>" size="4" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Password :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="password" name="password" class="form-control" value="<?= $data['password']?>" size="4" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Email :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="email" class="form-control" value="<?= $data['email']?>" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Role :</label>
				<div class="col-md-6 col-sm-6">
					<select name="role" class="form-control" required>
						<option value="<?= $data['role']?>"><?= $data['role']?></option>
						<option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Saldo :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="saldo" value="<?= $data['saldo']?>" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
			</div>
		</form>
	</div>