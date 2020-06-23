<?php
    // include ke koneksi database
    include_once('connection.php');

    // ambil id yang akan dihapus
    $id = $_GET['id'];
    
    // delete data berdasarkan id
    mysqli_query($connection, "DELETE FROM tbl_rental WHERE id = '$id'");

    // Redirect atau kembali ke index
    header('location: index.php');

?>