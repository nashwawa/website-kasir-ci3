<form action="<?= base_url('produk/update') ?>" method="post">
    <input type="hidden" name="id_produk" value="<?= $produk->id_produk; ?>">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg" style="border-radius: 12px;">
                    <div class="card-header bg-danger text-white" style="border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0">Edit</h5>
                    </div>
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nama" 
                                name="nama" 
                                value="<?= $produk->nama; ?>" 
                                placeholder="Masukkan nama produk" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="kode_produk" 
                                name="kode_produk" 
                                placeholder="Masukkan kode produk" 
                                value="<?= $produk->kode_produk ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="stok" 
                                name="stok" 
                                value="<?= $produk->stok; ?>" 
                                placeholder="Masukkan jumlah stok" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="harga_jual" 
                                    name="harga_jual" 
                                    value="<?= $produk->harga_jual; ?>" 
                                    placeholder="Masukkan harga jual" 
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="harga_beli" 
                                    name="harga_beli" 
                                    value="<?= $produk->harga_beli; ?>" 
                                    placeholder="Masukkan harga beli" 
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end" style="background-color: #f1f1f1; border-radius: 0 0 12px 12px;">
                        <a href="<?= site_url('produk'); ?>" class="btn btn-danger">
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
