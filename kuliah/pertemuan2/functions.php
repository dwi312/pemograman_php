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
