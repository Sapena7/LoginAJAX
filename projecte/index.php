<?php


$page = $_GET['page']??"index";

switch ($page) {
    case "index":
        {
            require("views/$page.view.php");
            break;
        };
    case "formulari":
        {

            require 'src/funcions.php';
            require 'src/songs.inc.php';
            $arrayCanciones = $canciones;

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $arrayCanciones = array_filter($canciones, "filtrarInformacio");
            }

            require("views/$page.view.php");
            break;
        };
    case "formulari_informacio":
        {
            require 'src/funcions.php';
            $arrayMapCanciones = array_map("generarInformacio", $canciones);
            require("views/$page.view.php");
            break;
        };
    case "formulari_generes":
        {
            require 'src/songs.inc.php';
            $array = array_unique(array_column($canciones, 'Genre'));

            sort($array);
            require("views/$page.view.php");
            break;
        };
    default:
        {
            require("views/error.view.php");
        };

}
