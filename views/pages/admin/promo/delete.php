<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Promo> $promos
 */
?>

<?php
$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin');
?>

<?php if (isset($promos)) { ?>
    <div class="container ms-3 d-flex flex-column">
        <h3 class="text-center">Удаление акции</h3>

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

            <div class=" d-flex flex-column">
                <table class=" table table-striped text-white">
                    <tr class="text-white">
                        <th class="text-white">Название</th>
                        <th class="text-white">Краткое описание</th>
                        <th class="text-white">Действие</th>
                    </tr>
                    <?php foreach($promos as $promo) { ?>
                        <tr>
                            <td class="text-white"><?= $promo->name() ?></td>
                            <td class="text-white"><?= $promo->short_text() ?></td>
                            <td class="text-white"><a href="/admin/promo/delete/<?= $promo->id() ?>" class="btn btn-danger">Удалить</a></td>

                        </tr>
                    <?php  } ?>
                </table>
            </div>



    </div>
<?php } ?>

<?php
$view->component('end');
?>
