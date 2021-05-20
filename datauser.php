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
		<center><font size="6">Data Users</font></center>
		<hr>
		<a href="database.php?page=tambahuser"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Username</th>
					<th>Email</th>
					<th>Saldo</th>
					<th>Role</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM users";
					$query = mysqli_query($db, $sql);
					$no = 1;
				?>	
					<?php while($data = mysqli_fetch_assoc($query)): ?>
						<tr>
							<td style="width:25px;"><?= $no; ?></td>
							<td style="width:110px;"><?= $data['username']; ?></td>
							<td style="width:110px;"><?= $data['email']; ?></td>
							<td style="width:110px;"><?= rupiah($data['saldo']); ?></td>
							<td style="width:110px;"><?= $data['role']; ?></td>
                            <td style="width:110px;">
								<a href="database.php?page=edituser&id=<?= $data['id']; ?>" class="btn btn-secondary btn-sm">Edit</a>
								<a href="hapus.php?id=<?= $data['id']; ?>&target=deleteuser" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
					<?php $no++;endwhile;?>
			<tbody>
		</table>
	</div>
	</div>
