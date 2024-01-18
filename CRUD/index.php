<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Desa Mudung</title>
<body>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Pendataan Penduduk Desa</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR PENDUDUK</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_penduduk'])) {
        $id_penduduk=htmlspecialchars($_GET["id_penduduk"]);

        $sql="delete from penduduk where id_penduduk='$id_penduduk' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis_kelamin</th>
            <th>Alamat</th>
            <th>Status</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from penduduk order by id_penduduk desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["NIK"]; ?></td>
                <td><?php echo $data["Nama"];   ?></td>
                <td><?php echo $data["Alamat"];   ?></td>
                <td><?php echo $data["Jenis_kelamin"];   ?></td>
                <td><?php echo $data["Pekerjaan"];   ?></td>
                <td><?php echo $data["Status"];   ?></td>
                <td>
                    <a href="update.php?id_penduduk=<?php echo htmlspecialchars($data['id_penduduk']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_penduduk=<?php echo $data['id_penduduk']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>

<?php
session_start();
include_once "koneksi.php";
if($_SESSION['log'] != "login"){
  header('location:login.php');
} 
?>

<body>
  <br>
  <br>
  <p class="text-center">
    <span><b>Selamat datang</b>, Anda berhasil Login sebagai <b><?= $_SESSION['username'] ?></b></span>
    <br>
    <a href="../logout.php" class="btn btn-sm btn-primary">
      <span>logout</span>
    </a>
  </p>
</body>

</html>
