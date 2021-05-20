<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: index.php?target=login");
        exit;
    }else if(($_SESSION["role"])!='admin'){
        header("Location: index.php?target=home");
        exit;
    }
	
	
?>
<?php 

    require 'function.php';

    $id=$_GET['id'];
    
    if(isset($_GET['target'])){
        if($_GET['target']=='deletefilm'){
            $sql="DELETE FROM datafilm WHERE id=$id";
            $query=mysqli_query($db,$sql);
            if($query){
                echo "
                 <script>
                     alert('Data Berhasil Dihapus!');
                     document.location.href = 'database.php?page=datafilm';
                 </script>
                 ";
             }
        }
        if($_GET['target']=='deleteuser'){
            $sql="DELETE FROM users WHERE id=$id";
            $query=mysqli_query($db,$sql);
            if($query){
                echo "
                 <script>
                     alert('Data Berhasil Dihapus!');
                     document.location.href = 'database.php?page=datauser';
                 </script>
                 ";
             }
        }
        if($_GET['target']=='deleteriwayat'){
            $sql="DELETE FROM riwayatPinjam WHERE id=$id";
            $query=mysqli_query($db,$sql);
            if($query){
                echo "
                 <script>
                     alert('Data Berhasil Dihapus!');
                     document.location.href = 'database.php?page=riwayatpinjam';
                 </script>
                 ";
             }
        }
    }else {
        echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'database.php';
        </script>
        ";
    }

    
?>