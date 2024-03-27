<link rel="stylesheet" href="site.css">

<?php
session_start();

$accounts = [
    "admin" => "123",
    "user" => "123"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (array_key_exists($username, $accounts) && $accounts[$username] === $password) {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = ($username === "admin") ? "admin" : "user";
        
        if ($_SESSION["role"] === "admin") {
            header("Location: ADD.php");
        } else {
            header("Location: xem.php");
        }
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
