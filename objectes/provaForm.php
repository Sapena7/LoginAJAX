<html>
<head>
    <title>Form Objectes</title>
</head>
<body>
<?php
    require 'HTMLForm.php';
    require 'HTMLControl.php';
    $form = new HTMLForm("provaForm.php","POST");

    $form2 = clone $form;

    $element = new HTMLControl("text","", "text", "Search");
    $form->add($element);
    $element = new HTMLControl("type","song", "radio", "Song");
    $form->add($element);
    $element = new HTMLControl("type","album", "radio", "Album");
    $form->add($element);
    $element = new HTMLControl("type","all", "radio", "Tots");
    $form->add($element);
    $element = new HTMLControl("type","", "select", "select",  [
            ['name' => 'Todos', 'value' => 'All'],
            ['name' => 'Blues', 'value' => 'blues'],
            ['name' => 'Rock', 'value' => 'rock'],
            ['name' => 'Pop', 'value' => 'pop'],
            ['name' => 'Jazz', 'value' => 'jazz']
    ]);
    $form->add($element);



    echo $form ->render();

    ?>
</body>

</html>
