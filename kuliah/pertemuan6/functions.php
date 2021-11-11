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

    // Pengecekan username
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        // Pengecekan password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'pesan' => 'username / password salah'

    ];
}

function registrasi($data)
{
    $db = Koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $password = mysqli_real_escape_string($db, $data['password']);
    $cpassword = mysqli_real_escape_string($db, $data['cpassword']);

    // Pengecekan jika username dan password kosong
    if (empty($username) || empty($password) || empty($cpassword)) {
        echo "<script>
        alert('username / password tidak boleh kosong!');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    // Pengecekan bila user sudah terdaftar
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
        alert('username sudah digunakan');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    // Pengecekan konfirmasi password
    if ($password !== $cpassword) {
        echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    // Pengecekan minimal karakter password
    if (strlen($password) < 4) {
        echo "<script>
        alert('Karakter minimal 4');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    // Pengecekan jika username dan password sudah sesuai
    // 1. enkripsi password
    $newPassword = password_hash($password, PASSWORD_DEFAULT);

    // 2. Insert ke database table
    $query = "INSERT INTO user
                    VALUES
                 (null, '$username', '$newPassword')";
    mysqli_query($db, $query) or die(mysqli_error($db));
    return mysqli_affected_rows($db);
}
