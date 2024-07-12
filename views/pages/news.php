<?php
/**
 * @var array<\App\Models\News> $news
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Models\News $news
 */
?>


<?php
$view->component('start');
$view->component('header');
?>
<div class="wrapper">
<section id="promos" class="flex-shrink-0 pb-5">
    <?php if (is_array($news)) { ?>
        <h1 class="text-center text-white pt-4">Новости</h1>
        <div class="container mt-5">
            <?php foreach($news as $new) { ?>
                <?php $view->component('news', '', ['news' => $new]); ?>
            <?php  } ?>
        </div>
    <?php } elseif (!is_array($news)) { ?>
        <div class="container mt-5">
            <h1 class="align-self-start"><?php echo $news->name(); ?></h1>
            <picture class="d-flex justify-content-center">
                <img width="800" height="400" src="<?php echo $storage->url($news->full_image()); ?>" class="news-img d-flex justify-content-center ">
            </picture>
            <?php foreach(explode(".", $news->full_text()) as $sentence) { ?>
                <h5 class="mt-4 align-self-start"> <?php echo $sentence."<br>"; ?> </h5>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="align-self">Новости отсутствуют</h1>
    <?php }?>
</section>
</div>

<?php
$view->component('footer');
$view->component('end');
?>
