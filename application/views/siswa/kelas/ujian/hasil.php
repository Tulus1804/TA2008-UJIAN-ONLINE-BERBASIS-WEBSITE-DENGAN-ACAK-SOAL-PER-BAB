<div class="section__content  section__content--p30">
	<div class="container m-t-20">
		<div class="row">
			<div class="col-md-12 mx-auto ">
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
										<th>Tanggal Selesai</th>
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
									<?php if ($hasil == '') : ?>
										<tr>
											<th>Nilai</th>
											<td>-</td>
										</tr>
										<tr>
											<th>Jumlah Benar</th>
											<td>-</td>
										</tr>
									<?php else : ?>
										<tr>
											<th>Nilai</th>
											<td><?= $hasil->nilai ?></td>
										</tr>
										<tr>
											<th>Jumlah Benar</th>
											<td><?= $hasil->jml_benar ?></td>
										</tr>
									<?php endif; ?>
								</table>
								<!-- END DATA TABLE -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mb-5 rounded row">
				<!-- Bank soal -->
				<div class="m-l-10 table-responsive table-responsive-data2">
					<table class="table table-data2">
						<tbody>
							<?= $this->session->flashdata('message'); ?>
							<tr class="tr-shadow shadow-sm table-bordered">
								<th class="text-center">No</th>
								<th class="text-center">Soal</th>
								<th class="text-center">Jawaban Benar</th>
								<th class="text-center">Jawaban Anda</th>
								<th class="text-center">Ket.</th>
							<tr class="spacer"></tr>
							<?php
							$no = 1;
							$i = 0;
							foreach ($soal as $s) : ?>
								<tr class="tr-shadow shadow-sm table-bordered">
									<td><?= $no ?></td>
									<td>
										<p><?= $s->soal ?></p>
										<hr>
										<p>A. <?= $s->opsi_a ?></p>
										<p>B. <?= $s->opsi_b ?></p>
										<p>C. <?= $s->opsi_c ?></p>
										<p>D. <?= $s->opsi_d ?></p>
										<p>E. <?= $s->opsi_e ?></p>

									</td>
									<td>
										<h3 class="btn btn-primary btn-disabled"><?= strtoupper($s->jawaban);  ?>
									</td>
									<td>
										<h3 class="btn btn-outline-info btn-disabled"><?= strtoupper($jwb[$i]); ?></h3>
									</td>
									<td>
										<?php if ($s->jawaban === $jwb[$i]) : ?>
											<h4 class="badge badge-success">Benar</h4>
										<?php else : ?>
											<h4 class="badge badge-danger">Salah</h4>
										<?php endif; ?>
									</td>
								</tr>
								<tr class="spacer"></tr>
							<?php
								$no++;
								$i++;
							endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- END DATA TABLE -->
			</div>
		</div>
	</div>
</div>
