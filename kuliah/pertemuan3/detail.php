<?php

require 'functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}


$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['edit'])) {
    if (edit($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diedit');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diedit!');
            </script>";
    }
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
                        <a class="btn btn-dark" href="index.php">Kembali</a>
                        <div class="s">
                            <a class="btn btn-danger me-3" href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Hapus <?= $mhs['nama']; ?> ?')">Hapus</a>
                            <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                        <div class="mb-1">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="<?= $mhs['nama']; ?>">
                        </div>
                        <div class="mb-1">
                            <label for="nrp" class="form-label">NRP :</label>
                            <input type="number" class="form-control" name="nrp" id="nrp" aria-describedby="emailHelp" value="<?= $mhs['nrp']; ?>">
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $mhs['email']; ?>">
                        </div>
                        <div class="mb-1">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="emailHelp" value="<?= $mhs['jurusan']; ?>">
                        </div>
                        <div class="mb-1">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="text" class="form-control" name="gambar" id="gambar" aria-describedby="emailHelp" value="<?= $mhs['gambar']; ?>">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>