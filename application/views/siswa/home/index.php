<!-- PAGE CONTENT-->
<div class="page-content" style="background-color: #EBEBEB;">
	<section class="statistic-chart">
		<div class="container">
			<div class="row">
				<div class="col-md-3 ">
					<div class="shadow-lg mb-5 bg-white rounded">
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

				<div class="container col-md-9 ">
					<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
						<div class="au-card-title" style="background-image:url('assets/img/bg-title-01.jpg');">
							<div class="bg-overlay bg-overlay--blue"></div>
							<h3>
								<i class="zmdi zmdi-account-calendar"></i><?= strftime('%A, %d %B %Y') ?>, <span class="live-clock"><?= date('H:i:s') ?></span></h3>
						</div>
					</div>
					<?php foreach ($ujian as $u) : ?>
						<div class="shadow-lg bg-white rounded statistic-chart-1">
							<div class="m-l-20 m-r-10 ">
								<div class=" overview-wrap">
									<p><strong><?= $u['nama'] ?> </strong> Ke <strong><?= $u['nama_kelas'] ?></strong></p>
								</div>
								<p><i class="zmdi zmdi-calendar""></i> <?= strftime(' %d %B %Y %H:%M', $u['date_created'])  ?></p>
                                    <hr>
                    <div class=" col-sm-12 statistic-chart-1">
										<div class="card">
											<div class="card-body">
												<h3 class="card-title"><?= $u['nama_ujian'] ?></h3>
												<span><i class=" zmdi zmdi-calendar""></i> Tanggal Ujian : <?= strftime('%d %B %Y %H:%M', strtotime($u['tgl_mulai'])) . ' s.d ' . strftime('%d %B %Y %H:%M', strtotime($u['tgl_akhir']))  ?>  </span>
                                <br>
                                <span><i class=" fa fa-clock""></i> Waktu : <?= $u['waktu'] . ' Menit' ?></span>

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
	</section>
</div>
<br><br><br><br>
