$(document).ready(function () {


	function tglIndo(string) {
		bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

		date = string.split(" ")[0];
		time = string.split(" ")[1];

		tanggal = date.split("-")[2];
		bulan = date.split("-")[1];
		tahun = date.split("-")[0];

		return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun + " " + time;
	}

	$('.detailUjian').on('click', function () {

		const id_ujian = $(this).data('id');

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getdataujian',
			data: {
				id_ujian: id_ujian
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				$('#nama_guru').html(data.nama);
				$('#kelas_mapel').html(data.nama_kelas + ' / ' + data.mapel);
				$('#nama_ujian').html(data.nama_ujian);
				$('#jumlah_soal').html(data.jml_soal);
				$('#jenis_soal').html(data.jenis);
				$('#waktu').html(data.waktu + ' Menit');
				$('#kode_kelas').html(data.kd_ujian);
				$('#mulai').html(tglIndo(data.tgl_mulai));
				$('#akhir').html(tglIndo(data.tgl_akhir));

				$('#btn-lihat-hasil').on('click', function () {
					location.href = 'http://localhost/tugas-akhir/guru/hasilujian/' + data.id_ujian;
				});

			}
		});
	});



});
