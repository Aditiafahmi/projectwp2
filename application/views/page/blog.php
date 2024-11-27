<!-- application/views/blog_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>blog - Marryme</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assetsadmin/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= base_url('assetsadmin/css/style.css') ?>">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />





</head>

<body>
    <?php $this->load->view('templatesadmin/header'); ?>
    <?php $this->load->view('templatesadmin/sidebar'); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Blog</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class=" mt-2">
            <?php if (isset($_GET['pesan'])) { ?>
                <?php if ($_GET['pesan'] == "berhasil") { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Successfully Changed blog Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to Change blog Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        File Extension Must Be PNG And JPG
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "size") { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        File Size Can't Be More Than 2 MB
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "hapus") { ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Successfully Deleting blog Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to Delete blog Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "tambah") { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Successfully Added blog Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <section class="section blog">
            <a href="<?= base_url('page/blogadmin/add/'); ?>" class="btn btn-primary my-3">Add Data</a>
            <div class="row">
                <?php foreach ($blog as $blog) { ?>
                    <div class="blog-item col-md-3 card">
                        <img src="<?= base_url('assets/img/blog/' . $blog->blog_image); ?>" class="card-img-top mb-3"
                            alt="Blog Image">
                        <div class="card-body">




                            <h5 class="card-title">
                                <?php echo $blog->blog_heading; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo substr($blog->blog_text, 0, 150); ?>...
                            </p>
                            <a href="<?= base_url('page/blogadmin/edit/' . $blog->id); ?>" class="btn btn-success btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="<?= base_url('page/blogadmin/delete/' . $blog->id); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this data?')"><i
                                    class="bi bi-trash-fill"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
<!-- Template Main JS File -->
<script src="<?= base_url('assetsadmin/js/main.js') ?>"></script>
<!-- Vendor JS Files -->
<script src="<?= base_url('assetsadmin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
    async></script>



</html>