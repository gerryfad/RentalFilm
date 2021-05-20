<?php 
  session_start();
  require 'function.php';
  $usernames = $_SESSION['user'];
  if(isset($_POST['submit'])){
      $user = $_SESSION['user'];
      $judul = $_POST['judul'];
      $harga = $_POST['potong_saldo'];
      $saldo = $_POST['saldo'];
      $tanggal = date('Y-m-d');
      $status = "Dipinjam";
      $total = $saldo-$harga;
      //query db
      if($saldo>=$harga){
      $sql = "UPDATE users SET saldo ='$total' WHERE username = '$usernames' ";
      $query= mysqli_query($db, $sql);
      $riwayatpinjam = mysqli_query($db,"INSERT INTO riwayatPinjam VALUES ('', '$user', '$tanggal', '$judul', '$harga', '$status')");
      $_SESSION["saldo"] = $total;
      echo "
      <script>
        alert('Film Berhasil disewa!');
        document.location.href = 'index.php';
      </script>
      ";
      }else {
      echo "
      <script>
        alert('Maaf Saldo Anda Tidak Cukup!');
        history.go(-2);
      </script>
      ";
      }
  }
?>