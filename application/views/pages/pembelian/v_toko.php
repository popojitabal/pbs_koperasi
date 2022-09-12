<div class="row">
    <div class="col-12">
        <a href="<?= base_url('pembelian/c_pembelian') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Beli</a>
        <a href="<?= base_url('pembelian/c_pembelian/barang') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Barang</a>
        <a href="#" class="btn btn-sm btn-primary btn-nav-custom">Toko</a>
    </div>
    <div class="col-12 mt-5">
        <form id="form-input-toko" action="<?=base_url('pembelian/c_pembelian/createToko')?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Toko</h6>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input type="text" class="form-control form-control-sm" name="nama_toko" id="nama_toko">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Alamat Toko</label>
                        <textarea rows="3" class="form-control form-control-sm" name="alamat" id="alamat"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form id="form-update-toko" style="display: none;" action="<?=base_url('pembelian/c_pembelian/updateToko')?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_mst_toko" id="update-id_mst_toko">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Toko</h6>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input type="text" class="form-control form-control-sm" name="nama_toko" id="update-nama_toko">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Alamat Toko</label>
                        <textarea rows="3" class="form-control form-control-sm" name="alamat" id="update-alamat"></textarea>
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
                <th>Nama Toko</th>
                <th>Alamat Toko</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach($list_toko as $lb): ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$lb['nama_toko']?></td>
                        <td><?=$lb['alamat']?></td>
                        <td>
                            <!-- action -->
                            <button class="btn btn-sm btn-secondary update_toko" type="button" data-toggle="tooltip"
                            data-id_mst_toko="<?=$lb['id_mst_toko']?>" 
                            data-nama_toko="<?=$lb['nama_toko']?>" 
                            data-alamat="<?=$lb['alamat']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('pembelian/c_pembelian/deleteToko/'.$lb['id_mst_toko']) ?>" onclick="return confirm('Hapus toko?')" class="btn btn-sm btn-danger">
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

        $('.update_toko').on('click', function(){
            const data = $(this).data();
            $('#form-input-toko').hide('fast')
            $('#form-update-toko').show('fast')
            $('#update-id_mst_toko').val(data.id_mst_toko);
            $('#update-nama_toko').val(data.nama_toko);
            $('#update-alamat').val(data.alamat);
        });

        $('#batal_ubah_toko').on('click', function(){
            $('#form-update-toko').hide('fast')
            $('#form-input-toko').show('fast');
            $('.reset').val('');
        })
    })
</script>