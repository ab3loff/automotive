<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

<?php
$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin')
?>

<div class="container align-self-center">
    <h1 class="text-white px-4 py-3">ДОБРО ПОЖАЛОВАТЬ!</h1>
</div>


<?php
$view->component('end');
?>