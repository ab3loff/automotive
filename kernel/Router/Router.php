<?php

namespace App\Kernel\Router;

use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Middleware\AbstractMiddleware;
use App\Kernel\Middleware\MiddlewareInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Auth\Auth;


class Router implements RouterInterface
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(
        private ViewInterface $view,
        private RequestInterface $request,
        private RedirectInterface $redirect,
        private SessionInterface $session,
        private DatabaseInterface $database,
        private AuthInterface $auth,
        private StorageInterface $storage,
    )
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);
        if (!$route)
        {
            $this->notFound();
        }

        if ($route->hasMiddleware()) {

            foreach ($route->getMiddlewares() as $middleware) {
                /** @var AbstractMiddleware $middleware */
                $middleware = new $middleware($this->request, $this->auth, $this->redirect);

                $middleware->handle();
            }

        }

        if (is_array($route->getAction()))
        {
            [$controller, $action] = $route->getAction();

            /** @var *Controller $controller */
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, 'setDatabase'], $this->database);
            call_user_func([$controller, 'setAuth'], $this->auth);
            call_user_func([$controller, 'setStorage'], $this->storage);
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }

    // Заполнение массива Get и Post запросами с разделением
    private function initRoutes(): void
    {
        $routes = $this->getRoute();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;

        }
    }

    private function findRoute(string $uri, string $method): Route | false
    {
        if (!isset($this->routes[$method][$uri]))
        {
            return false;
        } else
        {
            return $this->routes[$method][$uri];
        }

    }

    private function notFound(): void
    {
        $this->view->page('notFound');
        exit();
    }

    /**
    * @return Route[]
    */
    private function getRoute(): array
    {
        return require APP_PATH . '/config/routes.php';
    }
}