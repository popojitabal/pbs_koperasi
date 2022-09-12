<div class="row">
    <div class="col-lg-12">
        <h4>Master Data Pekerja/Nasabah</h4>
    </div>
    <div class="col-12 mt-5">
        <form id="form-input-karyawan" action="<?=base_url('master/c_master/createKaryawan')?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Data</h6>
                    <hr>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status_karyawan" id="status_karyawan" class="form-control form-control-sm selectize_this">
                            <option value="0">Nasabah</option>
                            <option value="1">Pekerja</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama_karyawan" id="nama_karyawan">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">PN</label>
                        <input type="text" class="form-control form-control-sm" name="no_induk" id="no_induk">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form id="form-update-karyawan" style="display: none;" action="<?=base_url('master/c_master/updateKaryawan')?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_mst_karyawan" id="update-id_mst_karyawan">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Toko</h6>
                    <hr>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select style="width: 100%;" name="status_karyawan" id="update-status_karyawan" class="reset form-control form-control-sm selectize_this">
                            <option value="0">Nasabah</option>
                            <option value="1">Pekerja</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="reset form-control form-control-sm" name="nama_karyawan" id="update-nama_karyawan">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">PN</label>
                        <input type="text" class="reset form-control form-control-sm" name="no_induk" id="update-no_induk">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_toko">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Status</th>
                <th>Nama</th>
                <th>PN</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach($list_karyawan as $lk): ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$lk['status_karyawan'] == 1 ? 'Pekerja' : 'Nasabah'?></td>
                        <td><?=$lk['nama_karyawan']?></td>
                        <td><?=$lk['no_induk']?></td>
                        <td>
                            <!-- action -->
                            <button class="btn btn-sm btn-secondary update_karyawan" type="button" data-toggle="tooltip"
                            data-id_mst_karyawan="<?=$lk['id_mst_karyawan']?>" 
                            data-status_karyawan="<?=$lk['status_karyawan']?>" 
                            data-nama_karyawan="<?=$lk['nama_karyawan']?>" 
                            data-no_induk="<?=$lk['no_induk']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('master/c_master/deleteKaryawan/'.$lk['id_mst_karyawan']) ?>" onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php $no++; endforeach?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function(){

        $('.update_karyawan').on('click', function(){
            const data = $(this).data();
            $('#form-input-karyawan').hide('fast')
            $('#form-update-karyawan').show('fast')
            $('#update-id_mst_karyawan').val(data.id_mst_karyawan);
            $('#update-nama_karyawan').val(data.nama_karyawan);
            $('#update-status_karyawan').val(data.status_karyawan);
            $('#update-no_induk').val(data.no_induk);
        });

        $('#batal_ubah_karyawan').on('click', function(){
            $('#form-update-karyawan').hide('fast')
            $('#form-input-karyawan').show('fast');
            $('.reset').val('');
        })
    })
</script>