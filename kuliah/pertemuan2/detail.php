<?php

// Menghungkan ke file functions.php
require 'functions.php';

$mhs = fo();

?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>Daftar Mahasiswa</title>
</head>

<body>

    <div class="container mt-4">
        <h3>DATA MAHASISWA </h3>
        <hr>

        <div class="row mt-5">
            <div class="col">

                <div class="card">
                    <div class="card card-header" mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/<?= $mhs['gambar']; ?>" class="img-fluid rounded-start" alt="<?= $mhs['nama']; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title text-center"><?= $mhs['nama']; ?></h2>
                                    <hr>

                                    <table class="table table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">NRP :</th>
                                                <td>
                                                    <h5><?= $mhs['nrp']; ?></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email :</th>
                                                <td>
                                                    <h5><?= $mhs['email']; ?></h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jurusan :</th>
                                                <td>
                                                    <h5><?= $mhs['jurusan']; ?></h5>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <p class="card-text"><small class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore qui doloribus facere, illum repudiandae voluptatum, dolor rerum labore mollitia dolorem velit nostrum laborum eaque libero est nihil recusandae omnis nulla.</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <a class="btn btn-dark" href="latihan3.php">Kembali</a>
                        <div class="s">
                            <a class="btn btn-danger me-3" href="#">Hapus</a>
                            <a class="btn btn-primary " href="#">Edit</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>