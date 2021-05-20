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
			$sql = "UPDATE datafilm SET 
                        judul ='$judul',
                        genre = '$genre',
                        rating = '$rating',
                        harga = '$harga',
                        sinopsis = '$sinopsis'
                        WHERE id = $id ";
			$query= mysqli_query($db, $sql);
			if($query){
				echo '<script>alert("Berhasil Edit data."); document.location="database.php?page=datafilm";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses Edit data.</div>'; }
			
		}
		?>
        <?php 
            $sql = "SELECT * FROM dataFilm INNER JOIN genreFilm ON dataFilm.genre = genreFilm.id_genre WHERE id = $id";
            $query = mysqli_query($db, $sql);
            $data = mysqli_fetch_assoc($query);
        ?>
		<form enctype="multipart/form-data" action="" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul :</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="judul" class="form-control" size="4" value="<?= $data['judul']?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Genre :</label>
				<div class="col-md-6 col-sm-6">
					<select name="genre" class="form-control" required>
                        <option value="<?= $data['id_genre']?>"><?= $data['genre']?></option>
						<?php 
							$sql2 = "SELECT * FROM genreFilm";
							$query2 = mysqli_query($db,$sql2);
						?>
                        <?php while($data2 = mysqli_fetch_assoc($query2)): ?>
                        <option value="<?= $data2['id_genre']?>"><?= $data2['genre']?></option>
                        <?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Rating :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" min="1" max="10" name="rating" class="form-control" value="<?= $data['rating']?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga :</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="harga" class="form-control" value="<?= $data['harga']?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis :</label>
				<div class="col-md-6 col-sm-6">
					<textarea id="text" name="sinopsis" style="width: 600px;height:100px;"  required><?= $data['sinopsis']?></textarea>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Cover Film :</label>
				<div class="col-md-6 col-sm-6">
                    <img src="data/<?= $data['gambar']; ?>" width="70">
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"></label>
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