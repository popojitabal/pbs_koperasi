<div class="row">
    <div class="col-12">
        <a href="<?= base_url('pembelian/c_pembelian') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Beli</a>
        <a href="#" class="btn btn-sm btn-primary btn-nav-custom">Barang</a>
        <a href="<?= base_url('pembelian/c_pembelian/toko') ?>" class="btn btn-sm btn-secondary btn-nav-custom">Toko</a>
    </div>
    <div class="col-12 mt-5">
        <form id="form-input-barang" action="<?= base_url('pembelian/c_pembelian/createBarang') ?>" class="border p-3 rounded-lg border-dark" method="post">
            <div class="row">
                <div class="col-12">
                    <h6>Form Input Barang</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" name="nama_barang" id="nama_barang">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Jenis Barang</label>
                        <input type="text" class="form-control form-control-sm" name="jenis_barang" id="jenis_barang">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Deskripsi Barang</label>
                        <textarea rows="3" class="form-control form-control-sm" name="deskripsi_barang" id="deskripsi_barang"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Simpan <i class="ml-2 fa fa-save"></i></button>
                </div>
            </div>
        </form>
        <form style="display: none;" id="form-update-barang" action="<?= base_url('pembelian/c_pembelian/updateBarang') ?>" class="border p-3 rounded-lg border-dark" method="post">
            <input type="hidden" class="reset" name="id_mst_barang" id="update-id_mst_barang">
            <div class="row">
                <div class="col-12">
                    <h6>Form Ubah Barang</h6>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm reset" name="nama_barang" id="update-nama_barang">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Jenis Barang</label>
                        <input type="text" class="form-control form-control-sm reset" name="jenis_barang" id="update-jenis_barang">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Deskripsi Barang</label>
                        <textarea rows="3" class="form-control form-control-sm reset" name="deskripsi_barang" id="update-deskripsi_barang"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary float-right">Ubah <i class="ml-2 fa fa-save"></i></button>
                    <button type="button" class="btn btn-sm btn-danger float-right" id="batal_ubah_barang">Batal <i class="ml-2 fa fa-times"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-5">
        <table class="table default-datatable">
            <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Deskripsi Barang</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no=1; foreach ($list_barang as $lb) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $lb['nama_barang'] ?></td>
                        <td><?= $lb['jenis_barang'] ?></td>
                        <td><?= $lb['deskripsi_barang'] ?></td>
                        <td>
                            <!-- action -->
                            <button class="btn btn-sm btn-secondary update_barang" type="button" data-toggle="tooltip"
                            data-id_mst_barang="<?=$lb['id_mst_barang']?>" 
                            data-nama_barang="<?=$lb['nama_barang']?>" 
                            data-jenis_barang="<?=$lb['jenis_barang']?>" 
                            data-deskripsi_barang="<?=$lb['deskripsi_barang']?>" 
                            ><i class="fa fa-edit"></i></button>
                            <a href="<?= base_url('pembelian/c_pembelian/deleteBarang/'.$lb['id_mst_barang']) ?>" onclick="return confirm('Hapus barang?')" class="btn btn-sm btn-danger">
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

        $('.update_barang').on('click', function(){
            const data = $(this).data();
            $('#form-input-barang').hide('fast')
            $('#form-update-barang').show('fast')
            $('#update-id_mst_barang').val(data.id_mst_barang);
            $('#update-nama_barang').val(data.nama_barang);
            $('#update-jenis_barang').val(data.jenis_barang);
            $('#update-deskripsi_barang').val(data.deskripsi_barang);
        });

        $('#batal_ubah_barang').on('click', function(){
            $('#form-update-barang').hide('fast')
            $('#form-input-barang').show('fast');
            $('.reset').val('');
        })
    })
</script>