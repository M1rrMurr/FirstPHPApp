<?php


namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller_path)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller_path" => $controller_path,
            "method" => $method,
            "middleware" => null
        ];
        return $this;
    }

    public function get($uri, $controller_path,)
    {
        return $this->add("GET", $uri, $controller_path);
    }

    public function post($uri, $controller_path)
    {
        return $this->add("POST", $uri, $controller_path);
    }

    public function delete($uri, $controller_path)
    {
        return $this->add("DELETE", $uri, $controller_path);
    }

    public function patch($uri, $controller_path)
    {
        return $this->add("PATCH", $uri, $controller_path);
    }

    public function put($uri, $controller_path)
    {
        return $this->add("PUT", $uri, $controller_path);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {

            if ($route["uri"] === $uri && $route["method"] === $method) {

                Middleware::resolve($route['middleware']);

                return require basePath($route["controller_path"]);
            }
        }
        abort();
    }
}
