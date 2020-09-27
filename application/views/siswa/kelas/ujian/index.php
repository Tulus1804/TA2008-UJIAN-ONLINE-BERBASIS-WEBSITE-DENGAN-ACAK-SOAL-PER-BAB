<div class="section__content  section__content--p30">
    <div class="container m-t-20">
        <div class="row">
            <div class="col-md-10 mx-auto ">
                <div class="shadow-lg mb-5 bg-white rounded">
                    <div class="card-header">Kelas<strong> <?= $kelas['nama_kelas']; ?></strong>
                    </div>
                    <div class="card-body m-l-20 m-r-20">
                        <h4>Daftar Ujian - <?= $kelas['mapel'] ?></h4>
                        <div class="overview-wrap">

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5 rounded row">
                    <!-- Ujian -->
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
                                            <span class="text"><?= strftime('%A, %d %b %Y %H:%M', strtotime($u['tgl_mulai'])) . ' s.d ' . strftime('%A, %d %b %Y %H:%M', strtotime($u['tgl_akhir'])) ?></span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                $id = $user['id'];
                                                $id_ujian = $u['id_ujian'];
                                                $cek_ikut = $this->db->where(['id_ujian' => $id_ujian, 'id_user' =>  $id])->count_all_results('h_ujian');
                                                if ($cek_ikut < 1) :
                                                ?>
                                                    <a href="<?= base_url('siswa/token/' . $u['id_ujian']) ?>" class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                        <i class="zmdi zmdi-arrow-right"></i>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('siswa/hasilujian/' . $u['id_ujian']) ?>" class="item" data-toggle="tooltip" data-placement="top" title="Hasil">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </a>
                                                <?php endif; ?>
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