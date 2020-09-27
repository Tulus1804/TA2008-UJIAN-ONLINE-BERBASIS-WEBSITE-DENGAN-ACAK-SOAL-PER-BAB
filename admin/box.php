<div class="container-fluid">
  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <?php

      include 'koneksi.php';
      $sqluser = mysqli_query($koneksi, "SELECT * FROM user");
      $rowuser = mysqli_num_rows($sqluser);

      $sqlguru = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
      $rowguru = mysqli_num_rows($sqlguru);

      $sqlsiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
      $rowsiswa = mysqli_num_rows($sqlsiswa);

      ?>
      <li class="bg_lb"> <a href="index.php?page=user"> <i class="icon-dashboard"></i> <span class="label label-important"><?php echo $rowuser ?></span>User</a> </li>
      <li class="bg_ly span3"> <a href="index.php?page=guru"> <i class="icon-user"></i><span class="label label-important"><?php echo $rowguru ?></span>Guru & Karyawan</a></li>
      <li class="bg_lb span3"> <a href="index.php?page=siswa"> <i class="icon-user"></i><span class="label label-important"><?php echo $rowsiswa ?></span>Siswa</a></li>


    </ul>
  </div>