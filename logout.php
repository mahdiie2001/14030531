<?php
require 'User.php';
User::logout();
header('Location: index.php');
?>