<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Menghungkan ke file functions.php
require 'functions.php';

// Tampung ke variable
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}

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

    <div class="container mt-3">
        <a class="btn btn-secondary" href="logout.php">Log out</a>
        <h3 class="text-center">Daftar Mahasiswa</h3>

        <div class="row p-3 mt-2 bg bg-outline-primary rounded">
            <div class="col d-flex justify-content-between">
                <a class="btn btn-primary" href="tambah.php">Tambah Mahasiswa</a>
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" name="keyword" id="cari" placeholder="Search" aria-label="Search" autofocus>
                    <button class="btn btn-outline-primary" name="cari" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="row mt-3">

            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Maaf, Data Mahasiswa tidak ditemukan!
                </div>
            <?php endif; ?>

            <?php $i = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <div class="col-sm-2 mb-4">

                    <div class="card">
                        <img src="img/<?= $mhs['gambar']; ?>" class="card-img-top" alt="<?= $mhs['nama']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mhs['nama']; ?></h5>
                            <p class="card-text"><?= $mhs['nrp']; ?></p>
                            <a href="detail.php?id=<?= $mhs['id']; ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>


        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>