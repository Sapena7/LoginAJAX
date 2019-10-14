<?php

?>

<h1>FORMULARI INFORMACIÓ</h1>

<?php
require("../src/songs.inc.php");
?>
<table class="table">
    <tr>
        <th>Artist</th>
        <th>Song</th>
        <th>Album</th>
        <th>Genre</th>
    </tr>
    <?php
    foreach ($arrayMapCanciones as $cancion) {
        ?>
        <tr>
            <?php
            foreach ($cancion as $key => $c){
                ?>
                <td><?php echo $c ;?></td>
                <?php
            }
            ?>
        </tr>

        <?php
    }
    ?>
</table>


