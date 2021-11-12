<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Pengecekan submit 
if (isset($_POST['tambah'])) {
    // var_dump($_POST);
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambah');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'index.php';
            </script>";
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
        <h4>FORM TAMBAH DATA MAHASISWA</h4>
        <hr>
        <a class="btn btn-primary" href="index.php">Kembali</a>
    </div>

    <div class=" container mt-2">
        <div class=" row">
            <div class="col-lg-6">
                <div class="card p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-1">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" name="nama" class="form-control" id="nama" autofocus required>
                        </div>
                        <div class="mb-1">
                            <label for="nrp" class="form-label">NRP :</label>
                            <input type="number" name="nrp" class="form-control" id="nrp" required>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-1">
                            <label for="jurusan" class="form-label">Jurusan :</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan" required>
                        </div>
                        <div class="mb-1 d-flex ">
                            <img class="col-sm-4 p-3 img-fluid img-preview" src=" img/default.jpg" width="100">
                            <input type="file" name="gambar" class="gambar p-5 m-4 form-control col text-wrap" id="gambar" onchange="previewImage()">

                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary mt-2">Tambah Mahasiswa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/img.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>