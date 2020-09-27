<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
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
                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/lupapassword') ?>">Lupa Password?</a>
                </div>
                <div class="text-center">
                  Buat Akun!
                  <a class="small" href="<?= base_url('auth/registration_guru') ?>">Guru</a> /
                  <a class="small" href="<?= base_url('auth/registration_siswa') ?>">Siswa</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>