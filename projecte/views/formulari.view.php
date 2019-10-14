<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 100px;
            background: #aaa;
        }
    </style>
</head>
<body>

<?php
require 'partials/header.partial.php';
?>
<main class="container" style="margin-top:30px">

    <div class="col-sm-8">
        <h2>FORMULARI</h2>
        <br>
    </div>
    </div>

    <form action="<?php $_SERVER['PHP_SELF'] . $_SERVER['QUERY_STRING']; ?>" method="post">

        <div class="form-group">
            <label for="textoBuscar">Texto a Buscar:</label>
            <input type="text" class="form-control" id="textoBuscar" name="textoBuscar" >
        </div>
        <div id="buscarEn" class="form-group">
            <label for="buscarEn" name="buscarEn">Buscar en:</label>
            <input type="radio" name="radio" value="titulosCancion" checked>Titulos de cancion
            <input type="radio" name="radio" value="nombresAlbum" >Nombres de Album
            <input type="radio" name="radio" value="ambosCampos" >Ambos campos<br>
        </div>
        <div class="form-group">
            Genero Musical:
            <select name="generoMusical" selected="Tots" >
                <option value="Tots">Tots</option>
                <option value="Blues">Blues</option>
                <option value="Jazz">Jazz</option>
                <option value="Pop">Pop</option>
                <option value="Rock">Rock</option>
            </select> <br>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar" </input>

    </form>

    <table class="table">
        <tr>
            <th>Artist</th>
            <th>Song</th>
            <th>Album</th>
            <th>Genre</th>
        </tr>
    <?php
    foreach ($arrayCanciones as $cancion) {
        ?>
        <tr>
            <?php
                foreach ($cancion as $key => $c){
                    ?>
                        <td><?php echo $c ;?></td>
                    <?php
                }
            ?>
        </tr>

        <?php
    }
    ?>
    </table>
</main>


<?php
require 'partials/footer.partial.php';
?>


</body>
</html>