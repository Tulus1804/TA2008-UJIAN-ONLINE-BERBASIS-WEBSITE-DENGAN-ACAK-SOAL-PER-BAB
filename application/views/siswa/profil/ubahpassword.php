<div class="col-lg-6 mt-5 ml-5">
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Password <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php else : ?>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">Ubah Password</div>
        <div class="card-body card-block">
            <form action="<?= base_url('siswa/ubahpassword/' . $profil['id']) ?>" method="post">
                <input type="hidden" name="id" id="id" value="<?= $profil['id'] ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="pass_lama" class=" form-control-label">Password Lama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="pass_lama" name="pass_lama" class="form-control" required>
                        <?= form_error('pass_lama', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="pass1" class=" form-control-label">Password Baru</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="pass1" name="pass1" class="form-control" required>
                        <?= form_error('pass1', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="pass2" class=" form-control-label">Konfirmasi Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="pass2" name="pass2" class="form-control" required>
                        <?= form_error('pass2', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                </div>
                <hr>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">ubah password</button>
                </div>
            </form>
        </div>
    </div>
</div>