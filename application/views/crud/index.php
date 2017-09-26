<div style="display: none;" id="alert-success" class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span >
        <h4>Data berhasil di hapus</h4>
    </span>
</div>
<div style="display: none;" id="alert-failed" class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span >
        <h4>Data gagal di hapus</h4>
    </span>
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Data Mahasiswa
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($content->result() as $value)
                {
            ?>
                    <tr id="hasil<?= $value->id; ?>">
                        <td><?= $value->id; ?></td>
                        <td><?= $value->nama; ?></td>
                        <td><?= date('d F Y',strtotime($value->tgl_lahir)); ?></td>
                        <td><?= $value->hp; ?></td>
                        <td><?= $value->email; ?></td>
                        <td>
                           <!--  <a href="#modalEdit<?= $value->id;?>" data-toggle="modal" data-target="#modalEdit<?= $value->id;?>">
                                <h6><span class="badge badge-info">Edit</span></h6>
                            </a> -->
                            <button class="btn btn-warning" onclick="edit_book(<?php echo $value->id;?>)">Edit</button>
                            <h6><button class="badge badge-danger" id="hapus-mhs<?= $value->id;?>" onclick="hapusMahasiswa(<?= $value->id;?>)" value="<?= $value->id;?>">Delete</button></h6>
                        </td>

                        <!-- Modal Form Edit -->
                        <div class="modal fade" id="modalEdit<?= $value->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="crud/update/<?= $value->id;?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Mahasiswa[nama]" placeholder="Masukkan Nama" value="<?php echo $value->nama; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="Mahasiswa[tgl_lahir]" placeholder="Pilih Tanggal Lahir" value="<?php echo $value->tgl_lahir; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Mahasiswa[hp]" placeholder="Masukkan No. HP" value="<?php echo $value->hp; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="Mahasiswa[email]" placeholder="Masukkan Email" value="<?php echo $value->email; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input class="btn btn-success" type="submit" name="submit" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <button class="btn btn-primary" id="tambah-data">Tambah Data</button>
            <br />
            <br />
            <div style="display: none;" id="form-tambah">
                <form action="#" method="POST" id="form">
                    <div class="form-group">
                        <input id="nama" type="text" class="form-control" name="Mahasiswa[nama]" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <input id="tgl_lahir" type="date" class="form-control" name="Mahasiswa[tgl_lahir]" placeholder="Pilih Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <input id="hp" type="text" class="form-control" name="Mahasiswa[hp]" placeholder="Masukkan No. HP">
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="Mahasiswa[email]" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <span id="tombol-tambah" class="btn btn-success" onclick="tambahMahasiswa()">Simpan</span>
                    </div>
                </form>
            </div>
        </div>
  </div>
  <div class="card-footer small text-muted">
    <!-- Updated yesterday at 11:59 PM -->
  </div>
</div>