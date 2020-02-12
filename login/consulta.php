<?php

class consulta{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        $username ="";
        if (isset($_POST['pass']) && isset($_POST['username'])) {
            $pass = $_POST['pass'];
            $username = $_POST['username'];
            $stmt = $this->pdo->prepare("SELECT username, password FROM usuarios WHERE username = '$username' AND password = '$pass' ");

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_NUM);
            if ($row == true) {
                $username = $row['1'];
                setcookie("username", $username);
            }else{
                return false;
            }
        }

        return $username;
    }

}
$pdo = new PDO ( "mysql:host=localhost;dbname=login;charset=utf8", "jsapena", "jsapena");
$consulta = new consulta($pdo);

if(isset($_COOKIE['username'])){
    header('location: main.js');
    $username = $_COOKIE['username'];
}else{
    $username = $consulta->login();
    $username = json_encode($username);
}
echo $username;
?>