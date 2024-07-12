<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\News $news
 */
?>
<a href="/news?id=<?php echo $news->id(); ?>" class="text-white text-decoration-none">
<div class="col-lg-4">
    <img class=" news-img rounded-2" width="230" height="200" src="<?php echo $storage->url($news->short_image()) ?>" role="img" aria-label="Placeholder: 150x150">

    <h2><?php echo $news->name(); ?></h2>
    <p><?php echo $news->short_text(); ?></p>
    <p>Дата: <?php echo $news->news_date(); ?></p>
    <p><a class="btn btn-secondary" href="/news?id=<?php echo $news->id(); ?>">Подробнее »</a></p>
</div>
</a>