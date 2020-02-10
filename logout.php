<?php
session_start();
session_destroy();
echo 'Ha terminado la session';
?>
<script">
location.href = "https://www.w3schools.com";
</script>