<div class="section__content  section__content--p30">
    <div class="container m-t-20">
        <div class="row">
            <div class="col-md-10 mx-auto ">
                <div class="shadow-lg mb-5 bg-white rounded">
                    <div class="card-header">Kelas<strong> <?= $kelas['nama_kelas']; ?></strong></div>
                    <div class="card-body m-l-20 m-r-20">
                        <h4>Anggota || <?= $kelas['mapel'] ?></h4>
                        <p><?= $kelas['name'] ?></p>
                        <div class="overview-wrap">
                            <p></p>
                            <button class="item" type="button" data-toggle="modal" data-target="#formTambahBank" data-placement="top">
                                <h2><i class="zmdi zmdi-plus"></i></h2>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5 rounded row">
                    <!-- Bank soal -->
                    <div class="m-l-10 table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <tbody>
                                <?= $this->session->flashdata('message'); ?>
                                <?php foreach ($anggota as $a) : ?>
                                    <tr class="tr-shadow shadow-sm table-bordered">
                                        <td>
                                            <h5><?= $a['name']; ?></h5>
                                            <span class="text">NIS : <?= $a['no_induk'] ?></span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item detailAnggota" data-toggle="modal" data-target="#detailAnggota" data-nis="<?= $a['no_induk'] ?>" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-more"></i>
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


<!-- detail anggota -->
<div class="modal fade" id="detailAnggota" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailAnggotaLabel">Detail Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" id="foto" src="" alt=" Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1" id=nama></h5>

                        </div>
                        <div class="mx-auto d-block">
                            <div class="text-sm-center" id="nis"></div>
                            <div class="location text-sm-center" id="alamat">
                                <i class="fa fa-map-marker" id=""></i></div>
                            <div class="data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal medium -->