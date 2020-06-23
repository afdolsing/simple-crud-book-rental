<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Rental Book</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Book Rental</h4>
            </div>
            <div class="card-body">
              <a href="create.php" class="btn btn-md btn-success" style="margin-bottom: 10px">ADD RENTAL</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">RENTAL DATE</th>
                    <th scope="col">DURATION</th>
                    <th scope="col">FINISH DATE</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      // hubungkan include ke file koneksi databse
                      include('connection.php');
                      // nomor urut yang ditampilkan ke layar
                      $no = 1;
                       // ambil data dari tabel rental di database book_rental
                      $query = mysqli_query($connection,"SELECT * FROM tbl_rental");
                      
                      while($row = mysqli_fetch_array($query)){

                        $finish_date = date('Y-m-d', strtotime($row['rental_date'] . "+ $row[duration] days"));
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['title'] ?></td>
                      <td><?php echo $row['customer'] ?></td>
                      <td><?php echo $row['rental_date']?></td>
                      <td><?php echo $row['duration']." days" ?></td>
                      <td><?php echo $finish_date ?></td>
                      <td class="text-center">
                        <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">DELETE</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>