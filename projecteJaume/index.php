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
    default:
        {
            require("views/error.view.php");
        };
}


