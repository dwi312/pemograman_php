<?php
require '../functions.php';

$mahasiswa = cari($_GET['keyword']);

?>

<div class="container box">
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