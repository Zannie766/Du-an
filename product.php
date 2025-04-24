<?php
include("connect.php");

$result = mysqli_query($conn, "SELECT * FROM products");

while($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product-item'>";
    echo "<div class='discount'>-" . htmlspecialchars($row['discount']) . "%</div>";
    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
    echo "<div class='product-name'>" . htmlspecialchars($row['name']) . "</div>";
    echo "<div class='price'>$" . htmlspecialchars($row['price']) . "</div>";
    echo "<a href='#' class='fas fa-heart'></a>";
    echo "<a href='#' class='cart-btn'>Add To Cart</a>";
    echo "<a href='#' class='fas fa-share'></a>";
    echo "</div>";
}
?>
