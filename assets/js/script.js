$(function () {

	setInterval(function () {
		var date = new Date();
		var h = date.getHours(),
			m = date.getMinutes(),
			s = date.getSeconds();
		h = ("0" + h).slice(-2);
		m = ("0" + m).slice(-2);
		s = ("0" + s).slice(-2);

		var time = h + ":" + m + ":" + s;
		$('.live-clock').html(time);
	}, 1000);

	$('.tampilUbahBanksoal').on('click', function () {

		const id_bank = $(this).data('id');

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getubahbanksoal',
			data: {
				id_bank: id_bank
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#i').val(data.id);
				$('#i_k').val(data.id_kelas);
				$('#bs').val(data.banksoal);
			}
		});
	});

	$('.tampilFormUbah').on('click', function () {
		$('#formKelasLabel').html('Ubah Kelas');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/tugas-akhir/guru/ubahKelas');

		const id_kelas = $(this).data('id');

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getubahkelas',
			data: {
				id_kelas: id_kelas
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_kelas').val(data.id_kelas);
				$('#id_user').val(data.id_user);
				$('#nama_kelas').val(data.nama_kelas);
				$('#mapel').val(data.mapel);
				$('#deskripsi').val(data.deskripsi);
			}
		});
	});

	$('.tampilFormTambah').on('click', function () {
		$('#formKelasLabel').html('Tambah Kelas');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', 'http://localhost/tugas-akhir/guru/tambahKelas');

		$('#id_kelas').val('');
		$('#id_user').val('');
		$('#nama_kelas').val('');
		$('#mapel').val('');
		$('#deskripsi').val('');

	});

	$('.detailAnggota').on('click', function () {

		const nis = $(this).data('nis');

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getdataanggota',
			data: {
				nis: nis
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.card-body img').attr('src', 'http://localhost/tugas-akhir/uploads/img/' + data.role_id + '/' + data.image);
				$('#nama').html(data.name);
				$('#nis').html(data.no_induk);
				$('#alamat').html(data.alamat);
			}
		});
	});



	$('.ubahSoal').on('click', function () {


		const id_bank = $(this).data('id_bank');
		const id_kelas = $(this).data('id_kelas');

		$('#formSoalLabel').html('Ubah Soal');
		$('.modal-body button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/tugas-akhir/guru/ubahsoal/' + id_bank + '/' + id_kelas + '');

		const id_soal = $(this).data('id');

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getubahsoal',
			data: {
				id_soal: id_soal
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_soal').val(data.id_soal);
				$('#id_bank').val(data.id_bank);
				$('#bobot').val(data.bobot);
				$('#file_lama').val(data.file);
				$('#soal').val(data.soal);
				$('#jawaban').val(data.jawaban);
				$('#pil_a').val(data.opsi_a);
				$('#pil_b').val(data.opsi_b);
				$('#pil_c').val(data.opsi_c);
				$('#pil_d').val(data.opsi_d);
				$('#pil_e').val(data.opsi_e);
			}
		});
	});

	$('.tambahSoal').on('click', function () {
		const id_bank = $(this).data('id_bank');
		const id_kelas = $(this).data('id_kelas');

		$('#formSoalLabel').html('Tambah Soal');
		$('.modal-body button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', 'http://localhost/tugas-akhir/guru/tambahsoal/' + id_bank + '/' + id_kelas);

		$('#id_soal').val('');
		$('#bobot').val('');
		$('#file_lama').val('');
		$('#soal').val('');
		$('#jawaban').val('');
		$('#pil_a').val('');
		$('#pil_b').val('');
		$('#pil_c').val('');
		$('#pil_d').val('');
		$('#pil_e').val('');
	});

	$('.detailSoal').on('click', function () {

		const id_soal = $(this).data('id');
		var badge = '<span class="badge badge-primary"><i class="fa fa-check"></i></span>';

		$.ajax({
			url: 'http://localhost/tugas-akhir/guru/getdatasoal',
			data: {
				id_soal: id_soal
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.modal-body img').attr('src', 'http://localhost/tugas-akhir/uploads/soal/' + data.file);
				$('#det_soal').html(data.soal);
				$('#det_bobot').html('bobot soal: ' + data.bobot);

				$('#det_pil_a').html('A. ' + data.opsi_a);
				$('#det_pil_b').html('B. ' + data.opsi_b);
				$('#det_pil_c').html('C. ' + data.opsi_c);
				$('#det_pil_d').html('D. ' + data.opsi_d);
				$('#det_pil_e').html('D. ' + data.opsi_e);
				if (data.jawaban == 'a') {
					$('#det_pil_a').html('A. ' + data.opsi_a + '' + badge);
				} else if (data.jawaban == 'b') {
					$('#det_pil_b').html('B. ' + data.opsi_b + '' + badge);
				} else if (data.jawaban == 'c') {
					$('#det_pil_c').html('C. ' + data.opsi_c + '' + badge);
				} else if (data.jawaban == 'd') {
					$('#det_pil_d').html('D. ' + data.opsi_d + '' + badge);
				} else {
					$('#det_pil_e').html('E. ' + data.opsi_d + '' + badge);
				}

				let tgl_buat = new Date(1000 * data.date_created);

				let get_tgl_ubah = data.date_updated;
				var options = {
					weekday: 'long',
					day: 'numeric',
					month: 'long',
					year: 'numeric',
				}
				$('#tgl_buat').html('Dibuat: ' + tgl_buat.toLocaleString('id', options));
				if (get_tgl_ubah == 0) {
					$('#tgl_update').html('Diubah: -');
				} else {
					let tgl_ubah = new Date(1000 * get_tgl_ubah);
					$('#tgl_update').html('Diubah: ' + tgl_ubah.toLocaleString('id', options));
				}


			}
		});
	});


	$('.froala-editor').froalaEditor({
		theme: 'royal',
		quickInsertTags: null,
		charCount: false,
		toolbarButtons: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough', 'underline', 'subscript', 'superscript', '|', 'align', 'insertTable', 'insertLink', 'formatOL', 'formatUL', '|', 'html']
	});
});
