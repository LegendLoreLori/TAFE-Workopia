<?php

namespace Framework;

use App\controllers\ErrorController;
use Framework\middleware\Authorise;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];

    /**
     * Add a new route
     *
     * @param string $method
     * @param string $uri
     * @param string $action
     * @param array $middleware
     * @return void
     */
    private function registerRoute(string $method, string $uri, string $action, array $middleware = []):
    void
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    /**
     * Add a GET route
     *
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function get(string $uri, string $controller,
                        array  $middleware = []): void
    {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    /**
     * Add a POST route
     *
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function post(string $uri, string $controller, array  $middleware = []): void
    {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    /**
     * Add a PUT route
     *
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function put(string $uri, string $controller, array  $middleware = []): void
    {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    /**
     * Add a DELETE route
     *
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function delete(string $uri, string $controller, array  $middleware = []): void
    {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }

    /**
     * Load error page
     * @param int $httpCode
     *
     * @return void
     */
    #[NoReturn] public function error(int $httpCode = 404): void
    {
        http_response_code(404);
        loadView("error/$httpCode");
        exit;
    }

    /**
     * Route the request
     *
     * @param string $uri
     * @return void
     */
    public function route(string $uri): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // check for _method input
        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            // override request method with value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {
            $uriSegments = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));
            $match = true;

            // if no. of segments match
            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
                $params = [];

                for ($i = 0; $i < count($uriSegments); $i++) {
                    // if uri's don't match and there is no parameter
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    // add to params array if math found
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
                if ($match) {
                    // handle roles
                    foreach ($route['middleware'] as $role) {
                        (new Authorise())->handle($role);
                    }
                    // extract controller and method
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];
                    // instantiate controller and call method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }

        ErrorController::notFound();
    }
}
