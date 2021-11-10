<?php
require 'functions.php';

// Pengecekan submit 
if (isset($_POST['tambah'])) {
    // var_dump($_POST);
    if (tambah($_POST) > 0) {
        echo "Data berhasil ditambah";
    } else {
        echo "Data gagal ditambah!";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <div class="container mt-3">
        <h3>FORM TAMBAH DATA MAHASISWA</h3>
        <hr>
        <a class="btn btn-primary" href="latihan3.php">Kembali</a>
    </div>

    <div class="container mt-4">
        <form action="" method="POST">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" id="nama" autofocus required>
            </div>
            <div class="mb-2">
                <label for="nrp" class="form-label">NRP :</label>
                <input type="number" name="nrp" class="form-control" id="nrp" required>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-2">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan" required>
            </div>
            <div class="mb-2">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" name="gambar" class="form-control" id="gambar" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary mt-4">Tambah Mahasiswa</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>