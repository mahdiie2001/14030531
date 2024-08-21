<?php require_once 'header.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'User.php';
    if (User::login($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
    } else {
        echo "<p>ایمیل یا رمز عبور اشتباه است.</p>";
    }
}
?>
<form method="POST" action="login.php">
    <label for="email">ایمیل:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">رمز عبور:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">ورود</button>
</form>

