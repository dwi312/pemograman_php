<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('User berhasil mendaftarkan. silahkan login');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo 'Registrasi gagal!';
    }
}






?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container text-center mt-3">
        <div class="row mb-5">
            <div class="col">
                <h1>Sign Up</h1>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        Form Registrasi
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-1">
                                <label for="username" class="form-label">Username :</label>
                                <input type="text" class="form-control" name="username" id="username" required autocomplete="off" autofocus>
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" name="password" class="form-control" id="password" required autocomplete="off">
                            </div>
                            <div class="mb-1">
                                <label for="cpassword" class="form-label">Konfirmasi Password :</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword" required autocomplete="off">
                            </div>

                    </div>
                    <div class="card-footer">

                        <button type="submit" name="registrasi" class="btn btn-primary">Register</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>