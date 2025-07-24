<div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <div class="mt-4 mb-5"></div>
    <button
        type="button"
        class="btn btn-info mb-4"
        data-toggle="modal"
        data-target="#exampleModal">
        <i class="fas fa-plus"></i>
        Tambah Data
    </button>
        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#laporanModal">
        <i class="fas fa-plus"></i> Laporan
    </button>
    

    <div class="card">
    <div class="table-responsive text-nowrap p-3">
        <table class="table table-striped table-hover text-center">
            <!-- Header dengan background coklat tua dan font putih -->
            <thead style="background-color: #5D4037; ">
                <tr>
                    <th style="font-size: 17px; color: white;">No</th>
                    <th style="font-size: 17px; color: white;">No Nota</th>
                    <th style="font-size: 17px; color: white;">Nominal</th>
                    <th style="font-size: 17px; color: white;">Pelanggan</th>
                    <th style="font-size: 17px; color: white;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0; $no=1; foreach($user as $aa) { ?>
                <tr>
                    <td style="font-size: 17px;"><?= $no; ?></td>
                    <td style="font-size: 17px;"><?= $aa['kode_penjualan']?></td>
                    <td style="font-size: 17px;">Rp. <?= number_format($aa['total_harga'], 0, ',', '.'); ?></td>
                    <td style="font-size: 17px;"><?= $aa['nama']?></td>
                    <td>
                        <a href="<?php echo site_url('penjualan/invoice/'.$aa['kode_penjualan']); ?>" 
                           class="btn btn-success btn-sm">
                            <i class="fas fa-eye"></i> Cek
                        </a>
                    </td>
                </tr>
                <?php $total += $aa['total_harga']; $no++; } ?>

                <!-- Total Row dengan warna netral soft -->
                <tr style="background-color: #E0E0E0;">
                    <td style="font-size: 17px;" colspan="2"><strong>Total</strong></td>
                    <td style="font-size: 17px;"><strong>Rp. <?= number_format($total, 0, ',', '.'); ?></strong></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


</div>
</table>
</div>
    </div>
    <div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="laporanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('penjualan/laporan') ?>" method="get" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari</label>
                        <input type="date" class="form-control" name="tanggal1" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai</label>
                        <input type="date" class="form-control" name="tanggal2" required>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 17px;">No</th>

                            <th style="font-size: 17px;">Nama</th>
                            <th style="font-size: 17px;">Alamat</th>
                            <th style="font-size: 17px;">Telp</th>
                            <th style="font-size: 17px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no=1; foreach($pelanggan as $aa) {?>
                        <tr>
                            <td style="font-size: 17px;"><?= $no; ?></td>

                            <td style="font-size: 17px;"><?= $aa['nama']?></td>
                            <td style="font-size: 17px;"><?= $aa['alamat']?></td>
                            <td style="font-size: 17px;"><?= $aa['telp']?></td>

                            <td>
                                <a
                                    href="<?php echo site_url('penjualan/transaksi/'.$aa['id_pelanggan']); ?>"
                                    class="btn btn-success">Pilih</a>

                            </td>
                        </div>
                        <?php $no++; } ?>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penjualan hari ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelanggan/update')?>" method="post">
                    <input type="hidden" name="id_pelanggan" value="<?= $aa['id_pelanggan']?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nama"
                            name="nama"
                            value="<?= $aa['nama'] ?>"
                            placeholder="Masukkan Nama"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input
                            type="text"
                            class="form-control"
                            id="telp"
                            name="telp"
                            value="<?= $aa['telp'] ?>"
                            placeholder="Masukkan telp"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input
                            type="text"
                            class="form-control"
                            id="alamat"
                            name="alamat"
                            value="<?= $aa['alamat'] ?>"
                            placeholder="Masukkan alamat"
                            required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
</div>

