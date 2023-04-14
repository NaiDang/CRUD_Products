<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Form thêm sản phẩm -->
    <form action="add.php" method="post">
        <h2>Thêm sản phẩm</h2>
        <label for="ten">Tên sản phẩm:</label>
        <input type="text" id="ten" name="ten" required>
        <label for="anh">Link ảnh:</label>
        <input type="text" id="anh" name="anh" required>
        <label for="gia">Giá:</label>
        <input type="text" id="gia" name="gia" required>
        <label for="mota">Mô tả:</label>
        <textarea id="mota" name="mota" required></textarea>
        <input type="submit" name="submit" value="Thêm">
    </form> 

    <?php
    if(isset($_POST['submit'])) {
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $anh = $_POST['anh'];

        $servername = "localhost";
            $username = "root";
            $password = "";
            $databasename = "products";
            $conn = mysqli_connect($servername, $username, $password, $databasename);
            if (!$conn) {
                echo("Kết nối thất bại: " . mysqli_connect_error());
            }
        $sql = "INSERT INTO sanpham (ten, gia, mota, anh) VALUES ('$ten', '$gia', '$mota', '$anh')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Thêm sản phẩm thành công";
        } else {
            echo "Thêm sản phẩm thất bại";
        }
    }
    ?>

    <!-- Hiển thị sản phẩm đã thêm -->
    <h2>Sản phẩm đã thêm</h2>
    <table>
        <thead>
            <tr>
                <th>ID Sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databasename = "products";
            $conn = mysqli_connect($servername, $username, $password, $databasename);
            if (!$conn) {
                echo("Kết nối thất bại: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM sanpham ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['ten'] ?></td>
                    <td><?php echo $row['gia'] ?></td>
                    <td><?php echo $row['mota'] ?></td>
                    <td><img src="<?php echo $row['anh'] ?>" alt="<?php echo $row['ten'] ?>" width="100px" height="100px"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

