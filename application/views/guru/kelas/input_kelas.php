<!-- modal medium -->
<div class="modal fade" id="formTambahKelas" tabindex="-1" role="dialog" aria-labelledby="tambahKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-block">
                        <form method="post" action="<?= base_url('guru/tambahKelas'); ?>" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nip" class=" form-control-label">Nama Kelas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="nama_kelas" name="nama_kelas" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="desktipsi" class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="deskripsi" id="deskripsi" rows="9" placeholder="Content..." class="form-control"></textarea>
                                    <span class="help-block text-danger validasi-mapel">Deskripsi belum diisi</span>
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