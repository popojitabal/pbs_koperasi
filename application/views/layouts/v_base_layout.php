<!DOCTYPE html>
<html>
<!-- header -->
<?php

$title = "Nama Aplikasi";

$navItem = navItems();
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

    <style>
        @font-face {
            font-family: "Nexa";
            src: url("<?=base_url('/assets/font/NexaRegular.otf')?>");
        }
        @font-face {
            font-family: "NexaBold";
            src: url("<?=base_url('/assets/font/NexaBold.otf')?>");
        }
        @font-face {
            font-family: "NexaLight";
            src: url("<?=base_url('/assets/font/NexaLight.otf')?>");
        }
        body {
            font-family: Nexa, NexaBold, NexaLight; 
        }
    </style>
</head>
<!-- body -->

<body>
    <div class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?=base_url('/assets/img/logo.jpg')?>" class="px-2 bg-white" style="width: 30vh; border-radius:20px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-white w-100 ml-auto d-flex flex-row-reverse" id="navbarNav">
                    <div class="navbar-nav">
                        <?php foreach($navItem as $item): if($item['nav']): ?>
                        <a class="nav-item nav-link px-3 text-white <?=$item['tag'] == $tag ? 'border border-light rounded-lg active' : ''?>" href="<?=$item['tag'] == $tag ? "#" : $item['url']?>"><?=$item['name']?> <?= $item['tag'] == $tag ? '<span class="sr-only">(current)</span>' : '' ?></a>
                        <?php endif; endforeach ?>
                    </div>
                </div>  
            </div>
            
        </nav>
        <div class="">
            <!-- <h1 class="display-1 text-center">Disini mo taru gambar!</h1> -->
            <img src="<?=base_url('/assets/img/banner_lg.jpg')?>" alt="" style="width:100%">
        </div>
        <main>
            <div class="container my-5">
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
