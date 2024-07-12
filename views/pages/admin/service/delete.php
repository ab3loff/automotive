<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php
$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin');
?>

<div class="container ms-3 d-flex flex-column">
    <h3 class="">Удаление услуги</h3>

    <?php if ($session->has('Успешно')) { ?>
        <div class="col-md">
            <div class="mb-3">
                <div class="alert alert-success" role="alert">
                    <ul class="alert-success">
                        <li><?= $session->getFlash('Успешно'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($services)) { ?>
        <div class=" d-flex flex-column">
            <table class=" table table-striped text-white">
                <tr class="text-white">
                    <th class="text-white m-5">Название</th>
                    <th class="text-white m-5">Действие</th>
                    </tr>
                <?php foreach($services as $service) { ?>
                    <tr>
                        <td class="text-white"><?= $service->name() ?></td>
                        <td class="text-white m-5"><a href="/admin/service/delete/<?= $service->id() ?>" class="btn btn-danger">Удалить</a></td>

                    </tr>
                <?php  } ?>
            </table>
        </div>
    <?php } ?>
</div>

<?php
$view->component('end');
?>