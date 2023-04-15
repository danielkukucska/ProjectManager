<?php
class Route
{
    public static $routes = array();

    public static function get(string $url, string $action, bool $authRequired)
    {
        self::$routes[] = new RouteItem("GET", $url, $action, $authRequired);
    }

    public static function post(string $url, string $action, bool $authRequired)
    {
        self::$routes[] = new RouteItem("POST", $url, $action, $authRequired);
    }

    public static function put(string $url, string $action, bool $authRequired)
    {
        self::$routes[] = new RouteItem("PUT", $url, $action, $authRequired);
    }

    public static function delete(string $url, string $action, bool $authRequired)
    {
        self::$routes[] = new RouteItem("DELETE", $url, $action, $authRequired);
    }

    public static function resolve()
    {
        $url = rtrim(str_replace("/projectmanager", "", strtolower($_SERVER["REQUEST_URI"])), "/");
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
    private $authRequired;

    public function __construct(string $method, string $url, string $action, bool $authRequired)
    {
        $this->method = $method;
        $this->url = $url;
        $this->action = $action;
        $this->authRequired = $authRequired;
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
        if ($this->authRequired && !isset($_SESSION["user"])) {

            header("Location: /ProjectManager/auth/sign-in");
            exit();
        }

        list($controller, $method) = explode("@", $this->action);
        $controllerInstance = new $controller();
        $args = array_values($this->params);

        call_user_func_array(array($controllerInstance, $method), $args);
    }
}
