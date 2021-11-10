<?php

// Menghungkan ke file functions.php
require 'functions.php';

// Tampung ke variable
$mahasiswa = query("SELECT * FROM mahasiswa");

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
        <h3 class="text-center">Daftar Mahasiswa</h3>
        <hr>
        <a class="btn btn-primary" href="tambah.php">Tambah Mahasiswa</a>
        <div class="row mt-5">
            <div class="col-lg-2"></div>

            <div class="col-lg-6">
                <table class="table table-xl table-dark table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th class="text-start" scope="col">Nama</th>
                            <th class="text-start" scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr class="text-center">
                                <th scope="row"><?= $i++; ?></th>
                                <td class="text-start"><?= $mhs['nama']; ?></td>
                                <td class="text-start"><a class="badge bg-info text-decoration-none" href="detail.php?id=<?= $mhs['id']; ?>">Detail</a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

            <div class="col-lg-4"></div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>