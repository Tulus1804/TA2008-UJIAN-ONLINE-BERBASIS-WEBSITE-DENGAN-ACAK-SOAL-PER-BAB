<?php if ($_GET['page'] == "user") { ?>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<!-- <span><a class="btn btn-mini btn-success" href="index.php?page=tambahuser">Tambah</a></span> -->
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
						<h5>Tabel Data User</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>Foto</th>
									<th>Email</th>
									<th>Status</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = mysqli_query($koneksi, "SELECT * FROM user join role ON user.role_id = role.role_id");
								while ($data = mysqli_fetch_array($sql)) {
								?>
									<tr class="gradeX">
										<td>
											<p class="text-center"><?= $i ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['name'] ?></p>
										</td>
										<td>
											<p class="text-center"><img src="../uploads/img/<?= $data['role_id'] ?>/<?= $data['image'] ?>" alt="<?= $data['image'] ?>" class="img-circle" width=50px height=50px></p>
										</td>
										<td>
											<p class="text-center"><?= $data['email'] ?></p>
										</td>
										<td>
											<?php if ($data['is_active'] == 1) : ?>
												<p class="text-center"><span class="badge badge-success">Aktif</span></p>
											<?php else : ?>
												<p class="text-center"><span class="badge badge-danger">Aktif</span></p>
											<?php endif; ?>
										</td>
										<td>
											<p class="text-center"><?= $data['role'] ?></p>
										</td>

										<td>
											<p class="text-center">
												<a class="btn btn-mini btn-danger" href="crud/user/delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
											</p>
										</td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php if ($_GET['page'] == "guru") { ?>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<span><a class="btn btn-mini btn-success" href="index.php?page=tambahguru">Tambah</a></span>
				<span><a class="btn btn-mini btn-primary" href="crud/guru/cetak.php" target="_BLANK">Cetak</a></span>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
						<h5>Tabel Data Guru & Karyawan</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Email</th>
									<th>L/P</th>
									<th>Tempat, Tanggal Lahir</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
								while ($data = mysqli_fetch_array($sql)) {
								?>
									<tr class="gradeX">
										<td>
											<p class="text-center"><?= $i ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['nomor_induk'] ?></p>
										</td>
										<td>
											<p class="text-center"><img src="../uploads/img/2/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>" class="img-circle" width=50px height=50px></p>
										</td>
										<td>
											<p class="text-center"><?= $data['nama'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['email'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['jk'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['tmp_lahir'] . ", " . date("d-M-Y", strtotime($data['tgl_lahir'])) ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['alamat'] ?></p>
										</td>
										<td>
											<p class="text-center">
												<?php
												$email = $data['email'];
												$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' ");
												$ada = mysqli_num_rows($cek);
												if ($ada > 0) :
												?>
												<?php else : ?>
													<a class="btn btn-mini btn-info" href="crud/guru/create_user.php?&id_guru=<?= $data['id_guru'] ?>" onclick="return confirm('Apakah anda yakin ? NIP digunakan sebagai password')">Aktif</a> &nbsp;
													&nbsp;
												<?php endif; ?>
												<a class="btn btn-mini btn-primary" href="index.php?page=ubahguru&id_guru=<?= base64_encode($data['id_guru']) ?>">Ubah</a> &nbsp;
												<a class="btn btn-mini btn-danger" href="crud/guru/delete.php?id_guru=<?= base64_encode($data['id_guru']) ?>" onclick="return confirm('Apakah anda yakin ?')">Hapus</a>
											</p>
										</td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php if ($_GET['page'] == "siswa") { ?>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<span><a class="btn btn-mini btn-success" href="index.php?page=tambahsiswa">Tambah</a></span>
				<span><a class="btn btn-mini btn-primary" href="crud/siswa/cetak.php" target="_BLANK">Cetak</a></span>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
						<h5>Tabel Data Siswa</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>No</th>
									<th>NIS</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Email</th>
									<th>L/P</th>
									<th>Tempat, Tanggal Lahir/P</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
								while ($data = mysqli_fetch_array($sql)) {
								?>
									<tr class="gradeX">
										<td>
											<p class="text-center"></p><?= $i ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['no_induk'] ?></p>
										</td>
										<td>
											<p class="text-center"><img src="../uploads/img/3/<?= $data['foto'] ?>" class="img-circle" alt="<?php echo $data['foto'] ?>" width=50px height=50px></p>
										</td>
										<td>
											<p class="text-center"><?= $data['nama'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['email'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['jk'] ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['tmp_lahir'] . ", " . date("d-M-Y", strtotime($data['tgl_lahir'])) ?></p>
										</td>
										<td>
											<p class="text-center"><?= $data['alamat'] ?></p>
										</td>
										<td>
											<p class="text-center">
												<?php
												$email = $data['email'];
												$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' ");
												$ada = mysqli_num_rows($cek);
												if ($ada > 0) :
												?>
													&nbsp;
												<?php else : ?>
													<a class="btn btn-mini btn-info" href="crud/siswa/create_user.php?&id_siswa=<?= $data['id_siswa'] ?>" onclick="return confirm('Apakah anda yakin ? NIP digunakan sebagai password')">Aktif</a>
													&nbsp;
												<?php endif; ?>
												<a class="btn btn-mini btn-primary" href="index.php?page=ubahsiswa&id_siswa=<?= $data['id_siswa'] ?>">Ubah</a> &nbsp;
												<a class="btn btn-mini btn-danger btn-hapus" href="crud/siswa/delete.php?id_siswa=<?= $data['id_siswa'] ?>" onclick="return confirm('Apakah anda Yakin ?')">Hapus</a>
											</p>
										</td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
