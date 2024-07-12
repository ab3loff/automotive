<?php
/**
 * @var array<\App\Models\Promo> $promos
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Promo $promo
 * @var \App\Kernel\Storage\StorageInterface $storage
 */
?>


<?php
$view->component('start');
$view->component('header');
?>
    <div class="wrapper">
<section id="promos" class="">
    <?php if (isset($promos)) { ?>
    <h1 class="text-center text-white pt-4">Акции</h1>
    <div class="container mt-5">
            <?php foreach($promos as $promo) { ?>
                <?php $view->component('promo', '', ['promo' => $promo]); ?>
            <?php  } ?>
    </div>
    <?php } elseif (isset($promo)) { ?>
    <div class="container mt-5">
        <h1 class="align-self-start"><?php echo $promo->name(); ?></h1>
        <picture class="d-flex justify-content-center">
            <img width="800" height="300" src="<?php echo $storage->url($promo->full_image()); ?>" class="news-img d-flex justify-content-center ">
        </picture>
        <?php foreach(explode(".", $promo->full_text()) as $sentence) { ?>
            <h5 class="mt-4 align-self-start"> <?php echo $sentence."<br>"; ?> </h5>
        <?php } ?>
    </div>
    <?php } else { ?>
    <h1 class="align-self">Акции отсутствуют</h1>
    <?php }?>
</section>
    </div>
<?php
$view->component('footer');
$view->component('end');
?>