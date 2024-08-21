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
    echo "<p>شما مجاز به ویرایش این بلاگ نیستید.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogs[$index] = [$_POST['title'], $_POST['body'], $_SESSION['fullName']];
    $file = fopen('blogs.csv', 'w');
    foreach ($blogs as $b) {
        fputcsv($file, $b);
    }
    fclose($file);
    header('Location: index.php');
    exit();
}
?>

<form method="POST" action="edit_blog.php?index=<?php echo $index; ?>">
    <label for="title">عنوان بلاگ:</label>
    <input type="text" name="title" value="<?php echo $blog[0]; ?>" required><br><br>
    <label for="body">متن بلاگ:</label>
    <textarea name="body" required><?php echo $blog[1]; ?></textarea><br><br>
    <button type="submit">بروزرسانی بلاگ</button>
</form>


