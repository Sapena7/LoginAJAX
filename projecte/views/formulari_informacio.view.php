<?php

?>

<h1>FORMULARI INFORMACIÓ</h1>

<?php
require("../src/songs.inc.php");

array_map("generarInformacio", $canciones);



function generarInformacio($canciones){
    ?>
    <p>Artist: <?php echo $canciones['Artist']; ?> </p>
    <p>Song: <?php echo $canciones['Song']; ?></p>
    <p>Album: <?php echo $canciones['Album']; ?></p>
    <p>Genre: <?php echo $canciones['Genre']; ?></p>

    <br>
    <hr>
    <br>
    <?php
}
?>


