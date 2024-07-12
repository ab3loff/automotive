<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Request> $requests
 */
?>

<?php
$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin')
?>
<div class="container ms-3 d-flex flex-column">
<h1 class="text-center">Заявки</h1>

<?php if (count($requests) > 0): ?>
    <table class="container table table-striped text-white">
        <tr class="text-white">
            <th class="text-white">Имя</th>
            <th class="text-white">Email</th>
            <th class="text-white">Услуга</th>
            <th class="text-white">Описание</th>
            <th class="text-white">Дата</th>
        </tr>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td class="text-white"><?= $request->user_name ?></td>
                <td class="text-white"><?= $request->user_email ?></td>
                <td class="text-white"><?= $request->service ?></td>
                <td class="text-white"><?= $request->description ?></td>
                <td class="text-white"><?= $request->date ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Заявок нет</p>
<?php endif; ?>

<?php
$view->component('end');
?>
