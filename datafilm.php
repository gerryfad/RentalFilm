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


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Film</font></center>
		<hr>
		<a href="database.php?page=tambahfilm"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Gambar</th>
					<th>Judul</th>
					<th>Genre</th>
					<th>Rating</th>
					<th>Harga</th>
					<th>Sinopsis</th>
					<th >Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel  
				$sql = "SELECT * FROM dataFilm INNER JOIN genreFilm ON dataFilm.genre = genreFilm.id_genre";
				$query = mysqli_query($db, $sql);
				$no = 1;
				?>	
					<?php while($data = mysqli_fetch_assoc($query)): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><img src="data/<?= $data['gambar']; ?>" width="70"></td>
							<td><?= $data['judul']; ?></td>
							<td><?= $data['genre']; ?></td>
							<td><?= $data['rating']; ?></td>
							<td><?= rupiah($data['harga']); ?></td>
							<td style="text-align:left;width:480px;"><?= $data['sinopsis']; ?></td>
							<td style="width:137px;">
								<a href="database.php?page=editfilm&id=<?= $data['id']; ?>" class="btn btn-secondary btn-sm">Edit</a>
								<a href="hapus.php?id=<?= $data['id']; ?>&target=deletefilm" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
					<?php $no++;endwhile;?>
			<tbody>
		</table>
	</div>
	</div>
