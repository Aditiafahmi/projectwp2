<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nikah Yukk! - MarryMe</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= base_url('assets/img/favicon/site.webmanifest'); ?>">

    <style>
        <?php
        include "assetsblog/assets/css/style.css";
        ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/owlcarousel/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href=" <?= base_url('vendor/owlcarousel/css/owl.theme.default.min.css'); ?>">

    <!-- Font-Awesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Head section - include your styles and meta tags -->
</head>

<body>
    <!-- Navigation section - include your navigation bar -->
    <?php $this->load->view('templates/header'); ?>

    <section id="blog" class="blog py-5">
        <div class="container">
            <div class="heading-text text-center mb-5">
                <p class="text-p">&#128221; Blog Post</p>
                <h4>Blog</h4>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($blog as $post): ?>
                    <div class="blog-item col-md-3 card">
                        <img src="assets/img/blog/<?php echo $post->blog_image; ?>" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $post->blog_heading; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo substr($post->blog_text, 0, 150); ?>...
                            </p>
                            <a href="<?php echo base_url('blog/readmore/' .  $post->id); ?>" class="second-btn">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </section>
    <?php $this->load->view('templates/footer'); ?>

    <!-- Footer section - include your footer content -->

    <!-- Include your JavaScript files as needed -->

</body>

</html>
