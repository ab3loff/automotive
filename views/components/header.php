<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 */
$user = $auth->user();

?>

<header id='header' class="border-bottom">
    <div class="container-md d-flex flex-wrap align-items-end justify-content-center justify-content-md-between py-4">
        <div class="col-md-auto align-self-center">
            <a href="\" class="d-flex link-body-emphasis text-decoration-none">
                <img src="/images/logo-vert-min.png" alt="Логотип" width="350px" height="60" class="logo">
            </a>
        </div>
        <div class="col-md-auto">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 py-3">
                <li><a href="/" class="nav-link px-2 text-white">ГЛАВНАЯ</a></li>
                <li><a href="/#services" class="nav-link px-2 text-white">УСЛУГИ</a></li>
                <li><a href="/promos" class="nav-link px-2 text-white">АКЦИИ</a></li>
                <li><a href="/news" class="nav-link px-2 text-white">НОВОСТИ</a></li>
                <li><a href="/#contact" class="nav-link px-2 text-white">КОНТАКТЫ</a></li>
            </ul>
        </div>
        <?php if ($auth->check()): ?>
            <div class="d-flex flex-row col-md-auto text-end justify-content-end py-3">
                <span class="text-white mx-2 align-self-center">Здравствуйте, <?= $user->name() ?></span>
                <form method="post" action="/logout">
                    <button type="submit" class="btn btn-warning">Выход</button>
                </form>
            </div>
        <?php else: ?>
            <div class="col-md-auto text-end justify-content-end py-3">
                <button type="button" onclick="location.href='/login'" class="btn btn-outline-warning me-1">ВХОД</button>
                <button type="button" onclick="location.href='/register'" class="btn btn-warning">РЕГИСТРАЦИЯ</button>
            </div>
        <?php endif; ?>
    </div>
</header>