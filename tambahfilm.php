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
			$judul = $_POST['judul'];
			$genre = $_POST['genre'];
			$rating = $_POST['rating'];
			$harga = $_POST['harga'];
			$sinopsis = $_POST['sinopsis'];
			
			
			// tentukan lokasi file akan dipindahkan
			$dirUpload = "data/";

			// ambil data file
			$namaFile = $_FILES['gambar']['name'];

			// pindahkan file
			$terupload = move_uploaded_file($_FILES['gambar']['tmp_name'], $dirUpload.$namaFile);

			//query db
			$sql = "INSERT INTO datafilm VALUES ('', '$judul', '$genre', '$rating', '$harga', '$sinopsis','$namaFile')";
			$query= mysqli_query($db, $sql);
			if($query){
				echo '<script>alert("Berhasil menambahkan data."); document.location="database.php?page=datafilm";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>'; }
			
		}
		?>

		<form enctype="multipart/form-data" action="" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="judul" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Genre :</label>
				<div class="col-md-6 col-sm-6">
					<select name="genre" class="form-control" required>
						<option value="">Pilih genre</option>
						<?php 
							$sql2 = "SELECT * FROM genreFilm";
							$query2 = mysqli_query($db,$sql2);
						?>
						<?php while($data = mysqli_fetch_assoc($query2)): ?>
							<option value="<?= $data['id_genre']?>"><?= $data['genre']?></option>
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Rating :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" min="1" max="10" name="rating" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis :</label>
				<div class="col-md-6 col-sm-6">
					<textarea id="text" name="sinopsis" style="width: 600px;height:100px;"  required></textarea>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Cover Film :</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" accept="image/*" name="gambar" style="width: 600px;height: 40px;">
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
			</div>
		</form>
	</div>