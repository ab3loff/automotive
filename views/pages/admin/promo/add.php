<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */

$view->component('start');
$view->component('header');
$view->component('sidebar', 'admin');
?>
<div class="container ms-3 d-flex flex-column">

    <h3 class="mt-2 text-white px-2 py-3">Добавление акции</h3>

    <form class="form-horizontal" action="/admin/promo/add" method="post" enctype="multipart/form-data">

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="short_image" class="text-white form-label">Изображение на главной</label>
                    <input class="form-control" type="file" name="short_image" id="short_image" required>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="full_image" class="text-white form-label">Изображение на отдельной странице</label>
                    <input class="form-control" type="file" name="full_image" id="full_image" required>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="name" class="text-white form-label">Название</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="short_text" class="text-white form-label">Краткое описание</label>
                    <input class="form-control" type="text" name="short_text" id="short_text" required>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="full_text" class="text-white form-label">Полное описание</label>
                    <input class="form-control" type="text" name="full_text" id="full_text" required>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md">
                <div class="mb-1">
                    <label for="date" class="text-white form-label">Дата</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>
            </div>
        </div>
        <?php if ($session->has('name') || $session->has('short_image') || $session->has('full_image') ||
                  $session->has('short_text') || $session->has('full_text') || $session->has('date')){?>
            <div class="col-md">
                <div class="mb-3">
                    <div class="alert alert-danger" role="alert">
                        <ul class="alert-danger">
                            <?php foreach ($session->getFlash('name') as $field => $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                            <?php foreach ($session->getFlash('short_image') as $field => $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                            <?php foreach ($session->getFlash('full_image') as $field => $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                            <?php foreach ($session->getFlash('short_text') as $field => $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                            <?php foreach ($session->getFlash('full_text') as $field => $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                            <?php foreach ($session->getFlash('date') as $field => $error) { ?>
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

        <button type="submit" class="btn btn-primary my-3">Добавить</button>
    </form>
</div>

<?php
$view->component('end');
