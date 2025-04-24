<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    // Tạo thư mục nếu chưa có
    if (!is_dir("images")) {
        mkdir("images");
    }

    move_uploaded_file($image_temp, "images/" . $image);

    $sql = "INSERT INTO products (name, price, discount, image) 
            VALUES ('$name', '$price', '$discount', '$image')";
    mysqli_query($conn, $sql);

    // Chuyển hướng sau khi thêm
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sản Phẩm</title>
    <style>
        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label, input, button {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }
        input[type="file"] {
            padding: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Thêm Sản Phẩm Mới</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label>
    <input type="text" name="name" required>

    <label>Giá:</label>
    <input type="number" name="price" required>

    <label>Giảm giá (%):</label>
    <input type="number" name="discount" required>

    <label>Ảnh sản phẩm:</label>
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Thêm sản phẩm</button>
</form>

</body>
</html>
