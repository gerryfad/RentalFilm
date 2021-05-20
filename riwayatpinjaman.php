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
		<center><font size="6">Riwayat Pinjaman</font></center>
		<hr>
		
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Tanggal Pinjam</th>
					<th>Nama Peminjam</th>
					<th>Judul Film</th>
					<th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM riwayatPinjam";
					$query = mysqli_query($db, $sql);
					$no = 1;
				?>	
					<?php while($data = mysqli_fetch_assoc($query)): ?>
						<tr>
							<td style="width:25px;"><?= $no; ?></td>
							<td ><?= format_hari_tanggal($data['tanggal'], true); ?></td>
							<td ><?= $data['username']; ?></td>
							<td ><?= $data['judul']; ?></td>
							<td ><?= rupiah($data['harga']); ?></td>
							<td ><?= $data['status']; ?></td>
							<td>
								<a href="database.php?page=editriwayat&id=<?= $data['id']; ?>" class="btn btn-secondary btn-sm">Edit</a>
								<a href="hapus.php?id=<?= $data['id']; ?>&target=deleteriwayat" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
					<?php $no++;endwhile;?>
			<tbody>
		</table>
	</div>
	</div>
