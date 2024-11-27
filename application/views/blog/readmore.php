<!-- application/views/blog/readmore.php -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - WeddingCuy</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <style>
        <?php
        include "assetsblog/assets/css/style.css";
        ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- Font-Awesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


</head>

<body>
    <nav>
        <?php $this->load->view('templates/header'); ?>
    </nav>

    <section id="blog" class="blog">
        <div class="container-custom">
            <div class="heading-text mb-5">
                <h5> <?php echo $blog_post->blog_heading; ?></h5>
                
            </div>
            <div class="blog-banner text-center mb-4">
                <img src="<?php echo base_url('assets/img/blog/' . $blog_post->blog_image); ?>"
                    class="blog-image img-fluid" alt="">
            </div>
            <div class="blog-text">
                <?php echo $blog_post->blog_text; ?>
            </div>

        </div>
    </section>

    <?php $this->load->view('templates/footer'); ?>