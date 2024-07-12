<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Service $service
 * @var \App\Kernel\Storage\StorageInterface $storage
 */
?>
<div class="col">
    <div class="service-box">
        <div class="service-box-img">
        <img class="service-img" src="<?php echo $storage->url($service->image()); ?>" alt="<?php echo $service->name(); ?>">
        </div>
        <div class="card-body service-box-others">
            <p class="card-text"><?php echo $service->name(); ?></p>
        </div>
    </div>
</div>