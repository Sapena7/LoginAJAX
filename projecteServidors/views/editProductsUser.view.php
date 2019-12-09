<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/dashboard.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/table.css">
<link rel="stylesheet" type="text/js" href="js/table.css">

<link rel="stylesheet" type="text/css" href="styles/profile2.css">

<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="images/<?php echo $userInformation->getImg();?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $userInformation->getNombre();?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php?page=profile">
                                <i class="glyphicon glyphicon-home"></i>
                                Perfil </a>
                        </li>
                        <li>
                            <a href="index.php?page=editProfile">
                                <i class="glyphicon glyphicon-user"></i>
                                Modificar Perfil </a>
                        </li>
                        <li>
                            <a href="index.php?page=editProductsUser" target="_blank">
                                <i class="glyphicon glyphicon-edit"></i>
                                Productos </a>
                        </li>
                        <li>
                            <a href="index.php?page=change_password" target="_blank">
                                <i class="glyphicon glyphicon glyphicon-wrench"></i>
                                Cambiar contraseña </a>
                        </li>
                        <li>
                            <a href="index.php?page=index" target="_blank">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                Tienda </a>
                        </li>
                        <li>
                            <a href="src/logout.php" target="_blank">
                                <i class="glyphicon glyphicon glyphicon-log-out"></i>
                                Cerrar session </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>

            <div class="col-sm-4">
                <a href="index.php?page=createProduct">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Añadir Producto</button>
                </a>
            </div>

        <div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <form action="index.php?page=inicio" name="search_form" method="GET">
                        <input type="hidden" name="page" value="<?= $_GET['page'];?>">
                        <input type="hidden" name="pages" value="<?php echo $pagePagination;?>">

                        <td>Fecha Inicio:</td>
                        <input class="date" type="date" name="fechaMin">


                        <td>Fecha Final:</td>
                        <input type="date" name="fechaMax" style="width: 160px">

                        <input type="text" name="textFilter" style="width: 160px">

                        <input type="submit" name="search" value="Filtrar">
                    </form><br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Img</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($productsUser as $product){

                            //Pasar a string per a poder-ho mostrar
                            $date = $product->getFecha();
                            $dateString = $date->format('Y-m-d');
                            ?>
                            <tr>
                                <td><?php echo $product->getId();?></td>
                                <td><?php echo $product->getNombre();?></td>
                                <td class="cortar"><?php echo $product->getDescripcion();?></td>
                                <td><?php echo $product->getPrecio() . "€" ;?></td>
                                <td><?php echo $product->getMarca();?></td>
                                <td class="cortar"><?php echo $product->getImg();?></td>
                                <td><?php echo $product->getCategoria();?></td>
                                <td><?php echo $product->getStock();?></td>
                                <td><?php echo $dateString;?></td>
                                <td>
                                    <!--<a class="add" title="Añadir" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>-->
                                    <a href="index.php?page=modifyProduct&id=<?php echo $product->getId();?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="index.php?page=deleteProduct&id=<?php echo $product->getId();?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if ($previous!=0){ ?>
                                <li class="active"><a href="index.php?page=editProductsUser&pages=<?= $previous . $categoria . $fechaMin . $fechaMax . $textFilter;?>">Previous</a></li>
                            <?php }
                            ?>

                            <?php
                            for ($i = 1; $i<=$pages; $i++){?>
                                <li class="active"><a href="index.php?page=editProductsUser&pages=<?= $i . $categoria . $fechaMin . $fechaMax . $textFilter;?>"><?=$i?></a></li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($next<=$pages){ ?>
                                <li class="active"><a href="index.php?page=editProductsUser&pages=<?= $next . $categoria . $fechaMin . $fechaMax . $textFilter;?>">Next</a></li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>