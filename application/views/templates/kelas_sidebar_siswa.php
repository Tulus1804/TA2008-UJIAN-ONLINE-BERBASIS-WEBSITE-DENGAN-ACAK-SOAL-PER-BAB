<div class="container m-t-20" style="background-color: #EBEBEB;">
	<div class="row">
		<div class="col-md-3 ">
			<div class="shadow-lg m-b-10 bg-white rounded">
				<div class="card-header">
					Kelas <strong><?= $kelasId['nama_kelas']; ?></strong> - <?= $kelasId['mapel']; ?>
				</div>
				<div class="account-dropdown__item">
					<a href="<?= base_url('siswa/ujian/' .  $kelasId['id_kelas']); ?>">
						<i class=""></i>Ujian</a>
				</div>
				<div class="account-dropdown__item">
					<a href="<?= base_url('siswa/anggota/' . $kelasId['id_kelas']); ?>">
						<i class=""></i>Anggota</a>
				</div>
			</div>
			<div class="shadow-lg m-b-10 bg-white rounded">
				<div class="card-header">
					<strong>Kelas</strong> Saya
				</div>
				<?php foreach ($kelas as $kls) : ?>
					<div class="account-dropdown__item">
						<a href="<?= base_url('siswa') ?>/kelas_dashboard/<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?>
							| <span class=""><?= $kls['mapel']; ?></span></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
