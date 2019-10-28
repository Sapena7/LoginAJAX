<!DOCTYPE html>
<php lang="en">
    <head>
        <title>Categories</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Futbol Shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
        <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="styles/login.css">
    </head>
<body>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['inputEmail'];
    $pass = $_POST['inputPassword'];
    if ($email == "jaumesapena77@gmail.com" && $pass = "1234"){
        ?>
<?php
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-signin">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="email" required autofocus>
                            <label for="inputEmail">Email</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="contraseña" required>
                            <label for="inputPassword">Contraseña</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                        <hr class="my-4">
                        <p>¿Aun no estas registrado? Registrate!</p>
                        <a href="registro.php">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" name="submit" type="submit">Registrate</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

