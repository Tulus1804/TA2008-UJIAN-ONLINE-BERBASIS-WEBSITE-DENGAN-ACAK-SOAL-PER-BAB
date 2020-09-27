<div class="row-fluid">
    <div class="mx-auto">
        <div class="col-lg-6 mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <strong>Edit</strong> Profil
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body card-block">
                    <form action="<?= base_url('siswa/ubahprofil/' . $profil['id']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <input type="hidden" name="id" id="id" value="<?= $profil['id'] ?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" readonly id="no_induk" name="no_induk" value="<?= $profil['no_induk'] ?>" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $profil['foto'] ?>">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Foto</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="foto" name="foto" value="<?= $profil['image'] ?>" class="form-control-file">
                                <?= form_error('foto', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama" name="nama" value="<?= $profil['nama'] ?>" placeholder="Nama" required class="form-control">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" value="<?= $profil['email'] ?>" name="email" placeholder="Email" class="form-control" required>
                                <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="jk" id="jk" class="form-control">
                                    <option <?= $profil['jk'] === "" ? "selected" : ""; ?>value="" disabled selected>--- Pilih ---</option>
                                    <option <?= $profil['jk'] === "L" ? "selected" : ""; ?> value="L">Laki-laki</option>
                                    <option <?= $profil['jk'] === "P" ? "selected" : ""; ?> value="acak">Perempuan</option>
                                </select>
                                <?= form_error('jk', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="tmp_lahir" name="tmp_lahir" value="<?= $profil['tmp_lahir'] ?>" placeholder="" required class="form-control">
                                <?= form_error('tmp_lahir', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $profil['tgl_lahir'] ?>" placeholder="" required class="form-control">
                                <?= form_error('tgl_lahir', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="alamat" name="alamat" value="<?= $profil['alamat'] ?>" placeholder="Nama" required class="form-control">
                                <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions form-group">
                            <div class="mx">
                                <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>