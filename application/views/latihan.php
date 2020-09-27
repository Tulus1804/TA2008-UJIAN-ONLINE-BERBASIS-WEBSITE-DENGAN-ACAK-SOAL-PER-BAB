<p>LATIHAN!</p>

<button type="button" class="btn-primary" id="tombol">KLIK</button>
<script>
    $('#tombol').on('click', function() {
        Swal('Gagal', 'Token harus diisi', 'error');
    });
</script>