<?php 
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "products";
$conn = mysqli_connect($servername, $username, $password, $databasename);
if (!$conn) {
    echo("Kết nối thất bại: " . mysqli_connect_error());
}

// Check if the delete button has been clicked
if(isset($_POST['delete'])){
    $id = $_POST['delete'];

    // Delete the row with the given ID
    $sql = "DELETE FROM sanpham WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redirect back to the admin page
    header('Location: admin.php');
    exit();
}
?>

