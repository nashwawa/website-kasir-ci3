<form action="<?= base_url('user/update') ?>" method="post">
    <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg" style="border-radius: 12px;">
                    <div class="card-header bg-danger text-white" style="border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0">Edit</h5>
                    </div>
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="username" 
                                name="username" 
                                value="<?= $user->username; ?>" 
                                placeholder="Masukkan username" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nama" 
                                name="nama" 
                                value="<?= $user->nama; ?>" 
                                placeholder="Masukkan nama lengkap" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan password baru">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="alamat" 
                                name="alamat" 
                                value="<?= $user->alamat; ?>" 
                                placeholder="Masukkan alamat" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="no_telp" 
                                    name="no_telp" 
                                    value="<?= $user->no_telp; ?>" 
                                    placeholder="Masukkan nomor telepon" 
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                id="tanggal_lahir" 
                                name="tanggal_lahir" 
                                value="<?= $user->tanggal_lahir; ?>" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select 
                                name="level" 
                                class="form-control" 
                                id="level" 
                                required>
                                <option 
                                    value="Admin" 
                                    <?= $user->level == 'Admin' ? 'selected' : '' ?>>Admin
                                </option>
                                <option 
                                    value="Petugas" 
                                    <?= $user->level == 'Petugas' ? 'selected' : '' ?>>Petugas
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select 
                                name="jenis_kelamin" 
                                class="form-control" 
                                id="jenis_kelamin" 
                                required>
                                <option 
                                    value="laki-laki" 
                                    <?= $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki
                                </option>
                                <option 
                                    value="perempuan" 
                                    <?= $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-end" style="background-color: #f1f1f1; border-radius: 0 0 12px 12px;">
                        <a href="<?= site_url('user'); ?>" class="btn btn-danger">
                            <i class="fas fa-times"></i> Tutup
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
