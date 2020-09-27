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
                           <h1 class="h4 text-gray-900 mb-2">Ubah Password</h1>
                           <h5 class="text-gray-900 mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
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
                        <form class="user" method="post" action="<?= base_url('auth/ubahpassword'); ?>">
                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Masukkan password baru...">
                              <?= form_error('password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password2" name="password2" aria-describedby="emailHelp" placeholder="Masukkan ulang password...">
                              <?= form_error('password2', '<small class="text-danger pl-3" >', '</small>'); ?>
                           </div>
                           <button type="submit" class="btn btn-primary btn-user btn-block">
                              Ubah Password
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>