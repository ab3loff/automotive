<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Service> $services
 * @var \App\Kernel\Auth\Auth $auth
 */

$view->component('head')
?>

<body>
<a href="\" class="d-inline-flex w-100 justify-content-center">
    <img src="/images/logo-vert-min.png" alt="Логотип" width="25%">
</a>
<form class="d-flex justify-content-center align-items-center auth-box" action="" method="post">
    <div class="d-flex flex-column">
        <div class="form-group border-1 m-2">
            <label class="control-label text-white" for="service">Услуга</label>
            <select name="service" id="service" class="form-control" required>
                <?php foreach($services as $service) { ?>
                    <option value="<?= $service->name() ?>"><?= $service->name() ?></option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group border-1 m-2">
            <label class="text-white" for="description">Пожелания</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group border-1 m-2">
            <label class="text-white" for="date">Дата записи</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group border-1 m-2">
            <label class="text-white" for="time">Время записи</label>
            <input type="time" min="09:00" step="3600" max="18:00" name="time" class="form-control">
        </div>
        <div class="form-group border-1 m-2">
            <button type="submit" class="btn btn-primary">Записаться</button>
        </div>
    </div>
</form>
</body>

