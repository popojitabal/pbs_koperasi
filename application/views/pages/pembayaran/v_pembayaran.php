<div class="row">
    <div class="col-lg-12">
        <h4>Pembayaran</h4>
    </div>
    <div class="col-12 mt-5">
        <form id="form-input-pembayaran" action="<?=base_url('pembayaran/c_pembayaran/createPembayaran')?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Data</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Debitur (PN)</label>
                        <select name="id_mst_karyawan" id="id_mst_karyawan" class="form-control form-control-sm selectize_this">
                            <option value="">--Pilih Debitur--</option>
                            <?php foreach($list_karyawan as $lk) : ?>
                                <option value="<?=$lk['id_mst_karyawan']?>"><?=$lk['nama_karyawan']?> (<?=$lk['no_induk']?>)</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Tanggal Pembayaran</label>
                        <input step="any" type="datetime-local" class="form-control form-control-sm" name="tgl_pembayaran" id="tgl_pembayaran" value="<?=date('Y-m-d h:i:s')?>">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Periode Bulan</label>
                        <div class="input-group">
                            <select name="periode_bulan" id="periode_bulan" class="form-control form-control-sm">
                                <?php foreach(listBulan() as $number => $text) : ?>
                                    <option value="<?=$number?>" <?= $number == (int) date('m') ? 'selected' : '' ?>><?=$text?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="number" name="periode_tahun" id="periode_tahun" value="<?=date('Y')?>" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Nominal (Rp.)</label>
                        <input type="number" class="form-control form-control-sm" name="nominal" id="nominal">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control form-control-sm">
                            <option value="gaji">Gaji</option>
                            <option value="bunga">Bunga</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form id="form-update-pembayaran" style="display: none;" action="<?=base_url('pembayaran/c_pembayaran/updatePembayaran')?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_trx_pembayaran" id="update-id_trx_pembayaran">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Data</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Debitur (PN)</label>
                        <select style="width: 100%;" name="id_mst_karyawan" id="update-id_mst_karyawan" class="reset form-control form-control-sm selectize_this">
                            <option value="">--Pilih Debitur--</option>
                            <?php foreach($list_karyawan as $lk) : ?>
                                <option value="<?=$lk['id_mst_karyawan']?>"><?=$lk['nama_karyawan']?> (<?=$lk['no_induk']?>)</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Tanggal Pembayaran</label>
                        <input step="any" type="datetime-local" class="reset form-control form-control-sm" name="tgl_pembayaran" id="update-tgl_pembayaran" value="<?=date('Y-m-d h:i:s')?>">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Periode Bulan</label>
                        <div class="input-group">
                            <select name="periode_bulan" id="update-periode_bulan" class="reset form-control form-control-sm">
                                <?php foreach(listBulan() as $number => $text) : ?>
                                    <option value="<?=$number?>" <?= $number == (int) date('m') ? 'selected' : '' ?>><?=$text?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="number" name="periode_tahun" id="update-periode_tahun" value="<?=date('Y')?>" class="reset form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Nominal (Rp.)</label>
                        <input type="number" class="reset form-control form-control-sm" name="nominal" id="update-nominal">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="update-jenis_pembayaran" class="reset form-control form-control-sm">
                            <option value="gaji">Gaji</option>
                            <option value="bunga">Bunga</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_pembayaran">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Nama Debitur</th>
                <th>Tgl. Pembayaran</th>
                <th>Periode</th>
                <th>Nominal</th>
                <th>Jenis Pembayaran</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach($list_pembayaran as $lp): $metadata = json_decode($lp['metadata'], true); ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$metadata['nama_karyawan']?> (<?=$metadata['no_induk']?>)</td>
                        <td><?=formatDateTime($lp['tgl_pembayaran'])?></td>
                        <td><?=formatPeriode($lp['periode'])?></td>
                        <td><?=$lp['nominal']?></td>
                        <td><?=ucfirst($lp['jenis_pembayaran'])?></td>
                        <td>
                            <!-- action -->
                            <button class="btn btn-sm btn-secondary update_pembayaran" type="button" data-toggle="tooltip"
                            data-id_trx_pembayaran="<?=$lp['id_trx_pembayaran']?>" 
                            data-id_mst_karyawan="<?=$lp['id_mst_karyawan']?>" 
                            data-tgl_pembayaran="<?=$lp['tgl_pembayaran']?>" 
                            data-periode_bulan="<?=formatBulanInt($lp['periode'])?>" 
                            data-periode_tahun="<?=formatTahun($lp['periode'])?>" 
                            data-nominal="<?=$lp['nominal']?>" 
                            data-jenis_pembayaran="<?=$lp['jenis_pembayaran']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('pembayaran/c_pembayaran/deletePembayaran/'.$lp['id_trx_pembayaran']) ?>" onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger">
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

        $('.update_pembayaran').on('click', function(){
            const data = $(this).data();
            $('#form-input-pembayaran').hide('fast')
            $('#form-update-pembayaran').show('fast')
            $('#update-id_trx_pembayaran').val(data.id_trx_pembayaran)
            $('#update-id_mst_karyawan').val(data.id_mst_karyawan).trigger('change')
            $('#update-tgl_pembayaran').val(data.tgl_pembayaran)
            $('#update-periode_bulan').val(data.periode_bulan)
            $('#update-periode_tahun').val(data.periode_tahun)
            $('#update-nominal').val(data.nominal)
            $('#update-jenis_pembayaran').val(data.jenis_pembayaran)
        });

        $('#batal_ubah_pembayaran').on('click', function(){
            $('#form-update-pembayaran').hide('fast')
            $('#form-input-pembayaran').show('fast');
            $('.reset').val('');
        })
    })
</script>