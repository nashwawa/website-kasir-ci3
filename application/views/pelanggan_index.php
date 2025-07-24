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
    <div class="card">
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
                    <a href="<<?php echo site_url('pelanggan/delete_data/'.$aa['id_pelanggan']); ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                    <a href="<?= site_url('pelanggan/edit/' . $aa['id_pelanggan']); ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                </td>


            <!-- Modal -->
          

                    <div
                        class="modal fade"
                        id="edit<?= $aa['id_pelanggan']?>"
                        tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-mb" role="document">
                            <form action="<?= base_url('pelanggan/update')?>" method="post">
                                <input type="hidden" name="id_pelanggan" value="<?= $aa['id_pelanggan']?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Tambah pelanggan</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label class="form-label">Nama</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" class="form-control" value="<?= $aa['nama']?>" name="nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label class="form-label">Telp</label>
                                                <div class="input-group input-group-outline mb-3">
                                                    <input type="text" class="form-control" value="<?= $aa['telp']?>" name="nama">
                                                </div>
                                            </div>
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
            <div class="modal-body">
                <form action="<?= base_url('pelanggan/simpan')?>" method="post">
                   
                   
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan telp" required>
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
