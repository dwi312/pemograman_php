<?php

require 'functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['url'];

if (hapus($id) > 0) {
    echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php';
            </script>";
} else {
    echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
}
