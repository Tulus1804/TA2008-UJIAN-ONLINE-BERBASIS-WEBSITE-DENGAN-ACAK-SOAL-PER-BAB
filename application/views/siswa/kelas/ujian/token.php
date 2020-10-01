<div class="callout callout-info">
	<h4>Peraturan Ujian!</h4>
	<?= auto_typography($ujian->petunjuk); ?>
</div>
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Konfirmasi Data</h3>
	</div>
	<div class="box-body">
		<span id="id_ujian" data-key="<?= $ujian->id_ujian ?>"></span>
		<div class="row">
			<div class="col-sm-6">
				<table class="table table-bordered">
					<tr>
						<th>Nama</th>
						<td>
							<?= $user['name'] ?>
						</td>
					</tr>
					<tr>
						<th>Guru</th>
						<td>
							<?= $ujian->nama ?>
						</td>
					</tr>
					<tr>
						<th>Kelas/Mapel</th>
						<td>
							<?= $ujian->nama_kelas ?> /
							<?= $ujian->mapel ?>
						</td>
					</tr>
					<tr>
						<th>Nama Ujian</th>
						<td>
							<?= $ujian->nama_ujian ?>
						</td>
					</tr>
					<tr>
						<th>Jumlah Soal</th>
						<td>
							<?= $ujian->jml_soal ?>
						</td>
					</tr>
					<tr>
						<th>Waktu</th>
						<td>
							<?= $ujian->waktu ?> Menit</td>
					</tr>
					<tr>
						<th>Mulai</th>
						<td>
							<?= strftime('%d %B %Y', strtotime($ujian->tgl_mulai)) ?>
							<?= date('H:i:s', strtotime($ujian->tgl_mulai)) ?>
						</td>
					</tr>
					<tr>
						<th>Terlambat</th>
						<td>
							<?= strftime('%d %B %Y', strtotime($ujian->tgl_akhir)) ?>
							<?= date('H:i:s', strtotime($ujian->tgl_akhir)) ?>
						</td>
					</tr>
					<!-- <tr>
						<th style="vertical-align:middle">Token</th>
						<td>
							<input autocomplete="off" id="token" placeholder="Token" type="text" value="<?= $ujian->kd_ujian ?>" class="input-sm form-control">
						</td>
					</tr> -->
					<tr>
						<th style="vertical-align:middle">Konfirmasi</th>
						<td>
							<input type="checkbox" name="cek" id="cek">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6">
				<div class="box box-solid">
					<div class="box-body pb-0">
						<div class="callout callout-info">
							<p>
								Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau.
							</p>
						</div>
						<?php
						$mulai = strtotime($ujian->tgl_mulai);
						$terlambat = strtotime($ujian->tgl_akhir);
						$now = time();
						if ($mulai > $now) :
						?>
							<div class="callout callout-success">
								<strong><i class="fa fa-clock-o"></i> Ujian akan dimulai pada</strong>
								<br>
								<span class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->tgl_mulai)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
							</div>
						<?php elseif ($terlambat > $now) : ?>
							<button id="btncek" data-id="<?= $ujian->id_ujian ?>" class="btn btn-success btn-lg mb-4">
								<i class="fa fa-pencil"></i> Mulai
							</button>
							<div class="callout callout-danger">
								<i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->tgl_akhir)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
								Batas waktu menekan tombol mulai.
							</div>
						<?php else : ?>
							<div class="callout callout-danger">
								Waktu untuk menekan tombol <strong>"MULAI"</strong> sudah habis.<br />
								Silahkan hubungi guru <?= $ujian->nama ?> anda untuk bisa mengikuti ujian pengganti.
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/app/ujian/token.js"></script>
