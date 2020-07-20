<?php
    // akses ke koneksi database
    require_once 'connection.php';

    // ambil id dari index yang akan dihapus
    $id = $_GET['id'];
    
    // hapus data berdasarkan id
    mysqli_query($connection, "DELETE FROM tbl_rental WHERE id = '$id'");

    // Redirect atau kembali ke index
    header('location: index.php');

?>