<?php
    include "./config/config.php";
    include "./libraries/Database.php";
    include "./helpers/format_helper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Welcome to PHP Lovers Blog</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Home</a>
            <a class="blog-nav-item active" href="posts.php">All Posts</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <div class="logo">
            <img src="images/images.jpg" class="img-responsive" style="height: 129px">
        </div>
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">PHP News, tutorials, videos & more</p>
    </div>

    <div class="row">
