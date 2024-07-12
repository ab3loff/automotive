<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>
<section class="form-signin align-content-center h-100">
    <form action="" method="post">
        <div class="container mb-3 border-white">
            <div class="auth-box mb">
                <a href="/" class="text-white"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
                <h1 class="text-center">Авторизация</h1>
                <div class="form-floating m-3">
                    <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required>
                    <label for="floatingInput" class="text-black">Почта</label>
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" placeholder="**********" required>
                    <label for="floatingInput" class="text-black">Пароль</label>
                </div>
                <div class="checkbox mb-3">
                    <?php if($session->has('undefined')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $session->getFlash('undefined'); ?>
                        </div>
                    <?php } ?>

                </div>
                <button class="w-100 btn btn-lg btn-outline-warning" type="submit" name="admin_btn">Войти</button>
            </div>
        </div>


    </form>



</section>

<?php $view->component('end'); ?>