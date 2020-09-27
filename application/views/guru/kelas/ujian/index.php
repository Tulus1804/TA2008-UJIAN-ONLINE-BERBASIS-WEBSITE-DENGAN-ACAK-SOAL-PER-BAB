<div class="section__content  section__content--p30 " style="background-color: #EBEBEB;">
	<div class="container m-t-20">
		<div class="row">
			<div class="col-md-10 mx-auto ">
				<div class="shadow-lg mb-5 bg-white rounded">
					<div class="card-header">Kelas<strong> <?= $kelas['nama_kelas']; ?></strong>
					</div>
					<div class="card-body m-l-20 m-r-20">
						<h4>Daftar Ujian - <?= $kelas['mapel'] ?></h4>
						<div class="overview-wrap">
							<p></p>
							<a href="<?= base_url('guru/tambahujian/' . $kelas['id_kelas']) ?>" class="item" title="Tambah ujian" data-placement="top">
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
								<?php if ($this->session->flashdata('message')) : ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										Ujian <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
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
								<?php foreach ($ujian as $u) : ?>
									<tr class="tr-shadow shadow-sm table-bordered">
										<td>
											<h5><?= $u['nama_ujian'] ?></h5>
											<p class="text">Kode Ujian: <?= $u['kd_ujian']  ?></p>
											<span class="text"><?= $u['nama_kelas'] . ' - ' . $u['mapel'] ?></span>

										</td>
										<td>
											<span class="text"><?= strftime('%A, %d %b %Y %H:%M', strtotime($u['tgl_mulai'])) . ' s.d ' . strftime('%A, %d %b %Y %H:%M', strtotime($u['tgl_akhir'])) ?></span>
										</td>
										<td>
											<div class="table-data-feature">
												<a href="<?= base_url('guru/ubahujian/' . $u['id_ujian'] . '/' . $u['id_kelas']) ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
													<i class="zmdi zmdi-edit"></i>
												</a>
												<a href="<?= base_url('guru/hapusujian/' . $u['id_ujian'] . '/' . $u['id_kelas']) ?>" class="item" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin ?')" title="Hapus">
													<i class="zmdi zmdi-delete"></i>
												</a>
												<button class="item detailUjian" data-id="<?= $u['id_ujian'] ?>" data-toggle="modal" data-target="#detailUjian" data-placement="top" title="Detail Ujian">
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

<!-- detail soal-->
<div class="modal fade" id="detailUjian" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailUjianLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUjianLabel">Detail Ujian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body">
						<table class="table table-border">
							<tr>
								<th>Guru</th>
								<td id="nama_guru"></td>
							</tr>
							<tr>
								<th>Kelas/Mapel</th>
								<td id="kelas_mapel"></td>
							</tr>
							<tr>
								<th>Nama Ujian</th>
								<td id="nama_ujian"></td>
							</tr>
							<tr>
								<th>Jumlah Soal</th>
								<td id="jumlah_soal"></td>
							</tr>
							<tr>
								<th>Jenia Soal</th>
								<td id="jenis_soal"></td>
							</tr>
							<tr>
								<th>Waktu</th>
								<td id="waktu"></td>
							</tr>
							<tr>
								<th>Mulai Ujian</th>
								<td id="mulai"></td>
							</tr>
							<tr>
								<th>Selesai Ujian</th>
								<td id="akhir"></td>
							</tr>
							<tr>
								<th>Token</th>
								<td id="kode_kelas"></td>
							</tr>
						</table>
					</div>
					<br>
					<button id="btn-lihat-hasil" data-id="" class="btn btn-lg btn-primary">Lihat Hasil</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/app/ujian/daftar_ujian.js"></script>
