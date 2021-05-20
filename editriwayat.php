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
			$status = $_POST['status'];
            
            
			//Insert user
			$sql = "UPDATE riwayatPinjam SET status = '$status' WHERE id = $id ";
			$query = mysqli_query($db,$sql); 
			if($query){
				echo '<script>alert("Berhasil edit data."); document.location="database.php?page=riwayatpinjam";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>'; }
            
			
		}
		?>
		<?php	
			$sql = "SELECT * FROM riwayatPinjam WHERE id = $id ";
            $query = mysqli_query($db, $sql);
			$data = mysqli_fetch_assoc($query);
		?>
		<form action="" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pinjam :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="username" class="form-control" value="<?= format_hari_tanggal($data['tanggal'], true); ?>" size="4" readonly required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Peminjam :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="password" class="form-control" value="<?= $data['username']; ?>" size="4" readonly required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="email" class="form-control" value="<?= $data['judul']; ?>" size="4" required readonly>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status :</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="<?= $data['status']; ?>"><?= $data['status']; ?></option>
						<option value="">Pilih Status</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Dipinjam">Dipinjam</option>
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga :</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="saldo" value="<?= rupiah($data['harga']); ?>" class="form-control" required readonly>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
			</div>
		</form>
	</div>