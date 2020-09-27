<div class="page-content" style="background-color: #EBEBEB;">
	<section class=" statistic-chart">
		<div class="container m-t-10" style="background-color: #EBEBEB;">
			<div class="row">
				<div class="col-md-3 ">
					<div class="shadow-lg m-b-10 bg-white rounded">
						<div class="card-header">
							Kelas <strong><?= $kelasId['nama_kelas']; ?></strong> - <?= $kelasId['mapel']; ?>
						</div>
						<div class="account-dropdown__item">
							<a href="<?= base_url('guru/banksoal/'); ?><?= $kelasId['id_kelas']; ?>">
								<i class=""></i>Bank Soal
								<!-- <span class="badge badge-primary badge-pill">14</span> -->
							</a>
						</div>
						<div class="account-dropdown__item">
							<a href="<?= base_url('guru/ujian/' . $kelasId['id_kelas']); ?>">
								<i class=""></i>Ujian</a>
						</div>
						<div class="account-dropdown__item">
							<a href="<?= base_url('guru/anggota/' . $kelasId['id_kelas']); ?>">
								<i class=""></i>Anggota</a>
						</div>
					</div>
					<div class="shadow-lg m-b-10 bg-white rounded">
						<div class="card-header">
							<strong>Daftar Kelas</strong> Saya
						</div>
						<?php foreach ($kelas as $kls) : ?>
							<div class="account-dropdown__item">
								<a href="<?= base_url('guru') ?>/kelas_dashboard/<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?>
									| <span class=""><?= $kls['mapel']; ?></span></a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
