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
			<div class="overview-wrap ">
				<p id="kd_kelas">kode Kelas : <?= $kelasId['kode_kelas'] ?></p>
				<!-- <button data-id="<?= $kelasId['id_kelas'] ?>" class="item btn-token" data-title="refresh kode">
                    <i class="fa fa-refresh"></i>
                </button> -->

				<button class="item" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<h2><i class="zmdi zmdi-plus"></i></h2>
				</button>
				<div class="dropdown-menu " aria-labelledby="dropdownMenu2">
					<button class="dropdown-item tampilFormUbah" data-toggle="modal" data-target="#formKelas" data-id="<?= $kelasId['id_kelas'] ?>">Edit Kelas</button>
					<a href="<?= base_url('guru/tambahujian/' . $kelasId['id_kelas']) ?>" class="dropdown-item">Tambah Ujian</a>
				</div>
			</div>
		</div>
	</div>
	<?php foreach ($ujian as $u) : ?>
		<div class="shadow-lg bg-white rounded statistic-chart-1">
			<div class="m-l-20 m-r-10 ">
				<div class=" overview-wrap">
					<p><strong><?= $u['nama'] ?> </strong> Ke <strong><?= $u['nama_kelas'] ?></strong></p>
				</div>
				<p><i class="zmdi zmdi-calendar""></i> <?= strftime('%d %B %Y %H:%M', $u['date_created'])  ?></p>
            <hr>
            <div class=" col-sm-12 statistic-chart-1">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title"><?= $u['nama_ujian'] ?></h3>
								<span><i class=" zmdi zmdi-calendar""></i> Tanggal Ujian : <?= strftime('%d %B %Y %H:%M', strtotime($u['tgl_mulai'])) . ' s.d ' . strftime('%d %B %Y %H:%M', strtotime($u['tgl_akhir']))  ?>  </span>
                     	<br>
                     	<span><i class=" fa fa-clock""></i> Waktu : <?= $u['waktu'] . ' Menit' ?></span>
								<hr>
								<div class=" card-text">
									<P><?= auto_typography($u['petunjuk']) ?></P>
									<hr>
									<a href="<?= base_url('guru/hasilujian/' . $u['id_ujian']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top">
										<span class="fa fa-eye"></span> Lihat Hasil
									</a>
								</div>
							</div>
						</div>
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

<!-- Ubah Kelas -->
<div class="modal fade" id="formKelas" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formKelasLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formKelasLabel">Tambah Kelas </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body card-block">
						<form class="form-horizontal" method="post" action="<?= base_url('guru/tambahKelas'); ?>">
							<div class="row form-group">
								<input type="hidden" id="id_kelas" name="id_kelas" class="form-control">
								<input type="hidden" id="id_user" name="id_user" class="form-control">
								<div class="col col-md-3">
									<label for="nama_kelas" class=" form-control-label">Nama Kelas</label>
								</div>
								<div class="col-12 col-md-9">
									<input type=" text" id="nama_kelas" name="nama_kelas" placeholder="" class="form-control">
									<!-- <small class="form-text text-danger"><?= form_error('nama_kelas') ?></small> -->
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="mapel" class=" form-control-label">Mata Pelajaran</label>

								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="mapel" name="mapel" placeholder="" class="form-control">
									<!-- <small class="form-text text-danger"><?= form_error('mapel') ?></small> -->
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="deskripsi" class=" form-control-label">Deskripsi</label>

								</div>
								<div class="col-12 col-md-9">
									<textarea name="deskripsi" id="deskripsi" rows="9" placeholder="" class="form-control"></textarea>
									<!-- <small class="form-text text-danger"><?= form_error('deskripsi') ?></small> -->
								</div>
							</div>

							<div class="modal-footer">
								<button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
								<button type="reset" id="btn-batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		$('.btn-token').on('click', function() {
			const id = $(this).data('id');

			$(this).attr('disabled', 'disabled').children().addClass('fa-spin');
			$.ajax({
				url: 'http://o-ujian.online/guru/refresh_kdkelas/' + id,
				type: 'get',
				dataType: 'json',
				success: function(data) {
					if (data.status) {
						$(this).removeAttr('disabled');
						window.location.reload();
					}
				}
			});
		});
	});
</script>
