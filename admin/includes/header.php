<?php
include "../config/config.php";
include "../libraries/Database.php";
include "../helpers/format_helper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Areea </title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Dshboard</a>
            <a class="blog-nav-item active" href="add_post.php">Add Post</a>
            <a class="blog-nav-item active" href="add_category.php">Add Category</a>
            <a class="blog-nav-item pull-right" href="../index.php">Visit Blog</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h2>Admin Area</h2>
    </div>

    <div class="row">
        <div class="col-sm-12 blog-main"></div>
        <?php if (isset($_GET['msg'])) { ?>
            <div class="alert alert-success">
                <?= htmlentities($_GET['msg']); ?>
            </div>


        <?php } ?>
