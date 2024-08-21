<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>وبلاگ</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">صفحه اصلی</a>
        <?php if (isset($_SESSION['email'])): ?>
            <span>خوش آمدید، <?php echo $_SESSION['fullName']; ?></span>
            <a href="create_blog.php">ایجاد بلاگ</a>
            <a href="logout.php">خروج</a>
        <?php else: ?>
            <a href="login.php">ورود</a>
            <a href="register.php">ثبت‌نام</a>
        <?php endif; ?>
    </nav>
</header>
