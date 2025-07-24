<div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <div class="mt-4 mb-5"></div>
        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
        <button type="button" class="btn btn-info mb-4 pull-right" data-toggle="modal" data-target="#printModal">
            Print
        </button>
    
  
</div>

        <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th style="font-size: 17px;">No</th>
                        <th style="font-size: 17px;">Nama</th>
                        <th style="font-size: 17px;">Kode Produk</th>
                        <th style="font-size: 17px;">Stok</th>
                        <th style="font-size: 17px;">Harga Jual</th>
                        <th style="font-size: 17px;">Harga Beli</th>
                        <th style="font-size: 17px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($produk as $aa) { ?>
                    <tr>
                        <td style="font-size: 17px;"><?= htmlspecialchars($no); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['nama']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['kode_produk']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['stok']); ?></td>
                        <td style="font-size: 17px;">Rp. <?= number_format($aa['harga_jual'], 0, ',', '.'); ?></td>
                        <td style="font-size: 17px;">Rp. <?= number_format($aa['harga_beli'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="<?= site_url('produk/delete_data/' . $aa['id_produk']); ?>" class="btn btn-danger btn-lg mb-9">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                            <a href="<?= site_url('produk/edit/' . $aa['id_produk']); ?>" class="btn btn-warning btn-lg mb-9">
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
<!-- modal produk -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('produk/simpan') ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan kode produk" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan harga jual" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan harga beli" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- modal print -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laporan Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('produk/print') ?>" method="get" target="_blank">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select name="status" class="form-control">
                                <option value="ada">Ada</option>
                                <option value="Habis">Habis</option>
                                <option value="Semua">Semua</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Print</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
