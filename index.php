<?php
session_start();
if (isset($_SESSION['usuario']))
{
    echo '<script>location.href = "welcome.php";</script>';
}
else
{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>INICIO DE SESIÓN</title>
        <link rel="stylesheet" href="estilo.css" />
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    </head>
    <body>
    <div class="contenedor">
        <div id="formulario">
            <form method="POST" action="return false" onsubmit="return false">
                <div id="resultado"></div>
                <p><input type="text" name="user" id="user" value="" placeholder="USUARIO"></p>
                <p><input type="password" name="pass" id="pass" value="" placeholder="*******"></p>
                <p><button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">ENTRAR</button></p>
            </form>
            <script>
                function Validar(user, pass)
                {
                    $.ajax({
                        url: "validar.php",
                        type: "POST",
                        data: "user="+user+"&pass="+pass,
                        success: function(resp){
                            $('#resultado').html(resp)
                        }
                    });
                }
            </script>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>