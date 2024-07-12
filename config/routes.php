<?php

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Controllers\ServiceController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\RequestController;
use App\Controllers\PromoController;
use App\Controllers\NewsController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Middleware\AdminMiddleware;
use App\Kernel\Router\Route;

return [
    Route::get("/", [HomeController::class, "index"]),
    Route::get('/promos', [PromoController::class, 'index']),
    Route::get('/news', [NewsController::class, 'index']),

    Route::get("/register", [RegisterController::class, "index"], [GuestMiddleware::class]),
    Route::post("/register", [RegisterController::class, "register"]),

    Route::get("/login", [LoginController::class, "index"], [GuestMiddleware::class]),
    Route::post("/login", [LoginController::class, "login"]),
    Route::post("/logout", [LoginController::class, "logout"]),

    Route::get("/request", [RequestController::class, 'index']),
    Route::post("/request", [RequestController::class, 'requests']),

    Route::get("/admin", [AdminController::class, "index"], [AuthMiddleware::class, AdminMiddleware::class]),

    Route::get("/admin/service/add", [ServiceController::class, "addShow"], [AuthMiddleware::class]),
    Route::post("/admin/service/add", [ServiceController::class, "addService"]),
    Route::get("/admin/service/delete", [ServiceController::class, "deleteShow"], [AuthMiddleware::class]),
    Route::post("/admin/service/delete", [ServiceController::class, "deleteService"]),

    Route::get("/admin/promo/add", [PromoController::class, "addShow"], [AuthMiddleware::class]),
    Route::post("/admin/promo/add", [PromoController::class, "addPromo"]),
    Route::get("/admin/promo/delete", [PromoController::class, "deleteShow"], [AuthMiddleware::class]),
    Route::post("/admin/promo/delete", [PromoController::class, "deletePromo"]),

    Route::get("/admin/news/add", [NewsController::class, "addShow"], [AuthMiddleware::class]),
    Route::post("/admin/news/add", [NewsController::class, "addNews"]),
    Route::get("/admin/news/delete", [NewsController::class, "deleteShow"], [AuthMiddleware::class]),
    Route::post("/admin/news/delete", [NewsController::class, "deleteNews"]),


    Route::get('/admin/request', [RequestController::class, 'adminShow'], [AuthMiddleware::class]),

];