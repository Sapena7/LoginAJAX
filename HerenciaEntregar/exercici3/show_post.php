<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require ('src/Post.php');
require ('src/Blog.php');
require ('src/objectes.php');

$id = $_GET['Id'];

echo $blog->findPost($id);


?>

</body>
</html>



