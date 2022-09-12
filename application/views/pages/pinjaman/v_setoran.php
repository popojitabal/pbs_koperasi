<?php 
$metadata = json_decode($pinjaman['metadata'], true);
?>
<div class="row">
    <!-- <div class="col-12">
        <a href="#" class="btn btn-sm btn-primary btn-nav-custom">Barang</a>
        <a href="<?= base_url('pembelian/c_pembelian') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Beli</a>
        <a href="<?= base_url('pembelian/c_pembelian/toko') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Toko</a>
    </div> -->
    <div class="col-12 mt-5"></div>
    <div class="col-4">
        <div class="border p-3 rounded-lg border-dark h-100">
            <div class="row">
                <div class="col-12">
                    <h6>Data Setoran</h6>
                    <hr>
                    <table class="w-100">
                        <tr>
                            <td>Debitur (PN)</td>
                            <td>:</td>
                            <td><?=$metadata['nama_karyawan']?> (<?=$metadata['no_induk']?>)</td>
                        </tr>
                        <tr>
                            <td>Tgl. Pinjam</td>
                            <td>:</td>
                            <td><?=formatDateTime($pinjaman['tgl_pinjam'])?></td>
                        </tr>
                        <tr>
                            <td>Nominal Pinjam</td>
                            <td>:</td>
                            <td><?=($pinjaman['nominal'])?></td>
                        </tr>
                        <tr>
                            <td>Tenor</td>
                            <td>:</td>
                            <td><?=($pinjaman['tenor'])?></td>
                        </tr>
                        <tr>
                            <td>Bunga</td>
                            <td>:</td>
                            <td><?=($pinjaman['bunga'])?>%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <form id="form-input-setoran" action="<?= base_url('pinjaman/c_pinjaman/createSetoran/'.$id_trx_pinjaman) ?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Setoran</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tanggal Penyetoran</label>
                        <input step="any" type="datetime-local" class="form-control form-control-sm" name="tgl_penyetoran" id="tgl_penyetoran" value="<?=date('Y-m-d h:i:s')?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nominal Pinjam (Rp.)</label>
                        <input type="number" class="form-control form-control-sm" name="nominal" id="nominal">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form style="display: none;" id="form-update-setoran" action="<?= base_url('pinjaman/c_pinjaman/updateSetoran/'.$id_trx_pinjaman) ?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_trx_pinjaman_setor" id="update-id_trx_pinjaman_setor">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Setoran</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tanggal Penyetoran</label>
                        <input step="any" type="datetime-local" class="form-control form-control-sm" name="tgl_penyetoran" id="update-tgl_penyetoran" value="<?=date('Y-m-d h:i:s')?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nominal Pinjam (Rp.)</label>
                        <input type="number" class="form-control form-control-sm" name="nominal" id="update-nominal">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_setoran">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Tgl. Penyetoran</th>
                <th>Nominal</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach ($list_setoran as $ls) : $metadata = json_decode($ls['metadata'], true); ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= formatDateTime($ls['tgl_penyetoran']) ?></td>
                        <td><?= $ls['nominal'] ?></td>
                        <td>
                            <!-- action -->
                            <button class="btn btn-sm btn-secondary update_setoran" type="button" data-toggle="tooltip"
                            data-id_trx_pinjaman_setor="<?=$ls['id_trx_pinjaman_setor']?>" 
                            data-tgl_penyetoran="<?=$ls['tgl_penyetoran']?>" 
                            data-nominal="<?=$ls['nominal']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('pinjaman/c_pinjaman/deleteSetoran/'.$id_trx_pinjaman.'/'.$ls['id_trx_pinjaman']) ?>" onclick="return confirm('Hapus barang?')" class="btn btn-sm btn-danger">
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

        $('.update_setoran').on('click', function(){
            const data = $(this).data();
            $('#form-input-setoran').hide('fast')
            $('#form-update-setoran').show('fast')
            $('#update-id_trx_pinjaman_setor').val(data.id_trx_pinjaman_setor)
            $('#update-tgl_penyetoran').val(data.tgl_penyetoran)
            $('#update-nominal').val(data.nominal)
        });

        $('#batal_ubah_setoran').on('click', function(){
            $('#form-update-setoran').hide('fast')
            $('#form-input-setoran').show('fast');
            $('.reset').val('');
        })
    })
</script>