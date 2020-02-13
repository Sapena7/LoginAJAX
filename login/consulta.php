<?php

class consulta{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        if (isset($_POST['pass']) && isset($_POST['username'])) {
            $pass = $_POST['pass'];
            $username = $_POST['username'];
            $stmt = $this->pdo->prepare("SELECT username, password FROM usuarios WHERE username = '$username' AND password = '$pass' ");

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_NUM);
            if ($row == true) {
                $username = $row['1'];
                $hash = password_hash($pass, PASSWORD_BCRYPT);

                setcookie("hash", $hash);
            }else{
                return false;
            }
        }

        return $hash;
    }

}
$pdo = new PDO ( "mysql:host=localhost;dbname=login;charset=utf8", "jsapena", "jsapena");
$consulta = new consulta($pdo);

if($_COOKIE['hash']){
    echo $_COOKIE['hash'];
}else{
    $hash = $consulta->login();
    $hash = json_encode($hash);
    echo $hash;
}

?>