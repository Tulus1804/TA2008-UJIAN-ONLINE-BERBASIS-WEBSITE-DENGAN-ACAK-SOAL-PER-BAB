<div class="page-content" style="background-color: #EBEBEB; ">
	<section class="statistic-chart">
		<div class="container m-t-10">
			<div class="row m-t-20">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-5">Kelas Saya</h2>
						<button class="au-btn au-btn-icon au-btn--blue tampilFormTambah " data-toggle="modal" data-target="#formKelas" data-placement="top">
							<i class="zmdi zmdi-plus"></i>Buat Kelas</button>
					</div>
					<hr>
				</div>
			</div>
			<?php if ($this->session->flashdata('message')) : ?>
				<!-- ALERT-->
				<div class="alert alert-success alert-dismissible fade show " role="alert">
					<i class="zmdi zmdi-check-circle"></i>
					Kelas <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- END ALERT-->
			<?php elseif ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="zmdi zmdi-check-circle"></i>
					<?= $this->session->flashdata('error') ?>!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php else : ?>
			<?php endif; ?>
			<div class="row m-t-25">
				<!-- Looping Kelas -->
				<?php foreach ($kelas as $kls) : ?>
					<div class="col-sm-6 col-lg-3">
						<div class="overview-item overview-item--c1">
							<div class="overview__inner">
								<a href="<?= base_url('guru/kelas_dashboard/'); ?><?= $kls['id_kelas']; ?>">
									<div class="overview-box clearfix">
										<div class="icon">
											<i class="fa fa-university"></i>
										</div>
										<div class="text">
											<h2><?= $kls['nama_kelas'] ?></h2>
											<span><?= $kls['name'] ?> | <?= $kls['mapel'] ?></span>
										</div>
									</div>
								</a>
								<div class="overview-chart">
									<div class="mr-10">
										<button class="item" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h2><i class="zmdi zmdi-more"></i></h2>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<button class="dropdown-item tampilFormUbah" data-toggle="modal" data-target="#formKelas" data-id="<?= $kls['id_kelas']; ?>">Edit</button>
											<button class="dropdown-item" data-toggle="tooltip" data-placement="top" onclick="hapus(<?= $kls['id_kelas'] ?>)">Hapus
											</button>
											<!-- <a class="btn-hapus dropdown-item" href=" <?= base_url('/guru/hapuskelas/'); ?><?= $kls['id_kelas']; ?>">Hapus</a> -->
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>


<!-- modal medium -->
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
									<input type=" text" id="nama_kelas" name="nama_kelas" placeholder="" required class="form-control">
									<!-- <small class="form-text text-danger"><?= form_error('nama_kelas') ?></small> -->
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="mapel" class=" form-control-label">Mata Pelajaran</label>

								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="mapel" name="mapel" placeholder="" required class="form-control">
									<!-- <small class="form-text text-danger"><?= form_error('mapel') ?></small> -->
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="deskripsi" class=" form-control-label">Deskripsi</label>

								</div>
								<div class="col-12 col-md-9">
									<textarea name="deskripsi" id="deskripsi" rows="9" placeholder="" required class="form-control"></textarea>
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
<!-- end modal medium -->

<script>
	function hapus(id_kelas) {
		Swal({
				title: "Apakah anda yakin ?",
				text: "Anda akan menghapus Kelas tersebut!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Hapus Kelas'
			})
			.then((result) => {
				if (result.value = true) {
					document.location.href = "http://localhost/tugas-akhir/guru/hapuskelas/" + id_kelas;
				} else {
					Swal({
						title: "Anda batal menghapus data tersebut!",
						type: 'warning'
					});
				}
			});
	}
</script>
