<?php

include '../../koneksi.php';
require_once("../../dompdf/autoload.inc.php");


use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from tb_karyawan");
$html = '<center><h3>Daftar Guru</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>NIP</th>
<th>Foto</th>
<th>Nama</th>
<th>Email</th>
<th>L/P</th>
<th>Tempat, Tanggal Lahir</th>
<th>Alamat</th>
 </tr>';
$no = 1;
while ($data = mysqli_fetch_array($query)) {
	$html .= "<tr>
 <td>" . $no . "</td>
 <td>" . $data['nomor_induk'] . "</td>
 <td><img src='../../../uploads/img/2/" . $data['foto'] . "class='img-circle' width=50px height=50px></td>
 <td>" . $data['nama'] . "</td>
 <td>" . $data['email'] . "</td>
 <td>" . $data['jk'] . "</td>
 <td>" . $data['tmp_lahir'] . ", " . date("d-M-Y", strtotime($data['tgl_lahir'])) . "</td>
 <td>" . $data['alamat'] . "</td>
 </tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('data_guru.pdf');
