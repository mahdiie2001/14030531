<?php require_once 'header.php'; ?>
<?php
require 'Blog.php';
$blogs = Blog::getAll();

if (empty($blogs)) {
    echo "<p>هیچ بلاگی موجود نیست.</p>";
} else {
    foreach ($blogs as $index => $blog) {
        echo "<h2>{$blog[0]}</h2>";
        echo "<p>{$blog[1]}</p>";
        echo "<small>نویسنده: {$blog[2]}</small><br>";

        // اگر کاربر لاگین کرده باشد و نویسنده پست باشد، لینک‌های ویرایش و حذف نمایش داده می‌شوند
        if (isset($_SESSION['email']) && $_SESSION['fullName'] === $blog[2]) {
            echo "<a href='edit_blog.php?index=$index'>ویرایش</a> | ";
            echo "<a href='delete_blog.php?index=$index' onclick='return confirm(\"آیا مطمئن هستید؟\")'>حذف</a>";
        }

        echo "<hr>";
    }
}
?>
