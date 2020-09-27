<?php if ($_GET['page'] == "tambahuser") { ?>

	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span6">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>From Tambah User</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="crud/user/create.php" method="POST" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">ID. User :</label>
								<div class="controls">
									<input type="text" class="span11" name="iduser" placeholder="ID. User" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama User :</label>
								<div class="controls">
									<input type="text" class="span11" name="namauser" placeholder="Nama User" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password :</label>
								<div class="controls">
									<input type="password" class="span11" name="pass" placeholder="Password" required />
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php if ($_GET['page'] == "ubahuser") {
	$id = $_GET['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
	while ($data = mysqli_fetch_array($sql)) {
?>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span6">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Form Ubah User</h5>
						</div>
						<div class="widget-content nopadding">
							<form action="crud/user/update.php" method="POST" class="form-horizontal">
								<div class="control-group">
									<label class="control-label">Nama User :</label>
									<div class="controls">
										<input type="text" class="span11" value="<?php echo $data['name'] ?>" name="name" placeholder="Nama User" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls">
										<input type="email" class="span11" value="<?php echo $data['email'] ?>" name="email" placeholder="Email" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password :</label>
									<div class="controls">
										<input type="password" autocomplete="off" class="span11" name="pass" placeholder="Password" required />
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php }
} ?>


<?php if ($_GET['page'] == "tambahguru") { ?>

	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span10">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>From Tambah Guru</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="crud/guru/create.php" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">NIP :</label>
								<div class="controls">
									<input type="text" class="span11" name="nip" placeholder="NIP" maxlength="15" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Foto :</label>
								<div class="controls">
									<input type="file" class="span11" name="foto" placeholder="Foto" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama :</label>
								<div class="controls">
									<input type="text" class="span11" name="nama" placeholder="Nama Guru" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email :</label>
								<div class="controls">
									<input type="email" class="span11" name="email" placeholder="Email" email required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Jenis Kelamin :</label>
								<div class="controls">
									<select required name="jk">
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tempat Lahir :</label>
								<div class="controls">
									<input type="text" class="span11" name="tmp_lahir" placeholder="Tempat Lahir" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tanggal Lahir :</label>
								<div class="controls">
									<input type="date" class="span11" name="tgl_lahir" placeholder="Tanggal Lahir" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Alamat :</label>
								<div class="controls">
									<input type="text" class="span11" name="alamat" placeholder="Alamat" required />
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php if ($_GET['page'] == "ubahguru") {
	$id = base64_decode($_GET['id_guru']);
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_guru = '$id'");
	while ($data = mysqli_fetch_array($sql)) {
?>

		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span10 mx-auto">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>From Ubah Guru</h5>
						</div>
						<div class="widget-content nopadding">
							<form action="crud/guru/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
								<input type="hidden" name="id" class="span11" value="<?= $data['id_guru'] ?>" />
								<div class="control-group">
									<label class="control-label">NIP :</label>
									<div class="controls">
										<input type="text" name="nip" id="nip" readonly class="span11" value="<?= $data['nomor_induk'] ?>" placeholder="NIP" required />
									</div>
								</div>
								<input type="hidden" name="foto_lama" class="span11" value="<?= $data['foto'] ?>" />
								<div class="control-group">
									<label class="control-label">Foto :</label>
									<div class="controls">
										<input type="file" name="foto" class="span11" placeholder="Foto" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Nama Guru :</label>
									<div class="controls">
										<input type="text" name="nama" class="span11" value="<?= $data['nama'] ?>" placeholder="Nama Guru" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input type="email" name="email" class="span11" value="<?= $data['email'] ?>" placeholder="Email" email required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Jenis Kelamin :</label>
									<div class="controls">
										<select name="jk" required>
											<option value="<?= $data['jk'] ?>">
												<?php
												$jk = "";
												if ($data['jk'] == "L") {
													$jk = "Laki-Laki";
												} else {
													$jk = "Perempuan";
												}
												echo $jk;
												?>
											</option>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Tempat Lahir :</label>
									<div class="controls">
										<input type="text" name="tmp_lahir" class="span11" value="<?= $data['tmp_lahir'] ?>" placeholder="Tempat Lahir" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Tanggal Lahir :</label>
									<div class="controls">
										<input type="date" name="tgl_lahir" class="span11" value="<?= $data['tgl_lahir'] ?>" placeholder="Tanggal Lahir" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Alamat :</label>
									<div class="controls">
										<input type="text" name="alamat" class="span11" value="<?= $data['alamat'] ?>" placeholder="Alamat" required />
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php }
} ?>

<?php if ($_GET['page'] == "tambahsiswa") { ?>

	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span10">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>From Tambah Siswa</h5>
					</div>
					<div class="widget-content nopadding">
						<?php
						if (isset($_GET["hasil"])) {
							if ($_GET["hasil"] == "gagal") {
								echo "Email sudah digunakan!";
							}
						}
						?>
						<form action="crud/siswa/create.php" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">NIS :</label>
								<div class="controls">
									<input type="text" class="span11" name="nis" placeholder="NIS" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Foto :</label>
								<div class="controls">
									<input type="file" class="span11" name="foto" placeholder="Foto" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama :</label>
								<div class="controls">
									<input type="text" class="span11" name="nama" placeholder="Nama Siswa" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email :</label>
								<div class="controls">
									<input type="email" class="span11" name="email" placeholder="Email" email required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Jenis Kelamin :</label>
								<div class="controls">
									<select required name="jk">
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tempat Lahir :</label>
								<div class="controls">
									<input type="text" class="span11" name="tmp_lahir" placeholder="Tempat Lahir" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tanggal Lahir :</label>
								<div class="controls">
									<input type="date" class="span11" name="tgl_lahir" placeholder="Tanggal Lahir" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Alamat :</label>
								<div class="controls">
									<input type="text" class="span11" name="alamat" placeholder="Alamat" required />
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" name="simpan" class="btn btn-success" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<?php if ($_GET['page'] == "ubahsiswa") {
	$id_siswa = $_GET['id_siswa'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'");
	while ($data = mysqli_fetch_array($sql)) {
?>

		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span10">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>From Ubah Siswa</h5>
						</div>
						<div class="widget-content nopadding">
							<form action="crud/siswa/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
								<input type="hidden" name="id" class="span11" value="<?= $data['id_siswa'] ?>" />
								<div class="control-group">
									<label class="control-label">NIS :</label>
									<div class="controls">
										<input type="text" readonly class="span11" name="nis" value="<?php echo $data['no_induk'] ?>" placeholder="NIS" required />
									</div>
								</div>
								<input type="hidden" class="span11" name="foto_lama" value="<?= $data['foto'] ?>" />
								<div class="control-group">
									<label class="control-label">Foto :</label>
									<div class="controls">
										<input type="file" class="span11" name="foto" placeholder="Foto" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Nama Siswa :</label>
									<div class="controls">
										<input type="text" class="span11" name="nama" value="<?php echo $data['nama'] ?>" placeholder="Nama Siswa" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls">
										<input type="text" class="span11" name="email" value="<?php echo $data['email'] ?>" placeholder="Email" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Jenis Kelamin :</label>
									<div class="controls">
										<select required name="jk">
											<option value="<?= $data['jk'] ?>">
												<?php
												$jk = "";
												if ($data['jk'] == "L") {
													$jk = "Laki-Laki";
												} else {
													$jk = "Perempuan";
												}
												echo $jk;
												?>
											</option>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Tempat Lahir :</label>
									<div class="controls">
										<input type="text" class="span11" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?>" placeholder="Tempat Lahir" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Tanggal Lahir :</label>
									<div class="controls">
										<input type="date" class="span11" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>" placeholder="Tanggal Lahir" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Alamat :</label>
									<div class="controls">
										<input type="text" class="span11" name="alamat" value="<?php echo $data['alamat'] ?>" placeholder="Alamat" required />
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php }
} ?>

