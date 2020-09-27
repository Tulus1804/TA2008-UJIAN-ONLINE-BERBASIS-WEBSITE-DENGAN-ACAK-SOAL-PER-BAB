<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center mb-4">
                  <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                </div>
                <?php if ($this->session->flashdata('message')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message') ?>
                  </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error') ?>
                  </div>
                <?php else : ?>

                <?php endif; ?>
                <form class="user" method="post" action="<?= base_url('auth/lupapassword'); ?>">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan alamat email...">
                    <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Atur Ulang Password
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  Buat Akun!
                  <a class="small" href="<?= base_url('auth/registration_guru') ?>">Guru</a> /
                  <a class="small" href="<?= base_url('auth/registration_siswa') ?>">Siswa</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth') ?>">Sudah punya akun ? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>