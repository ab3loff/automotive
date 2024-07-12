<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Promo $promo
 */
?>
<a href="/promos?id=<?php echo $promo->id(); ?>" class="text-white text-decoration-none">
<div class="promo-container">
    <div class="promo-image border-secondary">
        <img width="200" height="220" src="<?php echo $storage->url($promo->short_image()); ?>" alt="<?php echo $promo->name();?>" class="img-promo border border-warning">
    </div>
    <div class="promo-content">
        <h2><?php echo $promo->name(); ?></h2>
        <p><?php echo $promo->short_text(); ?></p>
        <p>Дата акции: <?php echo $promo->promo_date(); ?></p>
    </div>
</div>
</a>