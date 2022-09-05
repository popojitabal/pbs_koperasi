
<div class=""><b>Selamat Datang, apa yang ingin anda lakukan?</b></div>
<br>
<div class="row">
    <?php foreach(navItems() as $items): if($items['tag'] != 'homepage'): ?>
        <div class="col d-flex flex-column justify-content-center">
            <a href="<?=$items['url']?>" class="p-2 bg-white btn btn-primary" style="border-radius:25px">
                <img src="<?=$items['icon']?>" style="width: 100px; height: 100px">
            </a>
            <div class="text-center"><?=$items['name']?></div>
        </div>
    <?php endif; endforeach ?>
</div>