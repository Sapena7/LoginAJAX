<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Errors personalitzats</title>
</head>
<body>
<?php
require ('src/HTMLForm.php');
require ('src/HTMLControl.php');
require ('src/HTMLInputText.php');
require ('src/HTMLInputRadio.php');
require ('src/HTMLInputSubmit.php');
require ('src/HTMLSelect.php');
require ('src/sql.php');

$form = new HTMLForm('testing.php', 'post');


$form->setAction('test.php');




    #Per executar la consulta SELECT si no tenim paràmetres en la consulta podrem usar -> query ()
    $stmt = $pdo-> query ( 'SELECT p.id, p.title, u.full_name, p.published_at from post p, user u where p.author_id=u.id');
    #Indiquem en quin format volem obtenir les dades de la taula en format d'array associatiu.
    #Si no indiquem res per defecte s'usarà FETCH_BOTH el que ens permetrà accedir com a vector associatiu o array numèric.
    $stmt-> setFetchMode (PDO :: FETCH_ASSOC);

    ?>
<h4>Taula posts</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom autor</th>
        <th scope="col">Titol</th>
        <th scope="col">Publicacio</th>
    </tr>
    </thead>
    <?php
    $id = 0;
    #Llegim les dades del recordset amb el mètode -> fetch ()
    while ($row = $stmt-> fetch ()) {
    ?>
    <tbody>
    <tr>
        <td>
            <?php  echo $row ['id']. "<br/>"; $id = $row ['id'];?>
        </td>
        <td>
            <?php  echo $row ['full_name']. "<br/>";?>
        </td>
        <td>
            <?php  echo $row ['title']. "<br/>";?>
        </td>
        <td>
            <?php  echo $row ['published_at'].  "<a href='resultados.php?id=$id'>Ir a</a><br/>";?>
        </td>

    </tr>
    </tbody>
    <?php
    }
    ?>
</table>
<?php
    #Per alliberar els recursos utilitzats en la consulta SELECT
    $stmt = null;

/*

$input = new HTMLInputText("","", "Search", "");
$form->add($input);

$input = new HTMLInputRadio("type", "song", "Song", "prueba");
$form->add($input);

$input = new HTMLInputRadio("type","album", "Album", "prueba");
$form->add($input);

$input = new HTMLInputRadio("type","all", "All","prueba");
$form->add($input);

$input = new HTMLSelect("type","", "",[
        ["name" => "todos", "value" => "todos"],
        ["name" => "rock", "value" => "rock"],
        ["name" => "pop", "value" => "pop"],
        ["name" => "jazz", "value" => "jazz"],
        ["name" => "blues", "value" => "blues"]


]);

$form->add($input);

$input = new HTMLInputSubmit("submit","Submit", "Submit","asd");
$form->add($input);

echo $form ->render();

echo "Total elementos: " . count($form);

*/
?>

</body>
</html>
