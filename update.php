<?php
    // panggil connection.php
    require_once 'connection.php';

    // ambil data berdasarkan id dari index
    $id = $_GET['id'];

    $result = mysqli_query($connection, "SELECT * FROM tbl_rental WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    if(isset($_POST['save'])){
        $title = htmlspecialchars( $_POST['title']);
        $customer = htmlspecialchars( $_POST['customer']);
        $duration = htmlspecialchars( $_POST['duration']);
        
        // update database
        mysqli_query($connection, "UPDATE tbl_rental SET title = '$title',
                                                    customer = '$customer',
                                                    duration = '$duration'
                                                    WHERE id = '$id'");
    
        // redirect kembali ke index
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Form</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT FORM
            </div>
            <div class="card-body">
              <form method="POST">
                
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" value="<?php echo $row['title'] ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label>Customer</label>
                  <input type="text" name="customer" value="<?php echo $row['customer'] ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label>Duration</label>
                  <input type="text" name="duration" value="<?php echo $row['duration'] ?>" class="form-control">
                </div>
                
                <button type="submit" name="save" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>