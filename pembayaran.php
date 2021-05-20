<?php 
  session_start();

	if(!isset($_SESSION["login"])){
		header("Location: index.php?target=login");
		exit;
	}

  require 'function.php';
  $usernames = $_SESSION['user'];
  $id = $_POST['id'];
  $sql = "SELECT * FROM dataFilm INNER JOIN genreFilm ON dataFilm.genre = genreFilm.id_genre WHERE id = $id";
  $query = mysqli_query($db, $sql);
  $data = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment checkout form UI</title>
  <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
<div class="wrapper">
  <div class="checkout_wrapper">
    <div class="product_info">
        <div class="content">
            <h3>Film</h3>
        </div>
      <img src="data/<?= $data['gambar']; ?>" alt="product">
      <div class="content">
        <h3><?= $data['judul']?></h3>
        <p>Harga : <?= rupiah($data['harga']); ?></p>
      </div>
    </div>
    <div class="checkout_form">
      <p>Metode Pembayaran</p>
      <div class="details">
        <div  style="color:white;margin-bottom:35px;"class="section">
        <form action="prosespembayaran.php" class="sign__form" method="post">
            <input type="radio" name="potong_saldo" value="<?= $data['harga']; ?>" checked>
            <label for="male">Potong Saldo</label><br>
          
        </div>
        <p>Saldo Anda</p>
        <div style="margin-bottom:50px;" class="section last_section">
          <?php 
            $sqlbayar = "SELECT * FROM users WHERE username = '$usernames'";
            $querybayar = mysqli_query($db, $sqlbayar);
            $bayar = mysqli_fetch_assoc($querybayar);
            $saldo = $bayar['saldo'];
          ?>
          <h3 style="color:white;font-family: Arial, Helvetica, sans-serif;"><?= rupiah($saldo); ?></h3>
          <input type="hidden" name="saldo" value="<?= $saldo; ?>">
          <input type="hidden" name="judul" value="<?= $data['judul']; ?>">
        </div>
        <button class="sign__btn" name="submit">SEWA</button>
      </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

