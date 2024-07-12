<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

    <div class="d-flex p-3">

        <ul class="list-unstyled ps-0 border-end">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Услуги
                </button>
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/admin/service/add" class="link-light rounded">Добавить</a></li>
                        <li><a href="/admin/service/delete" class="link-light rounded">Удалить</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Акции
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/admin/promo/add" class="link-light rounded">Добавить</a></li>
                        <li><a href="/admin/promo/delete" class="link-light rounded">Удалить</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Новости
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/admin/news/add" class="link-light rounded">Добавить</a></li>
                        <li><a href="/admin/news/delete" class="link-light rounded">Удалить</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#request-collapse" aria-expanded="false">
                    Запросы на запись
                </button>
                <div class="collapse" id="request-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/admin/request" class="link-light rounded">Просмотр</a></li>
                    </ul>
                </div>
            </li>
        </ul>


