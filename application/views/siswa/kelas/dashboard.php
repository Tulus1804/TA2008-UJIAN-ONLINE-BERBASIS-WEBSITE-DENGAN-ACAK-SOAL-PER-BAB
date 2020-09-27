<div class="col-md-9 ">
	<div class="shadow-lg mb-5 bg-white rounded">
		<div class="card-header">
			Kelas <strong><?= $kelasId['nama_kelas']; ?></strong>
		</div>
		<div class="card-body m-l-20 m-r-20">
			<strong><?= $kelasId['name']; ?></strong> - <strong style="font-size: 14pt;"><?= $kelasId['mapel']; ?></strong>
			<p><?= $kelasId['deskripsi']; ?></p>
			<br>
			<br>
		</div>
	</div>
	<?php foreach ($ujian as $u) : ?>
		<div class="shadow-lg bg-white rounded statistic-chart-1">
			<div class="m-l-20 m-r-10 ">
				<div class=" overview-wrap">
					<p><strong><?= $kelasId['name'] ?> </strong> Ke <strong><?= $u['nama_kelas'] ?></strong></p>
					<!-- <button class="item" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h2><i class="zmdi zmdi-more"></i></h2>
                    </button> -->
				</div>
				<p><i class="zmdi zmdi-calendar"></i> <?= strftime('%d %b %Y %H:%M', $u['date_created'])  ?></p>
				<hr>
				<div class=" col-sm-12 statistic-chart-1">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title"><?= $u['nama_ujian'] ?></h3>
							<span><i class=" zmdi zmdi-calendar""></i> Tanggal Ujian : <?= strftime('%d %B %Y %H:%M', strtotime($u['tgl_mulai'])) . ' s.d ' . strftime('%d %B %Y %H:%M', strtotime($u['tgl_akhir']))  ?>  </span>
                                <br>
                                <span><i class=" fa fa-clock""></i>Waktu Mengerjakan : <?= $u['waktu'] . ' Menit' ?></span>

							<hr>
							<div class=" card-text"><?= auto_typography($u['petunjuk']) ?>
							</div>
						</div>
					</div>
					<hr>
					<?php
					$id = $user['id'];
					$id_ujian = $u['id_ujian'];
					$cek_ikut = $this->db->where(['id_ujian' => $id_ujian, 'id_user' =>  $id])->count_all_results('h_ujian');
					if ($cek_ikut < 1) :
					?>
						<a href="<?= base_url('siswa/token/' . $u['id_ujian']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top">
							<span class="fa fa-pencil"></span> Mulai Ujian
						</a>

					<?php else : ?>
						<a href="<?= base_url('siswa/hasilujian/' . $u['id_ujian']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top">
							<span class="fa fa-eye"></span> Lihat Hasil
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</div>
</div>


<div class="modal fade" id="infoUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="namaUjian">Ulangan Tengah Semester Gasal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
