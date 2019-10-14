<?php

?>

<h1>FORMULARI GÈNERES</h1>

<?php
require("../src/songs.inc.php");

    foreach ($canciones as $cancion) {
        ?>
        <p><?php echo $cancion['Genre']; ?> </p>
        <?php

    }
?>


