<html>
    <?php

        /*
         * Cookies
         */
        $date = date("d-m-Y H:i:s");

        /*
        $num_vegades = filter_input(INPUT_COOKIE, 'num_vegades', FILTER_SANITIZE_NUMBER_INT);
        setcookie ("nom_usuari", "Jaume", time()+31556926 ,'/');
        setcookie ("data_anterior", $date, time()+31556926 ,'/');
        setcookie ("num_vegades", $num_vegades+1, time()+31556926 ,'/');
        $num_vegades++;
        */
        /*
         * Sessions
         */
        session_start();
        $_SESSION['user'] = "Jaume";

        if (isset($_SESSION['views'])){
            $_SESSION['views']++;
        }else {
            $_SESSION['views'] = 0;
        }

    ?>
    <head>
        <title>
            Cookies
        </title>
    </head>
    <body>
    <h1>Cookies</h1>
    <?php

        /*
         * Cookies
         */
        /*
        if ($num_vegades > 1) {
            $nom_usuari = filter_input(INPUT_COOKIE, 'nom_usuari', FILTER_SANITIZE_STRING);
            $data_anterior = filter_input(INPUT_COOKIE, 'data_anterior', FILTER_SANITIZE_STRING);
            $num_vegades = filter_input(INPUT_COOKIE, 'num_vegades', FILTER_SANITIZE_NUMBER_INT);
            echo "Es la segona vegada <br>";
            echo "Benvingut " . "<b>" . $nom_usuari . "</b>" . "<br>";
            echo "Data anterior: " . $data_anterior . "<br>";
            echo "Numero de visites: " . $num_vegades . "<br>";
        }else{
            echo "Benvingut <br>";
        }
        */

        /*
         * Sessions
         */
        $views = $_SESSION['views'];
        if ($views > 0) {
            $user = $_SESSION['user'];
            $last_date = $_SESSION['last_date'];
            echo "Es la segona vegada <br>";
            echo "Benvingut " . "<b>" . $user . "</b>" . "<br>";
            echo "Data anterior: " . $last_date . "<br>";
            $_SESSION['last_date'] = $date;
            echo "Numero de visites: " . $views . "<br>";
        }else{
            echo "Benvingut <br>";
            $_SESSION['last_date'] = $date;
        }

        if(isset($_POST['netejarBtn'])) {
            session_unset();
           session_destroy();
           echo "S'ha eliminat la sessio i els seus registres";
        }
    ?>
    <form method="POST" action=''>
        <input type="submit" name="netejarBtn"  value="Netejar">
    </form>
    </body>
</html>