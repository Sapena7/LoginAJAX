<?php


namespace App\Controller;

use App\Model\ProductModel;
use App\Model\UserModel;
use App\Entity\Product;

class ProductController extends AbstractController{

//$page, $pages,$categoria, $fechaMin, $fechaMax, $textFilter, $search

    public function index()
    {

        session_start();
        if(isset($_SESSION['nombre'])){
            $nombre = $_SESSION['nombre'];
        }else{
            $nombre = "";
        }
        if(isset($_SESSION['rol'])){
            $rol = $_SESSION['rol'];
        }else{
            $rol = "";
        }
        if(isset($_SESSION['Id'])){
            $id = $_SESSION['Id'];
        }else{
            $id = "";
        }

        try {
            $model = new ProductModel($this->db);
            $modelUser = new UserModel($this->db);

            if (!empty($id)){
                $user = $modelUser->getUserInformation($id);
            }else{
                $user = null;
            }


            $categoria = filter_input(INPUT_GET, "categoria", FILTER_SANITIZE_NUMBER_INT);
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);
            $usuario = filter_input(INPUT_GET, "usuario", FILTER_VALIDATE_INT);


            $limit = 12;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            /*
             * Mostra els productes de l'usuari actual en cas de
             * que haja fet login.
             */

            /*
            * Si no ha fet login, mostra tots els productes
             * de la tenda.
            */
            if (!empty($usuario)){
                $user = $modelUser->getUserInformation($id);
                $productsFiltered = $model->getProductsByUserFiltered($start, $limit, $user, $categoria, $fechaMin, $fechaMax, $textFilter);
                $total = $model->countProductsByUserFiltered($user, $categoria, $fechaMin, $fechaMax, $textFilter);
            }else{
                $productsFiltered = $model->getProductsFiltered($start, $limit, $categoria, $fechaMin, $fechaMax, $textFilter);
                $total = $model->countProductsFiltered($categoria, $fechaMin, $fechaMax, $textFilter);
            }

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;

            var_dump($pages);
            var_dump($previous);
            var_dump($next);

            if (!empty($usuario)){
                $usuario = "&usuario=".$usuario;
            } else {
                $usuario = "";
            }
            if (!empty($categoria)){
                $categoria = "&categoria=".$categoria;
            } else {
                $categoria = "";
            }

            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage() . $e->getLine();
        }
        require('views/index.view.php');
        return "";
    }

    public function getProductsFiltered(){

        session_start();
        if(isset($_SESSION['nombre'])){
            $nombre = $_SESSION['nombre'];
        }else{
            $nombre = "";
        }
        if(isset($_SESSION['rol'])){
            $rol = $_SESSION['rol'];
        }else{
            $rol = "";
        }
        if(isset($_SESSION['Id'])){
            $id = $_SESSION['Id'];
        }else{
            $id = "";
        }

        try {
            $model = new ProductModel($this->db);
            $modelUser = new UserModel($this->db);

            if (!empty($id)){
                $user = $modelUser->getUserInformation($id);
            }else{
                $user = null;
            }


            $categoria = filter_input(INPUT_GET, "categoria", FILTER_SANITIZE_NUMBER_INT);
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);
            $usuario = filter_input(INPUT_GET, "usuario", FILTER_VALIDATE_INT);


            $limit = 12;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            /*
             * Mostra els productes de l'usuari actual en cas de
             * que haja fet login.
             */

            /*
            * Si no ha fet login, mostra tots els productes
             * de la tenda.
            */
            if (!empty($usuario)){
                $user = $modelUser->getUserInformation($id);
                $productsFiltered = $model->getProductsByUserFiltered($start, $limit, $user, $categoria, $fechaMin, $fechaMax, $textFilter);
                $total = $model->countProductsByUserFiltered($user, $categoria, $fechaMin, $fechaMax, $textFilter);
            }else{
                $productsFiltered = $model->getProductsFiltered($start, $limit, $categoria, $fechaMin, $fechaMax, $textFilter);
                $total = $model->countProductsFiltered($categoria, $fechaMin, $fechaMax, $textFilter);
            }

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;

            if (!empty($usuario)){
                $usuario = "&usuario=".$usuario;
            } else {
                $usuario = "";
            }
            if (!empty($categoria)){
                $categoria = "&categoria=".$categoria;
            } else {
                $categoria = "";
            }

            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage() . $e->getLine();
        }
        require('views/index.view.php');
        return "";
    }

    public function getBotasFutbol(){
        /*
             * En aquesta pàgina es mostren els productes
             * de la categoria de botes de futbol
             */

        try {
            session_start();

            $model = new ProductModel($this->db);

            $categoria = "";
            $fechaMin = "";
            $fechaMax = "";
            $textFilter = "";

            $productCategory = 1;
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);

            $limit = 6;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            /*
             * Filtrem per la categoria i per els filtres que
             * l'usuari indique
             */

            $products = $model->getProductsFiltered($start, $limit, $productCategory, $fechaMin, $fechaMax, $textFilter);
            $total = $model->countProductsFiltered($productCategory, $fechaMin, $fechaMax, $textFilter);

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;


            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage();
        }
        require('views/botasFutbol.view.php');
        return "";
    }

    public function getBotasFutbolFiltered(){
        /*
             * En aquesta pàgina es mostren els productes
             * de la categoria de botes de futbol
             */

        try {
            session_start();

            $model = new ProductModel($this->db);

            $categoria = "";
            $fechaMin = "";
            $fechaMax = "";
            $textFilter = "";

            $productCategory = 1;
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);

            $limit = 6;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            /*
             * Filtrem per la categoria i per els filtres que
             * l'usuari indique
             */

            $products = $model->getProductsFiltered($start, $limit, $productCategory, $fechaMin, $fechaMax, $textFilter);
            $total = $model->countProductsFiltered($productCategory, $fechaMin, $fechaMax, $textFilter);

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;


            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage();
        }
        require('views/botasFutbol.view.php');
        return "";
    }

    public function getBotasFutbolSala(){

        try {
            session_start();
            $model = new ProductModel($this->db);

            $categoria = "";
            $fechaMin = "";
            $fechaMax = "";
            $textFilter = "";

            $productCategory = 2;
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);

            $limit = 4;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            //$products = $model->getFootballBoots($start, $limit);
            $products = $model->getProductsFiltered($start, $limit, $productCategory, $fechaMin, $fechaMax, $textFilter);
            $total = $model->countProductsFiltered($productCategory, $fechaMin, $fechaMax, $textFilter);

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;


            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage();
        }

        require('views/botasFutbolSala.view.php');
        return "";
    }

    public function getCamisetasEntrenamiento(){

        try {
            session_start();
            $model = new ProductModel($this->db);

            $categoria = "";
            $fechaMin = "";
            $fechaMax = "";
            $textFilter = "";

            $productCategory = 3;
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);

            $limit = 6;
            $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
            $start = ($pagePagination - 1) * $limit;

            //$products = $model->getFootballBoots($start, $limit);
            $products = $model->getProductsFiltered($start, $limit, $productCategory, $fechaMin, $fechaMax, $textFilter);
            $total = $model->countProductsFiltered($productCategory, $fechaMin, $fechaMax, $textFilter);

            $pages = ceil($total / $limit);

            $previous = $pagePagination - 1;
            $next = $pagePagination + 1;


            if (!empty($fechaMin)){
                $fechaMin = "&fechaMin=".$fechaMin;
            } else {
                $fechaMin = "";
            }

            if (!empty($fechaMax)){
                $fechaMax = "&fechaMax=".$fechaMax;
            } else {
                $fechaMax = "";
            }

            if (!empty($textFilter)){
                $textFilter = "&textFilter=".$textFilter;
            } else {
                $textFilter = "";
            }

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage();
        }


        require('views/camisetasEntrenamiento.view.php');
        return "";
    }

    public function getCategories(){
        session_start();
        $nombre = $_SESSION['nombre'];

        require('views/categories.view.php');
        return "";
    }

    public function getProductById($id){
        session_start();
        try {
            //$id = $_GET['id'];
            $idUser = $_SESSION['Id'];

            $model = new ProductModel($this->db);
            $modelUser = new UserModel($this->db);

            $product = $model->getById($id);
            $user = $modelUser->getUserInformation($idUser);

            /*
             * Creem 4 productes aleatoris per a que els
             * recomane al clicar en un producte.
             */
            $relatedProduct1 = $model->getRandomProduct();
            $relatedProduct2 = $model->getRandomProduct();
            $relatedProduct3 = $model->getRandomProduct();
            $relatedProduct4 = $model->getRandomProduct();

            /*
             * Els afegixc a un array, i els recorrec en la vista
             */
            $relatedProducts = [$relatedProduct1, $relatedProduct2, $relatedProduct3, $relatedProduct4];

        } Catch (PDOException $e) {
            // Mostrem un missatge genèric d'error.
            echo "Error: executant consulta SQL." . $e->getMessage();
        }

        require('views/product.view.php');
        return "";
    }
}