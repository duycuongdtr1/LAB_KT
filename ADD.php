<?php
require_once("entities/NhanVien.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_nv = $_POST["ma_nv"];
    $ten_nv = $_POST["ten_nv"];
    $phai = $_POST["phai"];
    $noi_sinh = $_POST["noi_sinh"];
    $ma_phong = $_POST["ma_phong"];
    $luong = $_POST["luong"];

    // Thêm hình ảnh cho giới tính
    $anh = ($phai == "Nữ") ? "woman.jpg" : "man.jpg";

    // Tạo đối tượng nhân viên
    $nv = new NhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong, $anh);

    // Lưu nhân viên vào CSDL
    $result = $nv->save();

    if ($result) {
        $message = "Thêm nhân viên thành công.";
    } else {
        $error = "Thêm nhân viên thất bại.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            color: green;
            margin-top: 10px;
            text-align: center;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm nhân viên</h2>
        <?php if (isset($message)) : ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="ma_nv">Mã NV:</label>
            <input type="text" id="ma_nv" name="ma_nv" required>
            <label for="ten_nv">Tên NV:</label>
            <input type="text" id="ten_nv" name="ten_nv" required>
            <label for="phai">Giới tính:</label>
            <select name="phai" id="phai">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            <label for="noi_sinh">Nơi sinh:</label>
            <input type="text" id="noi_sinh" name="noi_sinh" required>
            <label for="ma_phong">Mã phòng:</label>
            <input type="text" id="ma_phong" name="ma_phong" required>
            <label for="luong">Lương:</label>
            <input type="text" id="luong" name="luong" required>
<input type="submit" value="Thêm">
</form>
</div>
