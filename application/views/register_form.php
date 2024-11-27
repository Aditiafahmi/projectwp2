<!-- Your registration form HTML goes here -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registrasi - WeddingCuy</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('login'); ?>">MarryMe</a>

      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <!-- register_form.php -->

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
              <!-- Tambahkan formulir pendaftaran di sini -->


              <!-- Tampilkan formulir pendaftaran di sini -->
              <!-- ... -->

              <!-- Formulir Registrasi -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-5 pb-2 mt-4">
                    <h5 class="card-title text-center pb-0 fs-2 fw-semibold">Registrasi</h5>
                    <p class="text-center small text-secondary">Buat akun baru</p>
                  </div>
                  <!-- Di dalam formulir registrasi -->
                  <form method="post" action="<?= base_url('register/process_registration'); ?>" class="row g-3">
                    <div class="col-12">
                      <input type="text" name="new_user_username" class="form-control" id="newUsername"
                        placeholder="Username Baru" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                      <input type="email" name="new_user_email" class="form-control" id="newEmail" placeholder="Email"
                        required="required" autocomplete="off">
                    </div>
                    <div class="col-12 mb-3">
                      <input type="password" name="new_user_password" class="form-control" id="newPassword"
                        placeholder="Password Baru" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                      <button class="btn btn-register w-100 py-2" type="submit">Registrasi</button>
                    </div>
                  </form>

                </div>
              </div>
              <!-- Akhir Formulir Registrasi -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- Script files (bootstrap, jQuery, etc.) -->
</body>


</html>

<!-- Sisanya sama seperti sebelumnya -->