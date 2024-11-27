<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - MarryMe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png" rel="icon'); ?>">
  <link href="<?= base_url('assets/img/apple-touch-icon.png" rel="apple-touch-icon'); ?>">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css" rel="stylesheet'); ?>">
  <style>
    /* Styling untuk navbar */
    header {
      background-color: #fff;
      /* Warna latar belakang */
      padding: 10px 0;
      /* Ruang padding di atas dan bawah */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      /* Efek bayangan */
    }

    .navbar-brand {
      font-size: 24px;
      /* Ukuran font untuk brand */
      font-weight: bold;
      /* Ketebalan font untuk brand */
      color: #333;
      /* Warna teks untuk brand */
    }

    .navbar-brand:hover {
      color: #555;
      /* Warna teks untuk brand saat dihover */
    }


    .card {
      background-color: #fff;
      color: #252525;
      border-radius: 30px;
    }

    .card .card-title {
      color: #252525;
      text-decoration: underline;
      text-decoration-color: rgba(254, 70, 174, 1);
    }

    .form-control {
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 2.3;
      color: #212529;
      background-color: rgba(0, 0, 0, 0.190);
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: .575rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    .btn-login {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
      border-radius: 15px;
    }

    .btn-login:hover {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
    }

    .flash-message {
      margin: 10px 0;
      padding: 15px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
    }

    .flash-success {
      background-color: #d4edda;
      color: #155724;
      border-color: #c3e6cb;
    }

    .flash-error {
      background-color: #f8d7da;
      color: #721c24;
      border-color: #f5c6cb;
    }
  </style>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">MarryMe</a>

      </div>
    </nav>
  </header>
  <main>
    <?php if (isset($reset_success) && $reset_success): ?>
      <div class="alert alert-success">
        <strong>Password Anda berhasil direset. Silakan login dengan password baru Anda.</strong>
      </div>
    <?php endif; ?>
    <?php if (isset($register_success) && $register_success): ?>
    <div class="alert alert-success">
        <strong>Pendaftaran Anda berhasil!</strong> Silakan login
    </div>
<?php endif; ?>

    
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div id="logout">
                <?php if (isset($_GET['signout'])) { ?>
                  <div class="alert alert-success">
                    <strong>Anda Berhasil Logout</strong>
                  </div>
                <?php } ?>

                <?php if (isset($messages['success'])): ?>
                <div class="alert alert-success">
                  <strong>
                    <?= $messages['success'] ?>
                  </strong>
                </div>
              <?php endif; ?>



                <div class="card mb-3">

                  <div class="card-body">

                    <div class="pt-5 pb-2 mt-4">
                      <h5 class="card-title text-center pb-0 fs-2 fw-semibold">Login</h5>
                      <p class="text-center small text-secondary">Masukan Akun anda</p>

                    </div>

                    <form method="post" action="<?= base_url('login/proses_login'); ?>" class="row g-3">

                      <div class="col-12">
                        <input type="text" name="user_username" class="form-control" autofocus id="yourUsername"
                          placeholder="Username" required="required" autocomplete="off">
                      </div>

                      <div class="col-12 mb-3">
                        <input type="password" name="user_password" class="form-control" id="yourPassword"
                          placeholder="Password" required="required" autocomplete="off">
                      </div>
                      <p class="text-center small text-secondary">
                        <a href="<?= base_url('lupa_password'); ?>">Lupa Password?</a>
                      </p>
                      <!-- Di dalam blok HTML formulir login -->
                      <p class="text-center small text-secondary">
                        Belum punya akun? <a href="<?= base_url('Register'); ?>">Daftar</a>
                      </p>


                      <div class="col-12">
                        <button class="btn btn-login w-100 py-2" type="submit">Login</button>
                      </div>
                    </form>
                    <?php
                    if (isset($_GET['error'])) {
                      $errorMessage = $_GET['message'];
                      echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                    }
                    ?>
                  </div>
                </div>

              </div>
            </div>
          </div>


      </section>

    </div>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- <script src=" ('assets/vendor/quill/quill.min.js') ?>"></script>
<script src="l('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script> -->

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>
  <script>
    // Fungsi untuk menghilangkan flash message setelah beberapa detik
    $(document).ready(function () {
      setTimeout(function () {
        $('.flash-message').fadeOut('slow');
      }, 5000); // Waktu dalam milidetik (5000 milidetik = 5 detik)
    });
  </script>


  <!-- your remaining HTML content -->
</body>

</html>