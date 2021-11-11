<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

// Ketika tombol login ditekan
if (isset($_POST['login'])) {
    $login = login($_POST);
}





?>
<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>Login</title>
</head>

<body>

    <div class="container mt-3 ">
        <h3 class="text-center">Log in</h3>
        <hr>
        <?php if (isset($login['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $login['pesan']; ?>
            </div>
        <?php endif; ?>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card border-dark">
                    <div class="card-header bg-dark text-light">
                        User Member
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name :</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between border-dark bg-dark">
                        <button type="submit" name="login" class="btn btn-outline-light">login</button>
                        <button type="button" class="btn btn-outline-light"><a href="" class="text-muted">Registrasi</a></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>