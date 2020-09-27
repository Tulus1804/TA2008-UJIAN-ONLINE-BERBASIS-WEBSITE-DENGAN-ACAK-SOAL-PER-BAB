<div class="section__content  section__content--p30" style="background-color: #EBEBEB;">
	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto m-t-20">
				<div class="shadow-lg mb-5 bg-white rounded">
					<div class="card-header">Kelas<strong> <?= $kelas['nama_kelas']; ?></strong></div>
					<div class="card-body m-l-20 m-r-20">
						<h4><?= $banksoal['banksoal'] ?> || <?= $kelas['mapel'] ?></h4>
						<p><?= $kelas['name'] ?></p>
						<div class="overview-wrap">
							<p></p>
							<button data-toggle="modal" data-target="#formTambahSoal" class="item tambahSoal" data-id_bank="<?= $banksoal['id'] ?>" data-id_kelas="<?= $banksoal['id_kelas'] ?>" title="Tambah Soal" data-placement="top">
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
										Soal <strong>berhasil</strong> <?= $this->session->flashdata('message') ?>!
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
								<?php foreach ($soal as $soal) : ?>
									<tr class="tr-shadow shadow-sm table-bordered">
										<td>
											<p><?= $soal['soal'] ?></p>
											<span class="text">Bobot : <?= $soal['bobot'] ?></span>
										</td>
										<td>
											<div class="table-data-feature">

												<button data-toggle="modal" data-target="#formTambahSoal" class="item ubahSoal" data-id="<?= $soal['id_soal'] ?>" data-id_bank="<?= $banksoal['id'] ?>" data-id_kelas="<?= $banksoal['id_kelas'] ?>" title="Edit soal" data-placement="top">
													<i class="fa fa-edit"></i>
												</button>
												<a href="<?= base_url('guru/hapussoal/' . $soal['id_soal'] . '/' . $banksoal['id'] . '/' . $banksoal['id_kelas'])  ?>" class="item" data-toggle="tooltip" onclick="return confirm('Yakin ?')" title="Hapus Soal">
													<i class="zmdi zmdi-delete"></i>
												</a>
												<button class="item detailSoal" data-id="<?= $soal['id_soal'] ?>" data-toggle="modal" data-target="#detailSoal" data-placement="top" title="Detail Soal">
													<i class="zmdi zmdi-more"></i>
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
<div class="modal fade" id="formTambahSoal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formSoalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formSoalLabel">Tambah Soal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body card-block">
						<form action="<?= base_url('guru/tambahsoal/' . $banksoal['id'] . '/' . $kelas['id_kelas']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="row form-group">
								<input type="hidden" id="id_soal" name="id_soal" value="" class="form-control">
								<input type="hidden" id="id_kelas" name="id_kelas" value="<?= $banksoal['id_kelas'] ?>" class="form-control">
								<div class="col col-md-3">
									<label for="text-input" class="form-control-label">Bank soal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="hidden" id="id_bank" name="id_bank" value="<?= $banksoal['id'] ?>" class="form-control">
									<input type="text" id="bank" name="bank" value="<?= $banksoal['banksoal'] ?>" class="form-control" readonly>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Bobot Soal</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="number" id="bobot" name="bobot" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="file-input" class=" form-control-label">File</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="hidden" id="file_lama" name="file_lama" class="form-control-file">
									<input type="file" id="file" name="file" class="form-control-file">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Soal</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="soal" id="soal" cols="35" rows="15" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Pilihan A</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="pil_a" id="pil_a" cols="10" rows="5" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Pilihan B</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="pil_b" id="pil_b" cols="10" rows="5" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Pilihan C</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="pil_c" id="pil_c" cols="10" rows="5" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Pilihan D</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="pil_d" id="pil_d" cols="10" rows="5" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Pilihan E</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea class="form-control" name="pil_e" id="pil_e" cols="10" rows="5" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Kunci Jawaban</label>
								</div>
								<div class="col-12 col-md-9">
									<select required="required" name="jawaban" id="jawaban" class="form-control" style="width:100%!important">
										<option value="" disabled selected>Pilih Kunci Jawaban</option>
										<option value="a">A</option>
										<option value="b">B</option>
										<option value="c">C</option>
										<option value="d">D</option>
										<option value="e">E</option>
									</select>
								</div>
							</div>
							<button type="submit" class="btn btn-lg btn-primary">Tambah</button>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- detail soal-->
<div class="modal fade" id="detailSoal" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailSoalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailSoalLabel">Detail soal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<img id="file" src="" class="card-img-top" alt="">
					<div class="card-body">
						<strong id="det_soal" class="card-text"></strong>
						<hr>
						<p id="det_bobot" class="card-text"></p>
						<p id="tgl_buat" class="card-text"></p>
						<p id="tgl_update" class="card-text"></p>
					</div>
					<br>
					<ul class="list-group list-group-flush">
						<li id="det_pil_a" class="list-group-item d-flex justify-content-between align-items-center">
						</li>
						<li id="det_pil_b" class="list-group-item d-flex justify-content-between align-items-center">
						</li>
						<li id="det_pil_c" class="list-group-item d-flex justify-content-between align-items-center">
						</li>
						<li id="det_pil_d" class="list-group-item d-flex justify-content-between align-items-center">
						</li>
						<li id="det_pil_e" class="list-group-item d-flex justify-content-between align-items-center">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
