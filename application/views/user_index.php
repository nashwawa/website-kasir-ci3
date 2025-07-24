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
                <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#exampleModal">
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
                                        <th style="font-size: 17px;">Jenis Kelamin</th>
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
                                            <td style="font-size: 17px;"><?= $aa['jenis_kelamin'] ?></td>
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
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" class="form-control" id="level" required>
                                            <option value="" selected>Pilih Level</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
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



  
