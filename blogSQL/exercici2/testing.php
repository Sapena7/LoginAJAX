<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 100px;
            background: #aaa;
        }
    </style>
</head>
<body>
<?php
require ('src/sql.php');

require 'partials/header.partial.php';

?>
<main class="container" style="margin-top:30px">

    <div class="col-sm-8">
        <h2>FORMULARI</h2>
        <br>
    </div>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="author_id">Author ID:</label>
            <input type="number" class="form-control" id="author_id" name="author_id" >
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" >
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" >
        </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Summary</label>
        <textarea class="form-control" id="summary" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" id="content" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Published_at</label>
        <input type="date" class="form-control" id="published_at">
    </div>
    <button type="submit" class="btn btn-primary">Insertar</button>
</form>
</main>
<?php
require 'partials/footer.partial.php';
?>
</body>
</html>

