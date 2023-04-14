<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "products";
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if (!$conn) {
        echo("Kết nối thất bại: " . mysqli_connect_error());
    }   
    if(isset($_POST['submit'])){
        $nameSP=$mysqli->real_escape_string($_POST['ten']);
        $Gia=$mysqli->real_escape_string($_POST['gia']);
        $anh=$mysqli->real_escape_string($_POST['anh']);
        $mota=$mysqli->real_escape_string($_POST['mota']);
    };
    $sqlInsert="INSERT into sanpham (id,ten,mota,gia,anh) 
    VALUES('$nameSP','$mota','$Gia','$anh')";
 
    mysqli_query($mysqli,$sqlInsert);
    mysqli_close($mysqli);
    header('location:admin.php');
?>