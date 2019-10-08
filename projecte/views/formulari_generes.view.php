<?php

?>

<h1>FORMULARI GÈNERES</h1>

<?php
require("../src/songs.inc.php");


    $array = array_unique(array_column($canciones, 'Genre'));

    sort($array);
    foreach ($array as $clave => $valor) {
        ?>
    <p><?php echo $valor ."\n"; ?> </p>
    <?php

}



/*
$arrayGeneres = [];
foreach ($canciones as $key => $artist) {
    if (!in_array($artist['Genre'], $arrayGeneres)) {
        array_push($arrayGeneres, $artist['Genre']);
    }
}

print_r($arrayGeneres);
*/
?>


