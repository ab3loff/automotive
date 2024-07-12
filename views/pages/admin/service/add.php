<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php
$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin');
?>
<div class="container ms-3 d-flex flex-column">
    <h3 class="mt-2 text-white px-2 py-3">Добавление услуги</h3>


<div class="">
    <form class="form-check" action="/admin/service/add" method="post" enctype="multipart/form-data">

        <label for="name" class="text-white col-sm-2 control-label">Название услуги</label>
        <input type="text" id="name" class="form-control" name="name">

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="image" class="text-white form-label">Изображение</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
            </div>
        </div>
        <?php if ($session->has('name') || $session->has('image')){?>
        <div class="col-md">
            <div class="mb-3">
                <div class="alert alert-danger" role="alert">
                    <ul class="alert-danger">
                    <?php foreach ($session->getFlash('name') as $field => $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                        <?php foreach ($session->getFlash('image') as $field => $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } elseif ($session->has('Успешно')) { ?>
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

        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <button class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<?php
$view->component('end');
?>
