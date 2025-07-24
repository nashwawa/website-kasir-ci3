<div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <div class="mt-4 mb-5">
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalCenter">
            Tambah User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-mb" role="document">
                <form
                    action="<?= base_url('user/simpan')?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambah user</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3 ">
                                    <label class="form-label">Username</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Masukkan username"
                                            name="username"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 ">
                                    <label class="form-label">Nama</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Masukkan nama"
                                            name="nama"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 ">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Masukkan password"
                                            name="password"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Level</label>
                                    <select name="level" class="from-control" style="font-size: 17px;">
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-7">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data user</h6>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th style="font-size: 17px;">No</th>
                        <th style="font-size: 17px;">Username</th>
                        <th style="font-size: 17px;">Nama</th>
                        <th style="font-size: 17px;">level</th>
                        <th style="font-size: 17px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no=1; foreach($user as $aa) {?>
                    <tr>
                        <td style="font-size: 17px;"><?= $no; ?></td>
                        <td style="font-size: 17px;"><?= $aa['username']?></td>
                        <td style="font-size: 17px;"><?= $aa['nama']?></td>
                        <td style="font-size: 17px;"><?= $aa['level']?></td>

                        <td>

                            <!-- <a href="<?php echo site_url('user/edit'.$aa['id_user']); ?>" class="btn
                            btn-sm btn-danger"><span class="tf-icons bx bx-trash"></span></a> <button
                            type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#modalCenter"> <span class="tf-icons bx bx-edit"></span>
                            </button> -->
                            <a
                                href="<?php echo site_url('user/delete_data/'.$aa['id_user']); ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confire('Apakah anda yakin ingin menghapus data ini?')">Hapus<span class="tf-icons bx bx-trash-alt"></span></a >
                            <button
                                type="button"
                                class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#edit<?= $aa['id_user']?>">
                                <span class="tf-icons bx bx-edit">Edit</span>
                            </button>
                            <a
                                href="<?php echo site_url('user/reset/'.$aa['id_user']); ?>"
                                class="btn btn-sm btn-success"
                                onclick="return confire('Apakah anda yakin ingin menghapus data ini?')">Reset<span class="tf-icons bx bx-trash-alt"></span></a >

                            <div
                                class="modal fade"
                                id="edit<?= $aa['id_user']?>"
                                tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-mb" role="document">
                                    <form action="<?= base_url('user/update')?>" method="post">
                                        <input type="hidden" name="id_user" value="<?= $aa['id_user']?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Tambah user</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label class="form-label">Username</label>
                                                        <div class="input-group input-group-outline mb-3">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                value="<?= $aa['username']?>"
                                                                name="username"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label class="form-label">Nama</label>
                                                        <div class="input-group input-group-outline mb-3">
                                                            <input type="text" class="form-control" value="<?= $aa['nama']?>" name="nama">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label class="form-label">Level</label>
                                                    <select name="level" class="from-control" style="font-size: 17px;">
                                                        <option value="admin" <?php if($aa['level']=='admin') { echo "selected"; } ?>>Admin</option>
                                                      <option value="petugas" <?php if($aa['level']=='petugas') { echo "selected"; } ?>>Petugas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-size: 17px;">No</th>
                                        <th style="font-size: 17px;">Username</th>
                                        <th style="font-size: 17px;">Nama</th>
                                        <th style="font-size: 17px;">Alamat</th>
                                        <th style="font-size: 17px;">No Telp</th>
                                        <th style="font-size: 17px;">Tanggal Lahir</th>
                                        <th style="font-size: 17px;">Level</th>
                                        <th style="font-size: 17px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($user as $aa) { ?>
                                        <tr>
                                            <td style="font-size: 17px;"><?= $no; ?></td>
                                            <td style="font-size: 17px;"><?= $aa['username'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['nama'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['alamat'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['no_telp'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['tanggal_lahir'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['level'] ?></td>
                                            <td>
                                                <a href="<?= site_url('user/delete_data/' . $aa['id_user']); ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                                <a href="<?= site_url('user/reset/' . $aa['id_user']); ?>" class="btn btn-success">
                                                    <i class="fas fa-sync"></i> Reset
                                                </a>
                                                <a href="<?= site_url('user/edit/' . $aa['id_user']); ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
    <section class="section">
        <!-- <div class="section-header">
            <h1>Manajemen Pengguna</h1>
        </div> -->

        <div class="section-body">

                <!-- Button Tambah Data -->
                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>

                <!-- Card Tabel -->
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                            <table class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="font-size: 17px;">No</th>
                                        <th style="font-size: 17px;">Username</th>
                                        <th style="font-size: 17px;">Nama</th>
                                        <th style="font-size: 17px;">Alamat</th>
                                        <th style="font-size: 17px;">No Telp</th>
                                        <th style="font-size: 17px;">Tanggal Lahir</th>
                                        <th style="font-size: 17px;">Level</th>
                                        <th style="font-size: 17px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($user as $aa) { ?>
                                        <tr>
                                            <td style="font-size: 17px;"><?= $no; ?></td>
                                            <td style="font-size: 17px;"><?= $aa['username'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['nama'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['alamat'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['no_telp'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['tanggal_lahir'] ?></td>
                                            <td style="font-size: 17px;"><?= $aa['level'] ?></td>
                                            <td>
                                                <a href="<?= site_url('user/delete_data/' . $aa['id_user']); ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                                <a href="<?= site_url('user/reset/' . $aa['id_user']); ?>" class="btn btn-success">
                                                    <i class="fas fa-sync"></i> Reset
                                                </a>
                                                <a href="<?= site_url('user/edit/' . $aa['id_user']); ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Data -->

            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('user/simpan') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" class="form-control" id="level" required>
                                            <option value="" selected>Pilih Level</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>


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
  
