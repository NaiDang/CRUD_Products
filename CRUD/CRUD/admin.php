<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>THÔNG TIN SẢN PHẨM
                        <a href="add.php" class="btn btn-primary float-end">Thêm sản phẩm</a>
                    </h4>
                </div>
                
                <div class="card-body">
                
                    <table class="table table-bordered table-striped">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $databasename = "products";
                        $conn = mysqli_connect($servername, $username, $password, $databasename);
                        if (!$conn) {
                            echo("Kết nối thất bại: " . mysqli_connect_error());
                        };
                        $sql = "SELECT * FROM sanpham";
                        $result = mysqli_query($conn, $sql);
                        ?>
                        <thead>
                            <th>ID Sản PHẨM</th>
                            <th>TÊN SP</th>
                            <th>MÔ TẢ</th>
                            <th>GIÁ</th>
                            <th>HÌNH ẢNH</th>
                            <th>HÀNH ĐỘNG</th>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['ten'] ?></td>
                                <td><?php echo $row['mota'] ?></td>
                                <td><?php echo $row['gia'] ?></td>
                                <td><img src="<?php echo $row['anh'] ?>" alt="" width=100px height=100px></td>
                                <td>
                                    <!-- Button XÓA -->
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>    

                                    <!-- Button SỬA -->
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>