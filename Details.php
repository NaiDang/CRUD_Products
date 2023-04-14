<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
    <style>
        .productDt{
            border: 1px solid;
        
            height: 700px;
        }
        .size a{
            display:flex;
            text-decoration: none;
            
        }
        .size div{
            border:1px solid;
            margin: 10px;
            width: 50px;
            text-align: center;
        }
        img{
            margin: 20px;
        }
    </style>
</head>
<body>
<?php
         $id=$_GET['id'];
         $servername = "localhost";
         $username = "root";
         $password = "";
         $databasename = "products";
         $conn = mysqli_connect($servername, $username, $password, $databasename);
         if (!$conn) {
             echo("Kết nối thất bại: " . mysqli_connect_error());
         }
     
         // Lấy dữ liệu từ bảng sanphamadmin
         $sql = "SELECT * FROM sanpham WHERE id=$id";
         $result = mysqli_query($conn, $sql);
     ?>
     
     <div class="container">
         <div class="productDt">
             <a href="showproduct.php"><ion-icon style="font-size: 50px;position: relative;left: 1060px;"name="close-circle-outline"></ion-icon></a>
             <?php
                 // Lặp qua các sản phẩm trả về
                 while($row = mysqli_fetch_assoc($result)) {
             ?>
             <div class="row">
                 <div class="col-sm-7">
                     <img src="<?php echo $row['anh'] ?>" style="width: 600px;height: 600px;">
                 </div>
     
                 <div class="col-sm-5">
                     <br>
                     <br>
                     <h1>Tên sản phẩm : <?php echo $row['ten'] ?></h1>
                     <b>Giá: </b><?php echo $row['gia'] ?> <br><br>
                     <b>Mô tả: </b><?php echo $row['mota'] ?><br>
                     <b>Kích cỡ</b> <br>
                     <div class="size">
                         <a href="">
                             <div>XS</div>
                             <div>S</div>
                             <div>M</div>
                             <div>L</div>
                             <div>XL</div>
                             <div>XXL</div>
                         </a>
                     </div> <br>
                     <b>Số lượng</b>
                     <input type="number" min="1" max="20">
                     <br><br><br>
                     <a href="xulythemgiohang.php"><ion-icon name="cart-outline" style="font-size: 80px"></ion-icon></a>
                 </div>
             </div>
             <?php } // Kết thúc vòng lặp ?>
         </div>
     </div>
     
     <?php
         // Đóng kết nối
         mysqli_close($conn);
     ?>
</body>
</html>