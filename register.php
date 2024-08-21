<?php require_once 'header.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'User.php';
    $user = new User($_POST['email'], $_POST['password'], $_POST['fullName']);
    $user->register();
    header('Location: login.php');
}
?>
<form method="POST" action="register.php">
    <label for="email">ایمیل:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">رمز عبور:</label>
    <input type="password" name="password" required><br><br>
    <label for="fullName">نام و نام خانوادگی:</label>
    <input type="text" name="fullName" required><br><br>
    <button type="submit">ثبت‌نام</button>
</form>

