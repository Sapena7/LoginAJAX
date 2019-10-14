<?php

function filtrarInformacio($cancion){


    if (empty($_POST['textoBuscar'])) {
        if ($_POST['generoMusical'] == "Tots"){
            return true;
        }else{
            return $_POST['generoMusical'] == $cancion['Genre'];
        }
    }else{

        if ($_POST['radio'] == "titulosCancion"){
            if ($_POST['generoMusical'] == "Tots"){
                return stripos($_POST['textoBuscar'],  $cancion['Song']) !== false;
            }else{
                return stripos($_POST['textoBuscar'],  $cancion['Song']) !== false && $_POST['generoMusical'] == $cancion['Genre'];
            }
        }else if($_POST['radio'] == "nombresAlbum"){
            if ($_POST['generoMusical'] == "Tots"){
                return stripos($_POST['textoBuscar'],  $cancion['Album']) !== false;
            }else{
                return stripos($_POST['textoBuscar'],  $cancion['Album']) !== false && $_POST['generoMusical'] == $cancion['Genre'];
            }
        }else if($_POST['radio'] == "ambosCampos"){
            if ($_POST['generoMusical'] == "Tots"){
                return stripos($_POST['textoBuscar'],  $cancion['Song']) !== false || stripos($_POST['textoBuscar'],  $cancion['Album']) !== false;
            }else{
                return (stripos($_POST['textoBuscar'],  $cancion['Song']) !== false || stripos($_POST['textoBuscar'],  $cancion['Album'])) !== false && $_POST['generoMusical'] == $cancion['Genre'];
            }
        }
    }
}

function generarInformacio($canciones){
    ?>
    <p>Artist: <?php echo $canciones['Artist']; ?> </p>
    <p>Song: <?php echo $canciones['Song']; ?></p>
    <p>Album: <?php echo $canciones['Album']; ?></p>
    <p>Genre: <?php echo $canciones['Genre']; ?></p>

    <br>
    <hr>
    <br>
    <?php
}
?>
