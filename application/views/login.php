<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login &mdash; Kasir</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/template')?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template')?>/assets/modules/fontawesome/css/all.min.css">

  <!-- Additional CSS -->
  <style>
    body {
      background: url('<?= base_url('assets/template/assets/img/buku.jpg')?>') no-repeat center center fixed; /* Ganti 'path-to-your-image.jpg' dengan path gambar Anda */
      background-size: cover; /* Agar gambar menutupi seluruh area background */
      background-color: #f4e1d2; /* Warna fallback jika gambar gagal dimuat */
      color: #4d2e1b; /* Warna teks coklat soft */
      font-family: 'Roboto', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .login-brand img {
      border: 3px solid #f4e1d2; /* Border dengan warna coklat soft */
      padding: 10px;
      background: #fff;
      border-radius: 50%;
      width: 80px;
      height: 80px;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 2.0);
      overflow: hidden;
      background: #fff;
      color: #a57c65; /* Warna teks coklat soft */
      width: 400%;
      max-width: 350px;
      border-radius: 15px;

    }
    .card-header {
      background-color: #d2b48c; /* Warna coklat soft */
      color: #fff;
      text-align: center;
      padding: 20px;
      font-size: 1.5rem;
      font-weight: bold;
    }
    .btn-primary {
      background-color: #a57c65; /* Warna coklat soft */
      border: none;
      transition: background-color 0.3s;
      color: #fff;
    }
    .btn-primary:hover {
      background-color: #d2b48c; /* Warna coklat lebih terang saat hover */
    }
    .form-control {
      background: #f4e1d2; /* Warna coklat soft */
      color: #a57c65;
      border: 1px solid #a57c65;
      border-radius: 5px;
      padding: 10px;
    }
    .form-control:focus {
      box-shadow: 0 0 10px rgba(213, 180, 140, 0.8); /* Efek fokus dengan warna coklat terang */
      border-color: #d2b48c;
    }
    .custom-control-label {
      color: #a57c65; /* Warna teks coklat soft */
    }
    .text-muted {
      color: #a57c65 !important;
    }
    .simple-footer {
      color: #a57c65;
    }
    .container {
      max-width: 450px;
      padding: 0 15px;
    }
    label {
      font-weight: bold;
      color: #a57c65;
    }
  </style>
</head>
<body>
  <div id="app">
    <div class="container">
      <div class="card">
        <div class="card-header">
          Welcome Back!
        </div>

        <div class="card-body">
          <form method="POST" action="<?=base_url('auth/login')?>">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" class="form-control" name="username" required autofocus>
              <div class="invalid-feedback">
                Please fill in your username
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control" name="password" required>
              <div class="invalid-feedback">
                Please fill in your password
              </div>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Sign in
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="mt-3 text-muted text-center">
        Don’t have an account? <a href="auth-register.html" class="text-light">Create One</a>
      </div>
      <div class="simple-footer text-center mt-3">
        Kasir &copy; iTabooks
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('assets/template')?>/assets/modules/jquery.min.js"></script>
  <script src="<?= base_url('assets/template')?>/assets/modules/popper.js"></script>
  <script src="<?= base_url('assets/template')?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/template')?>/assets/js/stisla.js"></script>
</body>
</html>
