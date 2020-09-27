<div class="section__content  section__content--p30" style="background-color: #EBEBEB;">
	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto  m-t-20">
				<div class="shadow-lg mb-5 bg-white rounded">
					<div class="card-header">Hasil Ujian - <?= $ujian->nama_ujian ?> - <?= $ujian->nama_kelas ?></strong>
					</div>
					<div class="card-body m-l-20 m-r-20">
						<div class="col-md-12 mb-5 rounded row">
							<div class="col-sm-6">
								<table class="table w-100">
									<tr>
										<th>Nama Ujian</th>
										<td><?= $ujian->nama_ujian ?></td>
									</tr>
									<tr>
										<th>Jumlah Soal</th>
										<td><?= $ujian->jml_soal ?></td>
									</tr>
									<tr>
										<th>Waktu</th>
										<td><?= $ujian->waktu ?> Menit</td>
									</tr>
									<tr>
										<th>Tanggal Mulai</th>
										<td><?= strftime('%A, %d %B %Y %H:%m', strtotime($ujian->tgl_mulai)) ?></td>
									</tr>
									<tr>
										<th>Tanggal Selasi</th>
										<td><?= strftime('%A, %d %B %Y %H:%m', strtotime($ujian->tgl_akhir)) ?></td>
									</tr>
								</table>
							</div>
							<div class="col-sm-6">
								<table class="table w-100">
									<tr>
										<th>Mata Pelajaran</th>
										<td><?= $ujian->mapel ?></td>
									</tr>
									<tr>
										<th>Guru</th>
										<td><?= $ujian->nama ?></td>
									</tr>
									<tr>
										<th>Nilai Terendah</th>
										<td><?= $hasil->min_nilai ?></td>
									</tr>
									<tr>
										<th>Nilai Tertinggi</th>
										<td><?= $hasil->max_nilai ?></td>
									</tr>
									<tr>
										<th>Rata-rata Nilai</th>
										<td><?= $hasil->avg_nilai ?></td>
									</tr>
								</table>
								<!-- END DATA TABLE -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 mb-5 rounded row">
					<!-- Bank soal -->
					<div class="m-l-10 table-responsive table-responsive-data2">
						<table class="table table-data2">
							<tbody>
								<tr class="tr-shadow shadow-sm table-bordered">
									<th>Nama siswa</th>
									<th>NIS</th>
									<th>Jumlah Benar</th>
									<th>Nilai</th>
								<tr class="spacer"></tr>
								</tr>
								<?php foreach ($h as $s) : ?>
									<tr class="tr-shadow shadow-sm table-bordered">
										<td><?= $s->nama ?></td>
										<td><?= $s->no_induk ?></td>
										<td><?= $s->jml_benar ?></td>
										<td><?= $s->nilai ?></td>
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
