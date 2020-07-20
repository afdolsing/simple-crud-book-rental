<?php
    // deklarasi variabel
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "db_book";

    // Koneksikan variabel ke database dengan mysqli atau PDO
    $connection = mysqli_connect($server, $user, $password, $database) OR DIE ("Failed Connection");
?>