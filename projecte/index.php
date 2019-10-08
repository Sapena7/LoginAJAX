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
            require("views/$page.view.php");
            break;
        };
    case "resultats":
        {
            require 'funcions.php';
            //require("views/$page.view.php");

            if ($_POST == "submit"){
                $arrayCanciones = $canciones;
                $arrayCanciones = array_filter($arrayCanciones, "filtrarGeneroMusical");
            }



            break;
        };
    case "formulari_informacio":
        {
            require("views/$page.view.php");
            break;
        };
    case "formulari_generes":
        {
            require("views/$page.view.php");
            break;
        };
    default:
        {
            require("views/error.view.php");
        };

}
