<!-- forgot_password_form.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Your Common Stylesheet -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/admin/css/style.css'); ?>" rel="stylesheet">
  <style>
    /* Custom styles specific to Registrasi.php can be added here */
    /* style.css atau tambahkan langsung di dalam tag <style> */
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

    .btn-register {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
      border-radius: 15px;
    }

    .btn-register:hover {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
    }

    /* Style untuk flash messages */
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
  <main>
    <div class="container">
      <section
        class="section forgot-password min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <?php if (isset($messages['success'])): ?>
                <div class="alert alert-success">
                  <strong>
                    <?= $messages['success'] ?>
                  </strong>
                </div>
              <?php endif; ?>

              <?php if (isset($messages['error'])): ?>
                <div class="alert alert-danger">
                  <strong>
                    <?= $messages['error'] ?>
                  </strong>
                </div>
              <?php endif; ?>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-5 pb-2 mt-4">
                    <h5 class="card-title text-center pb-0 fs-2 fw-semibold">Lupa Password</h5>
                    <p class="text-center small text-secondary">Masukkan alamat email Anda untuk reset password</p>
                  </div>
                  <form method="post" action="<?= base_url('lupa_password/proses_lupa_password'); ?>" class="row g-3">
                    <div class="col-12">
                      <input type="email" name="email" class="form-control" id="forgotEmail" placeholder="Email"
                        required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                      <button class="btn btn-login w-100 py-2" type="submit">Kirim Instruksi</button>
                    </div>
                  </form>
                  <p class="text-center small text-secondary">
                    Sudah ingat password? <a href="<?= base_url('login'); ?>">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- Script files (bootstrap, jQuery, etc.) -->
</body>

</html>