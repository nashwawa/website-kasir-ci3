<div class="container-fluid py-4" id="ngilang">
    <div style="width:95%; margin-left:2rem;">
        <?= $this->session->flashdata('alert',true)?>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <div class="mt-4 mb-5"></div>
    <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus"></i> Tambah Data Suara
    </button>
  
</div>

        <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th style="font-size: 17px;">No</th>
                        <th style="font-size: 17px;">nama tps</th>
                        <th style="font-size: 17px;">total suara</th>
                        <th style="font-size: 17px;">suara sah</th>
                        <th style="font-size: 17px;">suara tidak sah</th>
                        <th style="font-size: 17px;">suara no 1</th>
                        <th style="font-size: 17px;">suara no 2</th>
                        <th style="font-size: 17px;">suara no 3</th>
                        <th style="font-size: 17px;">Aksi</th>
                       
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($tambah_suara as $aa) { ?>
                    <tr>
                        <td style="font-size: 17px;"><?= htmlspecialchars($no); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['nama_tps']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['total_suara']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['sah']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['tidak_sah']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['suara_no1']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['suara_no2']); ?></td>
                        <td style="font-size: 17px;"><?= htmlspecialchars($aa['suara_no3']); ?></td>
                        
                       
                        <td>
                            <a href="<?= site_url('tambah_suara/delete_data/' . $aa['id_suara']); ?>" class="btn btn-danger btn-lg mb-9">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                            <a href="<?= site_url('tambah_suara/edit/' . $aa['id_suara']); ?>" class="btn btn-warning btn-lg mb-9">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Suara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('tambah_suara/simpan') ?>" method="post">
                        <div class="form-group">
                            <label for="nama_tps">Nama Tps</label>
                            <input type="text" class="form-control" id="nama_tps" name="nama_tps" placeholder="Masukkan nama" required>
                        </div>
                        <div class="form-group">
                            <label for="total_suara">Total Suara</label>
                            <input type="text" class="form-control" id="total_suara" name="total_suara" placeholder="Masukkan total suara" required>
                        </div>
                        <div class="form-group">
                            <label for="sah">Suara Sah</label>
                            <input type="text" class="form-control" id="sah" name="sah" placeholder="Masukkan suara sah" required>
                        </div>
                        <div class="form-group">
                            <label for="tidak_sah">Suara Tidak Sah</label>
                            <input type="text" class="form-control" id="tidak_sah" name="tidak_sah" placeholder="Masukkan suara tidak sah" required>
                        </div>
                        <div class="form-group">
                            <label for="suara_no1">Suara No 1</label>
                            <input type="text" class="form-control" id="suara_no1" name="suara_no1" placeholder="Masukkan suara no 1" required>
                        </div>
                        <div class="form-group">
                            <label for="suara_no2">Suara No 2</label>
                            <input type="text" class="form-control" id="suara_no2" name="suara_no2" placeholder="Masukkan suara no 2" required>
                        </div>
                        <div class="form-group">
                            <label for="suara_no3">Suara No 3</label>
                            <input type="text" class="form-control" id="suara_no3" name="suara_no3" placeholder="Masukkan suara no 3" required>
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
