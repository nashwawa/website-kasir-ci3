<form action="<?= base_url('pelanggan/update') ?>" method="post">
    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan; ?>">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg" style="border-radius: 12px;">
                    <div class="card-header bg-danger text-white" style="border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0">Edit </h5>
                    </div>
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nama" 
                                name="nama" 
                                value="<?= $pelanggan->nama; ?>" 
                                placeholder="Masukkan nama pelanggan" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="alamat" 
                                name="alamat" 
                                value="<?= $pelanggan->alamat; ?>" 
                                placeholder="Masukkan alamat pelanggan" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="telp" 
                                name="telp" 
                                value="<?= $pelanggan->telp; ?>" 
                                placeholder="Masukkan nomor telepon pelanggan" 
                                required>
                        </div>
                    </div>
                    <div class="card-footer text-end" style="background-color: #f1f1f1; border-radius: 0 0 12px 12px;">
                        <a href="<?= site_url('pelanggan'); ?>" class="btn btn-danger">
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
