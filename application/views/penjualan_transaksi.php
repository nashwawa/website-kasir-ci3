<div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Bagian Pemilihan Produk -->
        <div class="col-md-4 mt-3  ">
            <div class="card mb-4 shadow">
                <div class="card-header text-white text-center" style="background: #5D4037;">
                    <h5 class="mb-0">Pilih Produk yang Akan Dijual</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('penjualan/keranjang') ?>" method="post">
                        <div class="form-group">
                            <label class="font-weight-bold">Nota</label>
                            <input
                                type="text"
                                class="form-control bg-light border-0 text-center"
                                value="<?= htmlspecialchars($nota); ?>"
                                readonly="readonly">
                            <input
                                type="hidden"
                                name="id_pelanggan"
                                value="<?= htmlspecialchars($id_pelanggan); ?>">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pelanggan</label>
                            <input
                                type="text"
                                class="form-control bg-light border-0 text-center"
                                value="<?= htmlspecialchars($nama_pelanggan); ?>"
                                readonly="readonly">
                        </div>

                        <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">

                        <div class="form-group">
                            <label class="font-weight-bold">Produk</label>
                            <select
                                name="id_produk"
                                class="form-control js-example-templating"
                                required="required">
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach($produk as $aa) { ?>
                                <option value="<?= $aa['id_produk'] ?>">
                                    <?= $aa['nama'] ?>
                                    |
                                    <?= $aa['kode_produk'] ?>
                                    (Stok:
                                    <?= $aa['stok'] ?>)
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jumlah</label>
                            <input
                                type="number"
                                class="form-control"
                                name="jumlah"
                                placeholder="Jumlah yang dijual"
                                min="1"
                                required="required">
                        </div>

                        <button
                            type="submit"
                            class="btn btn-lg w-100 text-white shadow"
                            style="background: #107A59;">
                            <i class="fas fa-shopping-cart" style="font-size: 15px;">Tambah Keranjang</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-3  ml-auto">
            <div class="card shadow">
                <div class="card-header text-white" style="background: #5D4037;">
                    <h5 class="mb-0">Detail Penjualan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead style=" color: white;">
                                <tr class="text-center">
                                    <th style="font-size: 17px;">No</th>
                                    <th style="font-size: 17px;">Produk</th>
                                    <th style="font-size: 17px;">Jumlah</th>
                                    <th style="font-size: 17px;">Harga</th>
                                    <th style="font-size: 17px;">Total</th>
                                    <th style="font-size: 17px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; $no = 1; foreach ($keranjang as $aa) { ?>
                                <tr>
                                    <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($no); ?></td>
                                    <!-- <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($aa['kode_penjualan']); ?></td> -->
                                    <td style="font-size: 17px;"><?= htmlspecialchars($aa['nama']); ?></td>
                                    <td class="text-center" style="font-size: 17px;"><?= htmlspecialchars($aa['jumlah']); ?></td>
                                    <td class="text-right" style="font-size: 17px;">Rp.
                                        <?= number_format($aa['harga_jual'], 0, ',', '.'); ?></td>
                                    <td class="text-right" style="font-size: 17px;">Rp.
                                        <?= number_format($aa['jumlah'] * $aa['harga_jual'], 0, ',', '.'); ?></td>
                                    <td class="text-center">
                                        <a
                                            href="<?= site_url('penjualan/delete_data/' . $aa['id_keranjang']); ?>"
                                            class="btn btn-sm text-white"
                                            style="background:rgb(233, 79, 13);">
                                            <i class="fas fa-trash-alt"></i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    $total = $total+$aa['jumlah'] * $aa['harga_jual']; 
                                    $no++; 
                                } 
                                ?>
                                 

                                <tr class="font-weight-bold" style="background: #D7CCC8;">
                                    <td colspan="5" class="text-right" style="font-size: 17px;">Total Harga:</td>
                                    <td class="text-right" style="font-size: 17px;">Rp.
                                        <?= number_format($total, 0, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white text-center">
                <form action="<?= base_url('penjualan/bayar') ?>" method="post">
                    <input
                        type="hidden"
                        name="id_pelanggan"
                        value="<?= $id_pelanggan ?>">
                    <input
                        type="hidden"
                        name="kode_penjualan"
                        value="<?= !empty($kode_penjualan) ? htmlspecialchars($kode_penjualan) : htmlspecialchars($nota); ?>">
                    <input
                        type="hidden"
                        name="total_harga"
                        value="<?= htmlspecialchars($total); ?>">

                    <?php if (!empty($keranjang)) { ?>
                    <button
                        type="submit"
                        class="btn btn-lg w-100 text-white"
                        style="background:rgb(16, 122, 89);">
                        <i class="fas fa-credit-card" style="font-size: 15px;">
                            Bayar Sekarang</i>
                    </button>
                    <?php } ?>
                </form>
            </div>

        </div>
    </div>
</div>