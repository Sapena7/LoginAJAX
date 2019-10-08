<?php

require 'funcions.php';

function filtrarGeneroMusical($canciones){

    foreach ($canciones as $key => $artist) {

        if (!empty($_POST['textoBuscar'])) {

            if ($_POST['textoBuscar'] == $canciones['Song'] || $_POST['textoBuscar'] == $canciones['Album']) {
                if ($canciones['Genre'] == $_POST['generoMusical'] || $_POST['generoMusical'] == "Tots") {
                    echo $artist . "<br>";
                }
            }
        } else {
            if ($_POST['generoMusical'] == "Tots") {
                echo $artist . "<br>";
            }
            if ($_POST['generoMusical'] == "Jazz") {
                if ($canciones['Genre'] == "Jazz") {
                    echo $artist . "<br>";
                }

            }
            if ($_POST['generoMusical'] == "Rock") {
                if ($canciones['Genre'] == "Rock") {
                    echo $artist . "<br>";
                }

            }
            if ($_POST['generoMusical'] == "Blues") {
                if ($canciones['Genre'] == "Blues") {
                    echo $artist . "<br>";
                }

            }
            if ($_POST['generoMusical'] == "Pop") {
                if ($canciones['Genre'] == "Pop") {
                    echo $artist . "<br>";
                }
            }
        }
    }
    array_filter($canciones, "filtrarGeneroMusical");
}