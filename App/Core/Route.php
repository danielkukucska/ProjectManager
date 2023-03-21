<?php
class Route
{
    public static $routes = array();

    public static function get($url, $action)
    {
        self::$routes[] = new RouteItem("GET", $url, $action);
    }

    public static function post($url, $action)
    {
        self::$routes[] = new RouteItem("POST", $url, $action);
    }

    public static function put($url, $action)
    {
        self::$routes[] = new RouteItem("PUT", $url, $action);
    }

    public static function delete($url, $action)
    {
        self::$routes[] = new RouteItem("DELETE", $url, $action);
    }

    public static function resolve()
    {
        $url = str_replace("/Projectmanager/Public", "", $_SERVER["REQUEST_URI"]);
        $method = $_SERVER["REQUEST_METHOD"];
        foreach (self::$routes as $route) {
            if ($route->matches($method, $url)) {
                $route->execute();
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}

class RouteItem
{
    private $method;
    private $url;
    private $action;
    private $params = [];

    public function __construct($method, $url, $action)
    {
        $this->method = $method;
        $this->url = $url;
        $this->action = $action;
    }

    public function matches($method, $url)
    {
        $pattern = preg_replace("/\{([a-zA-Z0-9_]+)\}/", "(?P<$1>[a-zA-Z0-9-]+)", $this->url);
        $pattern = str_replace("/", "\/", $pattern);
        $pattern = "/^" . $pattern . "$/";

        if ($this->method == $method && preg_match($pattern, $url, $matches)) {
            foreach ($matches as $key => $value) {
                if (is_string($key)) {
                    $this->params[$key] = $value;
                }
            }
            return true;
        }
        return false;
    }

    public function execute()
    {
        list($controller, $method) = explode("@", $this->action);
        $controllerInstance = new $controller();
        $args = array_values($this->params);

        call_user_func_array(array($controllerInstance, $method), $args);
    }
}
