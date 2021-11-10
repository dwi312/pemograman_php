<?php
// Koneksi ke database dan pilih database
$db = mysqli_connect('localhost', 'root', '', 'php_dasar');

// Query isi table data
$result = mysqli_query($db, "SELECT * FROM mahasiswa");

// Ubah data ke dalam array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Tampung ke variable
$mahasiswa = $rows;



?>

<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->



    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h3>Daftar Mahasiswa</h3>

    <div>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><img src="img/<?= $mhs['gambar']; ?>" width="80"></td>
                    <td><?= $mhs['nrp']; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['email']; ?></td>
                    <td><?= $mhs['jurusan']; ?></td>
                    <td><a href="#">Edit</a> | <a href="#">Hapus</a></td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>