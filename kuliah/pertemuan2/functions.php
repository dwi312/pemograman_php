<?php

function koneksi()
{
    // Koneksi ke database dan pilih database
    return mysqli_connect('localhost', 'root', '', 'php_dasar');
}

function query($query)
{
    $db = koneksi();

    // Query isi table data
    $result = mysqli_query($db, $query);

    // Ubah data ke dalam array
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function fo()
{

    $id = $_GET['id'];
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");
    return $mahasiswa;
}

function tambah($data)
{
    $db = koneksi();

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO mahasiswa VALUES
    (
        null,
        '$nama',
        '$nrp',
        '$email',
        '$jurusan',
        '$gambar'
    )";
    mysqli_query($db, $query);
    echo mysqli_error($db);
    return mysqli_affected_rows($db);
}
