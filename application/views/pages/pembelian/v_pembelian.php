<div class="row">
    <div class="col-12">
        <a href="#" class="btn btn-sm btn-primary btn-nav-custom">Beli</a>
        <a href="<?=base_url('pembelian/c_pembelian/barang')?>" class="btn btn-sm btn-secondary btn-nav-custom">Barang</a>
        <a href="<?=base_url('pembelian/c_pembelian/toko')?>" class="btn btn-sm btn-secondary btn-nav-custom">Toko</a>
    </div>
    <div class="col-12 mt-5">
        <form id="form-input-pembelian" action="<?=base_url('pembelian/c_pembelian/createPembelian')?>" method="POST" class="border p-3 rounded-lg border-dark">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Pembelian</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Barang</label>
                        <select required name="id_mst_barang" id="id_mst_barang" class="form-control form-control-sm selectize_this">
                            <option value="">--Pilih Barang--</option>
                            <?php foreach($list_barang as $lb) : ?>
                                <option value="<?=$lb['id_mst_barang']?>"><?=$lb['nama_barang']?> (<?=$lb['jenis_barang']?>)</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Toko</label>
                        <select required name="id_mst_toko" id="id_mst_toko" class="form-control form-control-sm selectize_this">
                            <option value="">--Pilih Barang--</option>
                            <?php foreach($list_toko as $lb) : ?>
                                <option value="<?=$lb['id_mst_toko']?>"><?=$lb['nama_toko']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Harga Beli</label>
                        <input type="number" required name="harga_beli" id="harga_beli" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        <input type="number" required name="harga_jual" id="harga_jual" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Jumlah Barang</label>
                        <input type="number" required name="jumlah_barang" id="jumlah_barang" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
                </div>
            </div>
        </form>
        <form id="form-update-pembelian" style="display: none;" action="<?=base_url('pembelian/c_pembelian/updatePembelian')?>" method="POST" class="border p-3 rounded-lg border-dark">
            <input type="hidden" class="reset" name="id_trx_pembelian" id="update-id_trx_pembelian">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Pembelian</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <label for="">Barang</label> <br>
                    <select required name="id_mst_barang" id="update-id_mst_barang" class="form-control form-control-sm reset selectize_this" style="width: 100%;">
                        <option value="">--Pilih Barang--</option>
                        <?php foreach($list_barang as $lb) : ?>
                            <option value="<?=$lb['id_mst_barang']?>"><?=$lb['nama_barang']?> (<?=$lb['jenis_barang']?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="">Toko</label>
                    <select required name="id_mst_toko" id="update-id_mst_toko" class="form-control form-control-sm reset selectize_this" style="width: 100%;">
                        <option value="">--Pilih Barang--</option>
                        <?php foreach($list_toko as $lb) : ?>
                            <option value="<?=$lb['id_mst_toko']?>"><?=$lb['nama_toko']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Harga Beli</label>
                        <input type="number" required name="harga_beli" id="update-harga_beli" class="form-control form-control-sm reset">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        <input type="number" required name="harga_jual" id="update-harga_jual" class="form-control form-control-sm reset">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Jumlah Barang</label>
                        <input type="number" required name="jumlah_barang" id="update-jumlah_barang" class="form-control form-control-sm reset">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_pembelian">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Beli Satuan</th>
                <th>Harga Jual Satuan</th>
                <th>Total Harga Jual</th>
                <th>Profit</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach($list_pembelian as $lp): $metadata=json_decode($lp['metadata'], true)?>
                    <tr>
                        <td>
                            <?=$no++?>
                        </td>
                        <td><?=$metadata['barang']['nama_barang']?></td>
                        <td><?=$lp['jumlah_barang']?></td>
                        <td><?=($lp['harga_beli'])?></td>
                        <td><?=($lp['harga_jual'])?></td>
                        <td><?=($lp['harga_jual']*$lp['jumlah_barang'])?></td>
                        <td><?=(($lp['harga_jual']*$lp['jumlah_barang'])-($lp['harga_beli']*$lp['jumlah_barang']))?></td>
                        <td><button class="btn btn-sm btn-secondary update_pembelian" type="button" data-toggle="tooltip"
                        data-id_trx_pembelian="<?=$lp['id_trx_pembelian']?>" 
                        data-id_mst_toko="<?=$lp['id_mst_toko']?>" 
                        data-id_mst_barang="<?=$lp['id_mst_barang']?>" 
                        data-jumlah_barang="<?=$lp['jumlah_barang']?>" 
                        data-harga_beli="<?=$lp['harga_beli']?>" 
                        data-harga_jual="<?=$lp['harga_jual']?>" 
                        ><i class="fa fa-edit"></i></button>
                        <a href="<?= base_url('pembelian/c_pembelian/deletePembelian/'.$lp['id_trx_pembelian']) ?>" onclick="return confirm('Hapus toko?')" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    $(function(){

        $('.update_pembelian').on('click', function(){
            const data = $(this).data();
            $('#form-input-pembelian').hide('fast')
            $('#form-update-pembelian').show('fast')
            $('#update-id_trx_pembelian').val(data.id_trx_pembelian);
            $('#update-id_mst_toko').val(data.id_mst_toko).trigger('change');
            $('#update-id_mst_barang').val(data.id_mst_barang).trigger('change');
            $('#update-jumlah_barang').val(data.jumlah_barang);
            $('#update-harga_beli').val(data.harga_beli);
            $('#update-harga_jual').val(data.harga_jual);
        });

        $('#batal_ubah_pembelian').on('click', function(){
            $('#form-update-pembelian').hide('fast')
            $('#form-input-pembelian').show('fast');
            $('.reset').val('');
        })
    })
</script>