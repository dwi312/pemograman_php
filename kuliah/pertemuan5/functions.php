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
    mysqli_query($db, $query) or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}


function hapus($id)
{
    $db = Koneksi();
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}


function edit($data)
{
    $db = koneksi();

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar ='$gambar'
            WHERE id =$id";

    mysqli_query($db, $query) or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}


function cari($keyword)
{
    $db = Koneksi();

    $query = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                ";

    $result = mysqli_query($db, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $db = Koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    if (query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {
        // Set session
        $_SESSION['login'] = true;

        header("Location: index.php");
        exit;
    } else {
        return [
            'error' => true,
            'pesan' => 'username / password salah'

        ];
    }
}
