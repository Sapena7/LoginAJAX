<?php
require ('src/sql.php');
$id = $_GET['id'];

#Per executar la consulta SELECT si no tenim paràmetres en la consulta podrem usar -> query ()
//$stmt = $pdo-> query ( 'SELECT id, author_id, slug, title, summary, content, published_at FROM post WHERE id=:id');
$stmt = $pdo-> prepare( 'SELECT p.id, p.author_id, p.slug, p.title, p.summary, u.full_name,p.content, p.published_at FROM post as p, user as u WHERE p.id =:id and p.author_id=u.id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

#Indiquem en quin format volem obtenir les dades de la taula en format d'array associatiu.
#Si no indiquem res per defecte s'usarà FETCH_BOTH el que ens permetrà accedir com a vector associatiu o array numèric.
$stmt-> setFetchMode (PDO :: FETCH_ASSOC);

?>
    <h4>POST</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Fullname</th>
            <th scope="col">slug</th>
            <th scope="col">title</th>
            <th scope="col">summary</th>
            <th scope="col">content</th>
            <th scope="col">published_at</th>
        </tr>
        </thead>
        <?php
        #Llegim les dades del recordset amb el mètode -> fetch ()
        while ($row = $stmt-> fetch ()) {
            ?>
            <tbody>
            <tr>
                <td>
                    <?php  echo $row ['id']. "<br/>";?>
                </td>
                <td>
                    <?php  echo $row ['full_name']. "<br/>";?>
                </td>
                <td>
                    <?php  echo $row ['slug']. "<br/>";?>
                </td>
                <td>
                    <?php  echo $row ['title'];?>
                </td>
                <td>
                    <?php  echo $row ['summary'];?>
                </td>
                <td>
                    <?php  echo $row ['content'];?>
                </td>
                <td>
                    <?php  echo $row ['published_at'];?>
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
