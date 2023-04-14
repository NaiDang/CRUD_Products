<?php
$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $counter = 0;
    echo "<div class='row'>";
    while($row = mysqli_fetch_assoc($result)) {
        // ...
        $counter++;
    }
    echo "</div>";
} else {
    echo "Không có sản phẩm nào.";
}
?>