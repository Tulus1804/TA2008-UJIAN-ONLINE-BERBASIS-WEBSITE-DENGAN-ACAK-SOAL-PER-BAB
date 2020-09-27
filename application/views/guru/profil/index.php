<br>
<div class="row-fluid">
    <div class="col-md-6 mx-auto">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Profil <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php else : ?>
        <?php endif; ?>
    </div>
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="mx-auto d-block mt-3">
                    <img class="rounded-circle mx-auto d-block" src="<?= base_url('uploads/img/') . $profil['role_id'] . '/'  . $profil['foto']; ?>" alt="<?= $profil['image'] ?>" width=200px height=200px>
                    <br>
                    <h3 class="text-sm-center mt-2 mb-1"><?= $profil['nama'] ?></h3>
                    <div class="location text-sm-center">
                        <i class="zmdi zmdi-email"></i> <?= $profil['email'] ?></div>
                </div>

                <div class="mx-auto d-block mt-2">
                    <div class="text-sm-center mt-2 ">NIP : <?= $profil['nomor_induk'] ?></div>
                    <?php
                    if ($profil['jk'] == 'L') {
                        $jk = 'Laki-laki';
                    } else if ($profil['jk'] == 'P') {
                        $jk = 'Perempuan';
                    } else {
                        $jk = '';
                    }
                    ?>
                    <div class="text-sm-center mt-2 "><?= $jk ?></div>
                    <div class="text-sm-center mt-2 "><?= $profil['tmp_lahir'] . ', ' . strftime('%d %B %Y', strtotime($profil['tgl_lahir'])) ?></div>
                    <div class="text-sm-center mt-2 "><?= $profil['alamat'] ?></div>
                </div>

            </div>
            <div class="card-footer">
                <div class="mx-auto d-block text-sm-center">
                    <a href="<?= base_url('guru/getubahprofil/' . $profil['id']) ?>">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>