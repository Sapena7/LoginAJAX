<?php
namespace App\Controller;

use App\Model\UserModel;
use App\Model\ProductModel;
use App\Entity\Product;
use App\Entity\User;

class UserController extends AbstractController
{

    function login(){
        $model = new UserModel($this->db);
        $user = $model->fillData();

        /*
         * Comença la sessio una vegada recibixca el POST
         */
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            session_start();

            if (isset($_GET['cerrar_sesion'])) {
                session_unset();
                session_destroy();
            }

            $model->login($user); //Comprova l'usuari i la contrasenya i fa login

        }
        require('views/login.view.php');
        return "";
    }

    function dashboard(){
        global $route;
        session_start();
        $nombre = $_SESSION['nombre'];

        /*
         * Si l'usuari no te rol va al login,
         * i si en te pero no es 2 tambe.
         */
        if (!isset($_SESSION['rol'])) {
            header("location: " . $route->generateURL('User', 'login'));
        } else {
            if ($_SESSION['rol'] != 2) {
                header("location: " . $route->generateURL('User', 'login'));
            }
        }
        require('views/dashboard.view.php');
        return "";
    }

    public function profile(){
        global $route;
        session_start();

        /*
         * Si l'usuari es anonim el redirigix al login
         */
        if (!isset($_SESSION['rol'])) {
            header("location: " . $route->generateURL('User', 'login'));
        }

        $id = $_SESSION['Id'];
        $model = new UserModel($this->db);

        $userInformation = $model->getUserInformation($id);

        require('views/profile.view.php');
        return "";
    }

}