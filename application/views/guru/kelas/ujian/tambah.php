<div class="row-fluid">
	<div class="col-lg-6 mt-5 mb-5 mx-auto">
		<div class="card">
			<div class="card-header">
				<strong>Tambah</strong> Ujian
			</div>
			<?= $this->session->flashdata('message'); ?>
			<div class="card-body card-block">
				<form action="<?= base_url('guru/tambahujian/' . $kelas['id_kelas']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" id="id_kelas" name="id_kelas" value="<?= $kelas['id_kelas']; ?>" class="form-control">
					<input type="hidden" id="id_guru" name="id_guru" value="<?= $kelas['id_guru']; ?>" class="form-control">
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="ujian" class=" form-control-label">Nama Ujian</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="text" id="ujian" name="ujian" value="<?= set_value('ujian'); ?>" placeholder="Nama ujian" required class="form-control">
							<?= form_error('ujian', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="tanggal_mulai" class=" form-control-label">Tanggal Mulai</label>
						</div>
						<div class="col-6 col-md-9">
							<input type="datetime-local" value="<?= set_value('tgl_mulai'); ?>" class="form-control" name="tgl_mulai" id="tgl_mulai" required>
							<?= form_error('tgl_mulai', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="tanggal_akhir" class=" form-control-label">Tanggal Berakhir</label>
						</div>
						<div class="col-6 col-md-9">
							<input type="datetime-local" value="<?= set_value('tgl_akhir'); ?>" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
							<?= form_error('tgl_akhir', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="petunjuk" class=" form-control-label">Petunjuk</label>
						</div>
						<div class="col-12 col-md-9">
							<textarea class="form-control" value="<?= set_value('petunjuk'); ?>" name=" petunjuk" id="petunjuk" cols="30" rows="10" required><?= set_value('petunjuk') ?></textarea>
						</div>
					</div>

					<div class="row form-group">
						<div class="col col-md-3">
							<label for="jenis" class=" form-control-label">Jenis Soal</label>
						</div>
						<div class="col-12 col-md-9">
							<select name="jenis" aria-valuenow="<?= set_value('jenis') ?>" class="form-control">
								<option value="" disabled selected>--- Pilih ---</option>
								<option value="acak">Acak Soal</option>
								<option value="acak per bab">Acak soal per Bab</option>
							</select>
							<?= form_error('jenis', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group jml_soal">
						<div class="col col-md-3">
							<label for="jml_soal" class=" form-control-label">Jumlah Soal</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="number" id="jml_soal" name="jml_soal" value="<?= set_value('jml_soal'); ?>" placeholder="Jumlah soal" class="form-control">
							<?= form_error('jml_soal', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group jumlahperbab">
						<?php
						$no = 1;
						foreach ($bank as $b) :
						?>
							<div class="col col-md-4">
								<label for="soal_per_bab" style="font-size: small;" class=" form-control-label"><?= $b['banksoal'] ?></label>
							</div>
							<div class="col-12 col-md-8">
								<input type="hidden" id="id_bank_<?= $no ?>" name="id_bank_<?= $no ?>" value="<?= $b['id'] ?>" class="form-control">
								<input type="number" id="jml_<?= $no ?>" name="jml_<?= $no ?>" value="<?= set_value('jml_' . $no); ?>" placeholder="Jumlah soal" class="form-control">
								<?= form_error('jml_' . $no, '<small class="form-text text-danger">', '</small>'); ?>
								<hr>
							</div>
						<?php
							$no++;
						endforeach;
						?>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="batas_waktu" class=" form-control-label">Waktu Ujian</label>
						</div>
						<div class="col-12 col-md-5">
							<input type="number" id="bts_waktu" name="bts_waktu" value="<?= set_value('bts_waktu'); ?>" placeholder="Batas waktu" class="form-control" required>

							<?= form_error('bts_waktu', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="col-12 col-md-3">
							<label for="menit" class=" form-control-label">Menit</label>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<div class="mx-auto">
							<button type="submit" class="btn btn-primary btn-md">Tambah</button>
						</div>
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.jumlahperbab').hide();

		$("select").change(function() {
			// hide all optional elements
			$("select option:selected").each(function() {
				if ($(this).val() == "acak per bab") {
					$('.jumlahperbab').show(500);
					$('.jml_soal').hide(500);
				} else {
					$('.jumlahperbab').hide(500);
					$('.jml_soal').show(500);
				}
			});
		});
	});
</script>
