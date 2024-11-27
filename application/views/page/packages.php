<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>packages - Marryme</title>

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
            <h1>Packages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Packages</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class=" mt-2">
            <!-- Tampilkan pesan jika ada -->
            <?php if (isset($_GET['pesan'])) { ?>
                <?php if ($_GET['pesan'] == "berhasil") { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        berhasil mengubah Packages Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        gagal mengubah Packages Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } elseif ($_GET['pesan'] == "hapus") { ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        berhasil menghapus packages Data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <section class="section packages">
            <a href="<?= base_url('page/packages/add'); ?>" class="btn btn-primary my-3">Add Data</a>
            <div class="row">
                <?php foreach ($packages as $row): ?>
                    <div class="package-item col-md-3">
                        <!-- Tampilkan data paket sesuai kebutuhan -->
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <h5 class="card-title">Package
                                    <?php echo $row['id']; ?>
                                </h5>
                                <br>
                            </div>
                            <div class="opsi py-3">
                                <a href="<?= base_url('page/packages/edit/' . $row['id']); ?>"
                                    class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url('page/packages/delete/' . $row['id']); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this data?')"><i
                                        class="bi bi-trash-fill"></i></a>
                            </div>
                        </div>
                        <div class="head-package text-center">
                            <h4 class="text-uppercase mb-1">
                                <?php echo $row['packages_heading']; ?>
                            </h4>
                            <p class="price fs-2 fw-semibold">
                                <?php echo $row['packages_price']; ?>
                            </p>
                            <br>
                        </div>
                        <div class="body-package">
                            <?php echo $row['packages_list']; ?>
                            <div class="text-center">
                                <a href="" class="second-btn">See Detail Package</a>
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

<script>
    tinymce.init({
        selector: '#editor1',
        menubar: false,
        statusbar: false,
        plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
        toolbar: 'h1 h2 h3 h4 bold italic strikethrough blockquote bullist numlist | link image | removeformat fullscreen ',
        skin: 'bootstrap',
        toolbar_drawer: 'floating',
        min_height: 400,
        autoresize_bottom_margin: 16,

    });
</script>

</html>