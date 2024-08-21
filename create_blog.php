<?php
require_once 'header.php';

// بررسی لاگین بودن کاربر
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'Blog.php';
    $blog = new Blog($_POST['title'], $_POST['body'], $_SESSION['fullName']);
    $blog->save();
    header('Location: index.php');
    exit();
}
?>

<form method="POST" action="create_blog.php">
    <label for="title">عنوان بلاگ:</label>
    <input type="text" name="title" required><br><br>
    <label for="body">متن بلاگ:</label>
    <textarea name="body" required></textarea><br><br>
    <button type="submit">ثبت بلاگ</button>
</form>


