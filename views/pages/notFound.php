<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

<?php $view->component('start'); ?>
<a href="/" class="text-white text-decoration-none">
<div class="h-100 d-flex justify-content-center align-items-center flex-container border-warning">
    <h1 class="border border-warning rounded-3 p-5">404 Страница не найдена <i class="fas fa-sad-tear"></i></h1>

</div>
</a>
<?php $view->component('end'); ?>