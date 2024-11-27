<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>testimonial - Marryme</title>

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
            <h1>Testimonial</h1>
            <!-- Navigasi dan peringatan PHP di sini sesuai kebutuhan -->
        </div>

        <div class=" mt-2">
            <!-- Tampilkan pesan jika ada -->
            <?php if (isset($_GET['pesan'])) { ?>
                <?php if ($_GET['pesan'] == "berhasil") { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        berhasil mengubah testimonial Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        gagal mengubah testimonial Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } elseif ($_GET['pesan'] == "hapus") { ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        berhasil menghapus Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <section class="section dashboard">
            <a href="<?= site_url('page/testimonial/add/'); ?>" class="btn btn-primary my-3">Tambah Data</a>
            <div class="row" data-masonry='{"percentPosition": true }'>
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="col-md-4">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <h5 class="card-title">Testimonial
                                            <?= $testimonial['id']; ?>
                                        </h5>
                                    </div>
                                    <div class="opsi py-3">
                                        <a href="<?= site_url('page/testimonial/edit/' . $testimonial['id']); ?>"
                                            class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="<?= site_url('page/testimonial/delete/' . $testimonial['id']); ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin akan menghapus data ini?')"><i
                                                class="bi bi-trash-fill"></i></a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="testimonial-image">
                                        <img src="<?= base_url('assets/img/testimonial/' . $testimonial['testi_image']); ?>"
                                            alt="" class="img-fluid rounded mb-3">
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?= $testimonial['testi_text']; ?>
                                        </h6>
                                        <p class="fw-light" style="font-size: 11px;">
                                            <?= $testimonial['testi_client']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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