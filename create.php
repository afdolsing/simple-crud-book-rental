<?php

    // panggil connection.php
    include_once('connection.php');

    if(isset($_POST['save'])){
        // ambil data dari create-form
        $title = htmlspecialchars($_POST['title']);  // gunakan htmlspecialchar untuk keamanan
        $customer = htmlspecialchars ($_POST['customer']);
        $duration = htmlspecialchars( $_POST['duration']);

        // date -> built-in function untuk mencatat tanggal sekarang
        $rental_date = date('Y-m-d');
        
        // insert data ke dalam database 
        mysqli_query($connection, "INSERT INTO tbl_rental (title, customer, duration, rental_date) 
                                          VALUE ('$title', '$customer', '$duration', '$rental_date')");
        // redirect atau kembali ke index
        header('location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Rental Form</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              Add Rental
            </div>
            <div class="card-body">
              <form method="POST">
                
                <div class="form-group">
                  <label>Book Tittle</label>
                  <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Customer</label>
                  <input type="text" name="customer" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Duration (days)</label>
                  <input type="text" name="duration" class="form-control" required>
                </div>
                
                <button type="submit" name=save class="btn btn-success">Rent a Book Now</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>