<div class="container m-t-30">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-5">Kelas Saya</h2>
                <button class="au-btn au-btn-icon au-btn--blue btn-tambahKelas" data-toggle="modal" data-target="#formGabungKelas" data-placement="top">
                    <i class="zmdi zmdi-plus"></i>Gabung Kelas</button>
            </div>
            <hr>
        </div>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
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
    <div class="row m-t-25">
        <!-- Looping Kelas -->
        <?php foreach ($kelas as $kls) : ?>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <a href="<?= base_url('siswa/kelas_dashboard/'); ?><?= $kls['id_kelas']; ?>">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fa fa-university"></i>
                                </div>
                                <div class="text">
                                    <h2><?= $kls['nama_kelas'] ?></h2>
                                    <span><?= $kls['mapel'] ?></span>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="overview-chart">
                        <button class="item" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h2><i class="zmdi zmdi-more"></i></h2>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" href="<?= base_url('siswa/keluarkelas/' . $kls['id_kelas']) ?>" onclick="return confirm('Yakin?');">Keluar</a>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container m-t-50"></div>


<!-- Modal Form Gabung Kelas -->
<div class="modal fade" id="formGabungKelas" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formGabungKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formGabungKelasLabel">Gabung Kelas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-block">
                        <form class="form-horizontal" method="post" action="<?= base_url('siswa/gabungkelas'); ?>">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama_kelas" class=" form-control-label">Kode kelas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type=" text" id="kode_kelas" name="kode_kelas" placeholder="Masukkan kode kelas" required class="form-control">
                                    <!-- <small class="form-text text-danger"><?= form_error('nama_kelas') ?></small> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="" class="btn btn-primary">Gabung</button>
                                <button type="reset" id="" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>