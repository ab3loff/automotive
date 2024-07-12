<?php $view->component('start'); ?>

<div class="register"
<section class="form-signin">
    <form action="" method="post">
        <div class="container mb-3 border-white">
            <div class="auth-box mb">
                <h1>Регистрация</h1>
                <div class="form-floating m-3">
                    <input type="text" class="form-control" name="name" placeholder="" required>
                    <label for="floatingInput" class="text-black">Имя</label>
                </div>
                <div class="form-floating m-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="email@gmail.com" required>
                    <label for="floatingInput" class="text-black">Почта</label>
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" placeholder="**********" required>
                    <label for="floatingInput" class="text-black">Пароль</label>
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" name="password_confirmation" id="floatingInput" placeholder="**********" required>
                    <label for="floatingInput" class="text-black">Повторите пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-outline-warning" type="submit" name="admin_btn">Войти</button>
            </div>
        </div>


    </form>



</section>
</div>

<?php $view->component('end'); ?>