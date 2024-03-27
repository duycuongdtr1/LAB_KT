<?php
require_once("entities/NhanVien.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_nv = $_POST["ma_nv"];

    $result = NhanVien::DELETE($ma_nv);

    if ($result) {
        echo "Xóa nhân viên thành công.";
    } else {
        echo "Xóa nhân viên thất bại.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Xóa nhân viên</title>
</head>
<body>
    <h2>Xóa nhân viên</h2>
    <form method="post" action="">
        Mã nhân viên: <input type="text" name="ma_nv"><br>
        <input type="submit" value="Xóa">
    </form>
</body>
</html>
