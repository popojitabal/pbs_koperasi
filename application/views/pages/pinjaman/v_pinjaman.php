<div class="row">
    <!-- <div class="col-12">
        <a href="#" class="btn btn-sm btn-primary btn-nav-custom">Barang</a>
        <a href="<?= base_url('pembelian/c_pembelian') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Beli</a>
        <a href="<?= base_url('pembelian/c_pembelian/toko') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Toko</a>
    </div> -->
    <div class="col-12 mt-5">
        <form id="form-input-pinjaman" action="<?= base_url('pinjaman/c_pinjaman/createPinjaman') ?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Pinjaman Baru</h6>
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
                        <label for="">Tanggal Pinjam</label>
                        <input step="any" type="datetime-local" class="form-control form-control-sm" name="tgl_pinjam" id="tgl_pinjam" value="<?=date('Y-m-d h:i:s')?>">
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
                        <label for="">Tenor</label>
                        <input type="number" class="form-control form-control-sm" name="tenor" id="tenor">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Bunga (%)</label>
                        <input type="number" class="form-control form-control-sm" name="bunga" id="bunga">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form style="display: none;" id="form-update-pinjaman" action="<?= base_url('pinjaman/c_pinjaman/updatePinjaman') ?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_trx_pinjaman" id="update-id_trx_pinjaman">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Pinjaman</h6>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Debitur (PN)</label>
                        <select style="width: 100%;" name="id_mst_karyawan" id="update-id_mst_karyawan" class="form-control form-control-sm selectize_this">
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
                        <label for="">Tanggal Pinjam</label>
                        <input step="any" type="datetime-local" class="form-control form-control-sm" name="tgl_pinjam" id="update-tgl_pinjam" value="<?=date('Y-m-d h:i:s')?>">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Nominal (Rp.)</label>
                        <input type="number" class="form-control form-control-sm" name="nominal" id="update-nominal">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Tenor</label>
                        <input type="number" class="form-control form-control-sm" name="tenor" id="update-tenor">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Bunga (%)</label>
                        <input type="number" class="form-control form-control-sm" name="bunga" id="update-bunga">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_pinjaman">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Debitur</th>
                <th>Tgl. Pinjam</th>
                <th>Nominal</th>
                <th>Tenor</th>
                <th>Bunga</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach ($list_pinjaman as $lb) : $metadata = json_decode($lb['metadata'], true); ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?=$metadata['nama_karyawan']?> (<?=$metadata['no_induk']?>)</td>
                        <td><?= formatDateTime($lb['tgl_pinjam']) ?></td>
                        <td><?= $lb['nominal'] ?></td>
                        <td><?= $lb['tenor'] ?></td>
                        <td><?= $lb['bunga'] ?></td>
                        <td>
                            <!-- action -->
                            <a href="<?=base_url('pinjaman/c_pinjaman/setoran/'.$lb['id_trx_pinjaman'])?>" data-toggle="tooltip" title="Setoran" class="btn btn-sm btn-primary">
                                <i class="fa fa-search"></i>
                            </a>
                            <button class="btn btn-sm btn-secondary update_pinjaman" type="button" data-toggle="tooltip"
                            data-id_trx_pinjaman="<?=$lb['id_trx_pinjaman']?>" 
                            data-id_mst_karyawan="<?=$lb['id_mst_karyawan']?>" 
                            data-tgl_pinjam="<?=$lb['tgl_pinjam']?>" 
                            data-tenor="<?=$lb['tenor']?>" 
                            data-nominal="<?=$lb['nominal']?>" 
                            data-bunga="<?=$lb['bunga']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('pinjaman/c_pinjaman/deletePinjaman/'.$lb['id_trx_pinjaman']) ?>" onclick="return confirm('Hapus barang?')" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php $no++; endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function(){

        $('.update_pinjaman').on('click', function(){
            const data = $(this).data();
            $('#form-input-pinjaman').hide('fast')
            $('#form-update-pinjaman').show('fast')
            $('#update-id_trx_pinjaman').val(data.id_trx_pinjaman)
            $('#update-id_mst_karyawan').val(data.id_mst_karyawan).trigger('change')
            $('#update-tgl_pinjam').val(data.tgl_pinjam)
            $('#update-tenor').val(data.tenor)
            $('#update-nominal').val(data.nominal)
            $('#update-bunga').val(data.bunga)
        });

        $('#batal_ubah_pinjaman').on('click', function(){
            $('#form-update-pinjaman').hide('fast')
            $('#form-input-pinjaman').show('fast');
            $('.reset').val('');
        })
    })
</script>