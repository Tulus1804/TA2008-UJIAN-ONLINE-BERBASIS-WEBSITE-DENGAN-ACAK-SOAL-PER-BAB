<div class="row-fluid">
    <div class="mx-auto">
        <div class="mx-auto col-lg-6 mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah soal</strong> - <?= $kelas['nama_kelas'] ?>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body card-block">
                    <form action="<?= base_url() ?> /guru/tambahsoal/<?= $banksoal['id'] . '/' . $kelas['id_kelas'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
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
                                <input type="number" id="bobot" name="bobot" value="" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">File</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file" name="file" value="" class="form-control-file">
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
                                <input type="file" id="file_a" name="file_a" value="" class="form-control-file">
                                <hr>
                                <textarea class="form-control" name="pil_a" id="pil_a" cols="10" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pilihan B</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file_b" name="file_b" value="" class="form-control-file">
                                <hr>
                                <textarea class="form-control" name="pil_b" id="pil_b" cols="10" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pilihan C</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file_c" name="file_c" value="" class="form-control-file">
                                <hr>
                                <textarea class="form-control" name="pil_c" id="pil_c" cols="10" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pilihan D</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file_d" name="file_d" value="" class="form-control-file">
                                <hr>
                                <textarea class="form-control" name="pil_d" id="pil_d" cols="10" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kunci Jawaban</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select required="required" name="jawaban" id="jawaban" class="form-control" style="width:100%!important">
                                    <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions form-group">
                            <div class="col">
                                <button type="submit" class="btn btn-lg btn-primary btn-sm">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>