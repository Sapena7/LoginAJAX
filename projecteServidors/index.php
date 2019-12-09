<?php

use App\Entity\Categoria;
use App\Entity\Product;
use App\Entity\User;
use App\Model\ProductModel;
use App\Model\UserModel;
use App\DBConnection;
use App\Core\Router;
use App\Core\Request;
use App\Utils\DependencyInjector;

require __DIR__ . '/config/bootstrap.php';

$page = $_GET['page'] ?? "index";

$di = new DependencyInjector();

$db = new DBConnection();
$di->set('PDO', $db->getConnection());

$request = new Request();

$route = new Router($di);
$route->route($request);

switch ($page) {
    case "login":
        {
            break;
        };

    case "profile":
        {
            break;
        };
    case "editProfile":
        {
            session_start();

            /*
             * Si l'usuari es anonim el redirigix al login
             */
            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            }

            $id = $_SESSION['Id'];

            $db = new DBConnection();
            $pdo = $db->getConnection();
            $model = new UserModel($pdo);

            $userNotModified = $model->getUserInformation($id); //Agafa l'informacio de l'usuari a partir del id
            $userModified = $model->fillDataModify(); //Plena l'usuari
            $userModified->setId($id); //li posa el ud
            $errors = $model->validate($userModified); //verifica els errors

            if (empty($errors)) {
                $model->updateUser($userModified);
            }

            $statusMsg = $model->uploadImatge($id); //Per a putjar l'imatge


            require("views/$page.view.php");
            break;

        };

    case "editProductsUser":
        {

            session_start();

            /*
             * Si l'usuari es anonim el redirigix al login
             */
            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            }

            $id = $_SESSION['Id'];


            $db = new DBConnection();
            $pdo = $db->getConnection();
            $modelUser = new UserModel($pdo);

            /*
             * Agarrem els parametres del filtre per el metode GET
             */
            $categoria = "";
            $fechaMin = "";
            $fechaMax = "";
            $textFilter = "";
            $categoria = filter_input(INPUT_GET, "categoria", FILTER_SANITIZE_NUMBER_INT);
            $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
            $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
            $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);


            $userInformation = $modelUser->getUserInformation($id); //Agarra les dades de l'usuari

            try {
                $modelProduct = new ProductModel($pdo);

                $limit = 4;
                $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
                $start = ($pagePagination - 1) * $limit;

                /*
                 * Torna els productes dels que l'usuari siga propietari
                 */
                $productsUser = $modelProduct->getProductsByUserFiltered($start, $limit, $userInformation, $categoria, $fechaMin, $fechaMax, $textFilter);

                /*
                 * Conta el numero de productes que te, per a fer la paginacio
                 */
                $total = $modelProduct->countProductsByUserFiltered($userInformation, $categoria, $fechaMin, $fechaMax, $textFilter);

                /*
                 * Trau el total de pagines que ha de fer a partir
                 * del total de productes i el llimit que li hem passat
                 */
                $pages = ceil($total / $limit);


                $previous = $pagePagination - 1;
                $next = $pagePagination + 1;

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
                echo "Error: executant consulta SQL." . $e->getMessage();
            }

            require("views/$page.view.php");
            break;

        };
    case "change_password":
        {
            session_start();

            $id = $_SESSION['Id'];

            $db = new DBConnection();
            $pdo = $db->getConnection();
            $model = new UserModel($pdo);
            $user = $model->getUserInformation($id);

            $response = "";

            $response = $model->getUserPasswordAndChange($user);


            if ($response == 1) {
                echo "Contraseña actualizada";
            } else {
                echo "Las contraseñas no coinciden / la contraseña antigua no es correcta";
            }


            require("views/$page.view.php");
            break;
        };

    case "product":
        {
            break;
        };

    case "dashboard":
        {
            break;
        };


    case "adminProducts":
        {
            session_start();

            $nombre = $_SESSION['nombre'];

            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            } else {
                if ($_SESSION['rol'] != 2) {
                    header("location: index.php?page=login");
                }
            }

            try {
                /*
                 * Funciona de la mateixa manera que per a l'usuari, en aquest
                 * cas mostra tots els productes de la tenda, no sols per usuari
                 */
                $db = new DBConnection();
                $pdo = $db->getConnection();
                $model = new ProductModel($pdo);


                $categoria = "";
                $fechaMin = "";
                $fechaMax = "";
                $textFilter = "";
                $categoria = filter_input(INPUT_GET, "categoria", FILTER_SANITIZE_NUMBER_INT);
                $fechaMin = filter_input(INPUT_GET, "fechaMin", FILTER_SANITIZE_STRING);
                $fechaMax = filter_input(INPUT_GET, "fechaMax", FILTER_SANITIZE_STRING);
                $textFilter = filter_input(INPUT_GET, "textFilter", FILTER_SANITIZE_STRING);


                $limit = 12;
                $pagePagination = isset($_GET['pages']) ? $_GET['pages'] : 1; //Agarra el numero de la pagina, en cas de que no hi haja, pagina sera 1
                $start = ($pagePagination - 1) * $limit;

                $productsAdmin = $model->getProductsFiltered($start, $limit, $categoria, $fechaMin, $fechaMax, $textFilter);

                $total = $model->countProductsFiltered($categoria, $fechaMin, $fechaMax, $textFilter);


                $pages = ceil($total / $limit);

                $previous = $pagePagination - 1;
                $next = $pagePagination + 1;


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

            require("views/$page.view.php");
            break;
        };

    case "createProduct":
        {

            session_start();

            $idUser = $_SESSION['Id'];

            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            }

            try {
                $db = new DBConnection();
                $pdo = $db->getConnection();
                $model = new ProductModel($pdo);
                $modelUser = new UserModel($pdo);

                $usuario = $modelUser->getUserInformation($idUser);

                /*
                 * Cuan li donem a submit ens plena el producte
                 * amb les dades del formulari, ho valida
                 * i si no te errors l'inserta amb l'usuari que l'ha creat.
                 */
                if (isset($_POST['submit'])) {
                    $product = $model->fillData();
                    $errors = $model->validate($product);
                    if (empty($errors)) {
                        $result = $model->insert($product, $usuario);

                    } else {

                    }
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            require("views/$page.view.php");
            break;
        };

    case "modifyProduct":
        {
            session_start();

            $idUser = $_SESSION['Id'];

            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            }

            try {
                $db = new DBConnection();
                $pdo = $db->getConnection();
                $model = new ProductModel($pdo);
                $modelUser = new UserModel($pdo);

                $id = $_GET['id'];

                $usuario = $modelUser->getUserInformation($idUser);

                $productNotModified = $model->getById($id);
                $productModified = $model->fillData();

                $productModified->setId($id);
                $errors = $model->validate($productModified);

                /*
                 * Verifica si l'usuari es propietari del producte
                 */
                $isOwner = $model->verifyProductOwner($productNotModified, $usuario);

                /*
                 * Verifica si l'usuari es administrador
                 */
                $isAdmin = $modelUser->isAdmin($usuario);

                /*
                 * Si el propietari no es el correcte
                 * o no es admin, no deixa modificar i
                 * redirigix al login
                 */
                if ($isOwner || $isAdmin){
                    //En cas de que tinga errors els formulari per a modificar, no el modifica
                    if (empty($errors)) {
                        $model->update($productModified);
                    }
                }else{
                    header("location: index.php?page=login");
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

            require("views/$page.view.php");
            break;
        };

    case "deleteProduct":
        {

            session_start();

            $idUser = $_SESSION['Id'];

            if (!isset($_SESSION['rol'])) {
                header("location: index.php?page=login");
            }

            try {
                $db = new DBConnection();
                $pdo = $db->getConnection();
                $model = new ProductModel($pdo);
                $modelUser = new UserModel($pdo);

                $id = $_GET['id'];
                $product = $model->getById($id);
                $result = "";

                $usuario = $modelUser->getUserInformation($idUser);

                $errors = $model->validate($product);
                $isOwner = $model->verifyProductOwner($product, $usuario);
                $isAdmin = $modelUser->isAdmin($usuario);

                if ($isOwner || $isAdmin){
                    if (empty($errors)) {
                        $result = $model->delete($product);
                    }
                }else{
                    header("location: index.php?page=login");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            require("views/$page.view.php");
            break;
        };

    case "index":
        {
            break;
        };
    case "categories":
        {
            break;
        };
    case "botasFutbol":
        {
            break;
        };
    case "botasFutbolSala":
        {
            break;
        };
    case "camisetasEntrenamiento":
        {
            break;
        };


    case "registro":
        {

            require("views/$page.view.php");
            break;
        };

    default:
        require('views/errorPage.php');
        break;

}
