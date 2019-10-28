<?php
$post = new Post(1, "titulo por definir", "contingut 1", new DateTime('2013-01-29'), "Jaume Sapena");
$post2 = new Post(2, "titulo por definir 2", "contingut 2",new DateTime('2013-01-29'), "Amancio");
$post3 = new Post(3, "titulo por definir 3", "contingut 3", new DateTime('2013-01-29'), "Amancio");

$blog = new Blog(
    [$post, $post2, $post3]
);