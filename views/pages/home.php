<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Service> $services
 * @var array<\App\Models\Promo> $promos
 * @var array<\App\Models\News> $news
 */
?>


<?php $view->component('start'); ?>

<!-- Голова сайта/Header -->
<?php $view->component('header'); ?>
<div class="">
<!-- Запись/Registration -->
<section class="border-bottom">
    <div class="container main_request">
        <div class="text-uppercase col-lg-6">
            <span class="text-white">ОБСЛУЖИВАНИЕ</span>
            <span class="text-white">АВТОМОБИЛЕЙ В ОРЛЕ</span>
            <div class="main-btn-request-pd">
                <button class="btn-outline-warning main-btn-request" onclick="location.href='/request'">
                    <span class="align-text-center">Записаться</span>
                </button>
            </div>
        </div>
        <div>
            <img class="main_img" src="/images/comaro.png" alt="Comaro">
        </div>
    </div>
</section>

<!-- Услуги/Services -->
<section id="services" class="border-bottom pb-5">
    <h1 class="text-center text-white pt-4">Услуги</h1>
    <div class="py-4">
        <div class="container">
            <div class="col row row-cols-md-3 row-cols-lg-4 g-3">
                <?php foreach($services as $service) { ?>
                    <?php $view->component('service', '', ['service' => $service]); ?>
                <?php  } ?>
            </div>
        </div>
    </div>
</section>

<section id="promos" class="border-bottom">
    <h1 class="text-center text-white pt-4">Акции</h1>
    <div class="container mt-5">
        <?php foreach($promos as $promo) { ?>
            <?php $view->component('promo', '', ['promo' => $promo]); ?>
        <?php  } ?>
    </div>

</section>

<section id="news" class="border-bottom">

    <h1 class="text-center text-white pt-4">Новости</h1>
    <div class="container my-5">
        <div class="row">
            <?php foreach($news as $news) { ?>
                <?php $view->component('news', '', ['news' => $news]); ?>
            <?php  } ?>
        </div>

    </div>
</section>

<?php $view->component('contact'); ?>
</div>
<?php $view->component('footer') ?>

<?php $view->component('end'); ?>

