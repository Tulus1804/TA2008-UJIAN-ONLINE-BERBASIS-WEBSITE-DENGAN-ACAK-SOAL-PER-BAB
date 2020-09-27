<div class="section__content  section__content--p30">
    <div class="container m-t-20">
        <div class="row">
            <div class="col-md-10 mx-auto ">
                <div class="shadow-lg mb-5 bg-white rounded">
                    <div class="card-body m-l-20 m-r-20">
                        <h4>Daftar Semua Ujian</h4>
                        <div class="overview-wrap">
                            <p></p>
                            <a href="" class="item" title="Tambah ujian" data-placement="top">
                                <h2><i class="zmdi zmdi-plus"></i></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5 rounded row">
                    <!-- Bank soal -->
                    <div class="m-l-10 table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <tbody>
                                <?= $this->session->flashdata('message'); ?>
                                <?php foreach ($ujian as $u) : ?>
                                    <tr class="tr-shadow shadow-sm table-bordered">
                                        <td>
                                            <h5><?= $u['nama_ujian'] ?></h5>
                                            <span class="text"><?= $u['nama_kelas'] . ' - ' . $u['mapel'] ?></span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="modal" data-target="#formUbahBank" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <a href="" class="item" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin ?')" title="Hapus">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                                <a href="" class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-more"></i>
                                                </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>