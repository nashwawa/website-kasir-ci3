<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $judul_halaman; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/template/')?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/')?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/')?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/')?>assets/css/components.css">
  <!-- Bootstrap CSS -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <!-- Custom Styling for Pink Soft Theme -->
  <style>
  /* Soft Brown Colors */
  :root {
    --brown-light: #f9ece5; /* Backgrounds */
    --brown-medium: #d2b48c; /* Sidebar, Navbar */
    --brown-dark: #b8860b; /* Highlights */
    --text-color: #4d4d4d; /* Text */
  }

  .navbar-bg {
    background-color: var(--brown-medium) !important;
  }

  .main-navbar .nav-link {
    color: white !important;
  }

  .main-navbar .nav-link:hover {
    background-color: var(--brown-dark);
    border-radius: 20px;
  }

  .main-sidebar {
    background-color: var(--brown-light) !important;
  }

  .sidebar-menu li.active > a {
    background-color: var(--brown-medium) !important;
    color: white !important;
    border-radius: 5px;
  }

  .sidebar-menu li a:hover {
    color: var(--brown-dark) !important;
    border-radius: 20px;
  }

  .sidebar-brand a {
    color: var(--brown-dark) !important;
    border-radius: 20px;
    font-weight: bold;
  }

  .footer-left {
    background-color: var(--brown-medium);
    color: white;
  }

  .footer-left a {
    color: white !important;
  }

  .btn:hover {
    background-color: var(--brown-dark);
  }

  .search-element input {
    background-color: #f7ede5; /* Brown soft */
    color: #6c6a6a; /* Teks gelap agar mudah dibaca */
    border: 2px solid #e3d5c5; /* Border brown terang */
    padding: 10px 20px;
    border-radius: 20px;
    outline: none;
    font-size: 14px;
    width: 250px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .search-element input:focus {
    border-color: #b89470; /* Brown lebih kontras saat fokus */
    background-color: #fefaf5; /* Latar belakang lebih lembut */
    box-shadow: 0 0 8px rgba(186, 140, 94, 0.5); /* Efek bercahaya */
  }

  /* .search-element input::placeholder {
    color: #b89470; /* Placeholder brown lembut */
    opacity: 0.8;
    font-style: italic;
  } */

  .search-element .btn {
    background-color: #b8860b; /* Brown medium */
    color: white;
    border: none;
    border-radius: 50%;
    padding: 10px 14px;
      
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .search-element .btn:hover {
    background-color: #8b6914; /* Brown lebih gelap saat hover */
    box-shadow: 0 4px 10px rgba(139, 105, 20, 0.5);
    transform: scale(1.1); /* Sedikit membesar untuk efek interaktif */
  }

  .select2-container .select2-selection--single .select2-selection__rendered {
    font-size: 0.875rem; /* Ukuran font lebih kecil */
  }

  .select2-container .select2-selection--single .select2-selection__arrow {
    height: 38px; /* Sesuaikan tinggi panah dropdown */
  }

  .select2-container--default .select2-selection--single {
    height: 38px; /* Sesuaikan tinggi dropdown */
  }

  .select2-container--default .select2-selection--single .select2-selection__placeholder {
    font-size: 0.875rem; /* Ukuran font placeholder */
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px; /* Sesuaikan tinggi baris */
  }
</style>

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
            
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/template/')?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama');?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"><?= $this->session->userdata('level');?></div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Kasir iTaBooks</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KI</a>
          </div>
            <?php $halaman = $this->uri->segment(1); ?>
            <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li class="nav-item <?php if($halaman=='home'){echo"active";} ?>" >
                <a href="<?= base_url('home')?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item <?php if($halaman=='produk'){echo"active";} ?>" >
                <a href="<?= base_url('produk')?>" class="nav-link"><i class="fas fa-th-large"></i><span>Produk</span></a>
              </li>
             
              <li class="nav-item <?php if($halaman=='user'){echo"active";} ?>" >
                <a href="<?= base_url('user')?>" class="nav-link"><i class="far fa-user"></i><span>User</span></a>
              </li>
              <!-- <?php if ($this->session->userdata('level')=='admin'){?>
                <li class="nav-item <?php if($halaman=='produk'){echo"active";} ?>" >
                  <a href="<?= base_url('produk')?>" class="nav-link"><i class="fas fa-th-large"></i><span>Produk</span></a>
                </li>
                <li class="nav-item <?php if($halaman=='user'){echo"active";} ?>" >
                  <a href="<?= base_url('user')?>" class="nav-link"><i class="far fa-user"></i><span>User</span></a>
                </li>
              <?php } ?> -->
              <li class="nav-item <?php if($halaman=='pelanggan'){echo"active";} ?>" >
                <a href="<?= base_url('pelanggan')?>" class="nav-link"><i class="fas fa-th"></i><span>Pelanggan</span></a>
              </li>
              <li class="nav-item <?php if($halaman=='penjualan'){echo"active";} ?>" >
                <a href="<?= base_url('penjualan')?>" class="nav-link"><i class="fas fa-columns"></i><span>Penjualan</span></a>
              </li>
              <li class="nav-item <?php if($halaman=='tambah_suara'){echo"active";} ?>" >
                <a href="<?= base_url('tambah_suara')?>" class="nav-link"><i class="fas fa-th-large"></i><span>Tambah Suara</span></a>
              </li>
          
      </div>
      
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul_halaman; ?></h1>
          </div>
          <h2><?= $contents; ?></h2>
          <div class="section-body">
          </div>
        </section>
      </div>
     
      <footer class="main-footer">
        <div class="footer-right">
          
        </div>
      </footer>
     
    </div>
    
  </div>
 

  <!-- General JS Scripts -->
  <!-- jQuery (Load first to ensure dependency for other plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Base Template JS -->
<script src="<?= base_url('assets/template/')?>assets/modules/popper.js"></script>
<script src="<?= base_url('assets/template/')?>assets/modules/tooltip.js"></script>
<script src="<?= base_url('assets/template/')?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template/')?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/template/')?>assets/modules/moment.min.js"></script>
<script src="<?= base_url('assets/template/')?>assets/js/stisla.js"></script>
<script src="<?= base_url('assets/template/')?>assets/js/scripts.js"></script>
<script src="<?= base_url('assets/template/')?>assets/js/custom.js"></script>

<!-- Custom Scripts -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const deleteModal = document.getElementById('deleteModal');
      const confirmDelete = document.getElementById('confirmDelete');

      deleteModal.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget; // Tombol yang membuka modal
          const deleteUrl = button.getAttribute('data-delete-url'); // Ambil URL dari atribut tombol
          confirmDelete.setAttribute('href', deleteUrl); // Set URL ke tombol konfirmasi
      });
  });

  $('#ngilang').delay('slow').slideDown('slow').delay(100).slideUp(600);

  $(document).ready(function() {
      $(".js-example-templating").select2({
          placeholder: "Pilih Produk", // Placeholder untuk dropdown
          allowClear: true // Mengizinkan pengguna untuk menghapus pilihan
      });
  });
</script>

</body>
</html>

