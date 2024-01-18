<!DOCTYPE html>
<html>
<head>
    <title>Form Pendataan Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $NIK=input($_POST["NIK"]);
        $Nama=input($_POST["Nama"]);
        $Alamat=input($_POST["Alamat"]);
        $Jenis_kelamin=input($_POST["Jenis_kelamin"]);
        $Pekerjaan=input($_POST["Pekerjaan"]);
        $Status=input($_POST["Status"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into penduduk (NIK,Nama,Alamat,Jenis_kelamin,Pekerjaan,Status) values
		('$NIK','$Nama','$Alamat','$Jenis_kelamin','$Pekerjaan','$Status')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NIK:</label>
            <input type="text" name="NIK" class="form-control" placeholder="Masukan NIK" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
       <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jenis_kelamin:</label>
            <input type="text" name="Jenis_kelamin" class="form-control" placeholder="Masukan Jenis_kelamin" required/>
        </div>
        <div class="form-group">
            <label>Pekerjaan:</label>
            <textarea name="Pekerjaan" class="form-control" rows="5"placeholder="Masukan Pekerjaan" required></textarea>
        </div>      
         <div class="form-group">
            <label>Status:</label>
            <textarea name="Status" class="form-control" rows="5"placeholder="Masukan Status" required></textarea>
        </div>      

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>