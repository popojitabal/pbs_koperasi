<!DOCTYPE html>
<html>
<!-- header -->
<?php

$title = "Nama Aplikasi";

$navItem = [
    [
        "url" => base_url(''),
        "tag" => "homepage",
        "name" => "Beranda",
        "icon" => null,
    ],
    [
        "url" => base_url('index.php/pembelian/c_pembelian'),
        "tag" => "pembelian",
        "name" => "Pembelian",
        "icon" => null,
    ],
    [
        "url" => base_url('index.php/pembayaran/c_pembayaran'),
        "tag" => "pembayaran",
        "name" => "Pembayaran",
        "icon" => null,
    ],
    [
        "url" => base_url('index.php/pinjaman/c_pinjaman'),
        "tag" => "pinjaman",
        "name" => "Pinjaman",
        "icon" => null,
    ],
    [
        "url" => base_url('index.php/laporan/c_laporan'),
        "tag" => "laporan",
        "name" => "Laporan",
        "icon" => null,
    ],
    // [
    //     "url" => base_url('master/c_master'),
    //     "tag" => "master",
    //     "name" => "Master",
    //     "icon" => null,
    // ],
];
?>
<head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5, shrink-to-fit=no" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.datatables.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dt.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
</head>
<!-- body -->

<body>
    <div class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a href="#" class="navbar-brand"><?=$title?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-white w-100 ml-auto d-flex flex-row-reverse" id="navbarNav">
                    <div class="navbar-nav">
                        <?php foreach($navItem as $item): ?>
                        <a class="nav-item nav-link px-3 text-white <?=$item['tag'] == $tag ? 'border border-light rounded-lg active' : ''?>" href="<?=$item['tag'] == $tag ? "#" : $item['url']?>"><?=$item['name']?> <?= $item['tag'] == $tag ? '<span class="sr-only">(current)</span>' : '' ?></a>
                        <?php endforeach ?>
                    </div>
                </div>  
            </div>
            
        </nav>
        <div class="jumbotron">
            <h1 class="display-1 text-center">Disini mo taru gambar!</h1>
            <!-- <img src="" alt=""> -->
        </div>
        <main>
            <div class="container jumbotron">
                <?php if ($page_content != "") $this->load->view($page_content); ?>
            </div>
        </main>
    </div>
</body>

<!-- footer -->
<footer>

<script>
    function checkJquery() {
        const navbarBrand = $('.navbar-brand').html();
        console.log(navbarBrand);
    }
    checkJquery();
    $(document).ready(function (){
        $('.default-datatable').DataTable();
    })
    // $(function() {
    //     // alert('laoded')
    // })
</script>

</footer>

</html>
