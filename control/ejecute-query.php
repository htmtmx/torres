<?php
    include('./db.php');

    mysqli_set_charset($conn,"utf8");
    $result = mysqli_query($conn,$query);
    if (!$result) {
        die('Fallo al ejecutar '. mysqli_error($conn));
    }
?>