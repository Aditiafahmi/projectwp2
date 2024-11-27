<!-- application/views/edit_gallery_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>gallery - Marryme</title>

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
            <h1>Gallery</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('gallery'); ?>">Gallery</a></li>
                    <li class="breadcrumb-item active">Edit Gallery</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card gallery-card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Gallery</h5>
                            <div class="col-md-4">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="gallery_image">
                                <?= form_error('gallery_image'); ?>
                            </div>

                            <?= form_open(base_url('page/gallery/edit/' . $gallery_data->id)); ?>
                            <!-- Form fields -->
                            <div class="col-md-6">
                                <label class="form-label">Heading</label>
                                <input type="text" class="form-control" name="gallery_heading" required="required"
                                    autocomplete="off"
                                    value="<?= set_value('gallery_heading', $gallery_data->gallery_heading); ?>">
                                <?= form_error('gallery_heading'); ?>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="gallery_desc"
                                    rows="5"><?= set_value('gallery_desc', $gallery_data->gallery_desc); ?></textarea>
                                <?= form_error('gallery_desc'); ?>
                            </div>
                            <!-- End form fields -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
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

</html