<?php
require_once 'header.php';

// بررسی لاگین بودن کاربر
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require 'Blog.php';

$index = $_GET['index'];
$blogs = Blog::getAll();
$blog = $blogs[$index];

// بررسی اینکه نویسنده پست همان کاربر لاگین شده است
if ($_SESSION['fullName'] !== $blog[2]) {
    echo "<p>شما مجاز به حذف این بلاگ نیستید.</p>";
    exit();
}

unset($blogs[$index]);

// بازنویسی فایل CSV با حذف پست
$file = fopen('blogs.csv', 'w');
foreach ($blogs as $b) {
    fputcsv($file, $b);
}
fclose($file);

header('Location: index.php');
exit();
?>
