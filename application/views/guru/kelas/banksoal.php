<div class="section__content  section__content--p30" style="background-color: #EBEBEB;">
	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto m-t-20">
				<div class="shadow-lg mb-5 bg-white rounded">
					<div class="card-header">Kelas<strong> <?= $kelas['nama_kelas']; ?></strong></div>
					<div class="card-body m-l-20 m-r-20">
						<h4>Bank Soal || <?= $kelas['mapel'] ?></h4>
						<p><?= $kelas['name'] ?></p>
						<div class="overview-wrap">
							<p></p>
							<button class="item" type="button" data-toggle="modal" data-target="#formTambahBank" data-placement="top">
								<h2><i class="zmdi zmdi-plus"></i></h2>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-12 mb-5 rounded row">
					<!-- Bank soal -->
					<div class="m-l-10 table-responsive table-responsive-data2">
						<table class="table table-data2">
							<tbody>
								<?php if ($this->session->flashdata('message')) : ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										Bank soal <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php elseif ($this->session->flashdata('error')) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?= $this->session->flashdata('error') ?>!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php else : ?>
								<?php endif; ?>
								<?php foreach ($banksoal as $bank) : ?>
									<tr class="tr-shadow">
										<td>
											<h5><?= $bank['banksoal']; ?></h5>
											<span class="text"><?= $bank['mapel'] ?></span>
										</td>
										<td>
											<div class="table-data-feature">
												<button class="item tampilUbahBanksoal" data-toggle="modal" data-id="<?= $bank['id'] ?>" data-target="#formUbahBank" data-placement="top" title="Edit">
													<i class="zmdi zmdi-edit"></i>
												</button>
												<a href="<?= base_url('guru/hapusBanksoal/') ?><?= $bank['id'] ?>/<?= $bank['id_kelas'] ?>" class="item" data-toggle="tooltip" data-placement="top" onclick="return confirm('Yakin ?')" title="Hapus">
													<i class="zmdi zmdi-delete"></i>
												</a>
												<a href="<?= base_url('guru/detailBanksoal/') ?><?= $bank['id'] ?>/<?= $bank['id_kelas'] ?>" class="item" data-toggle="tooltip" data-placement="top" title="Daftar soal">
													<i class="fa fa-list-ul"></i>
												</a>
												</button>
											</div>
										</td>
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

<!-- modal medium -->
<div class="modal fade" id="formTambahBank" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formBankksoalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formBanksoalLabel">Tambah Bank Soal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body card-block">
						<form class="form-horizontal" method="post" action="<?= base_url('guru/tambahBanksoal/'); ?><?= $kelas['id_kelas'] ?>">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="banksoal" class=" form-control-label">Banksoal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="banksoal" name="banksoal" placeholder="" class="form-control">
									<!-- <small class="form-text text-danger"><?= form_error('nama_kelas') ?></small> -->
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
<div class="modal fade" id="formUbahBank" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formBankksoalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formBanksoalLabel">Ubah Bank Soal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body card-block">
						<form class="form-horizontal" method="post" action="<?= base_url('guru/ubahBanksoal/' . $kelas['id_kelas']) ?>">
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="banksoal" class=" form-control-label">Banksoal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="hidden" id="i" name="i" value="" placeholder="" class="form-control">
									<input type="hidden" id="i_k" name="i_k" value="" placeholder="" class="form-control">
									<input type="text" required id="bs" name="bs" value="" placeholder="" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" id="btn-simpan" class="btn btn-success">Ubah</button>
								<button type="reset" id="btn-batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
