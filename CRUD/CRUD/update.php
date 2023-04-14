<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
 
  <div class="container mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Chỉnh sửa sản phẩm
                    <a href="admin.php" class="btn btn-danger float-end">Quay lại</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                    $id = $_GET['id'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $databasename = "products";

                    // Tạo kết nối đến cơ sở dữ liệu
                    $conn = new mysqli($servername, $username, $password, $databasename);
                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }

                    // Lấy thông tin sản phẩm cần chỉnh sửa từ cơ sở dữ liệu
                    $sql = "SELECT * FROM sanpham WHERE id='$id'";
                    $result = $conn->query($sql);
                    if (!$result) {
                        echo "Lỗi: " . $conn->error;
                    } else {
                        $row = $result->fetch_assoc();
                ?>
                <!-- Hiển thị form chỉnh sửa thông tin sản phẩm -->
                <form action="Ud.php" method="post">
                    <div class="mb-3">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="ten" value="<?php echo $row['ten']?>">
                    </div>
                    <div class="mb-3">
                        <label>Giá sản phẩm</label>
                        <input type="text" class="form-control" name="gia" value="<?php echo $row['gia']?>">
                    </div>
                    <div class="mb-3">
                        <label>Hình ảnh sản phẩm</label>
                        <input type="text" class="form-control" name="anh" value="<?php echo $row['anh']?>">
                    </div>
                    <div class="mb-3">
                        <label>Mô tả sản phẩm</label>
                        <input type="text" class="form-control" name="mota" value="<?php echo $row['mota']?>">
                    </div>
                    <div class="mb-3">
                        <button name="submit" class="btn btn-primary" type="submit">Lưu</button>
                    </div>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>