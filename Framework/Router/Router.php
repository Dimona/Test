<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 25.09.14
 * Time: 23:36
 */

namespace Framework\Router;

use Framework\Exception\RouteException;
use Framework\Request\Request;

/**
 * Class Router [Singleton]
 * @package Router
 */
class Router
{
    /**
     * @var array from routes' config file
     */
    private $routes;

    /**
     * @var Router instance of the class Router
     */
    public static $instance;


    /**
     * Constructor
     */
    private final function __construct()
    {
    }

    /**
     * [Singleton] Prevent to clone instance of the class
     */
    private final function __clone()
    {
    }

    /**
     * [Singleton] Creating exclusive instance of the class
     * @return Router
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param array
     */
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Analysing of the routes' config file
     * @return mixed
     * @throws \Exception
     */
    public function processConfig()
    {
        if (!$route = $this->search()) {
            throw new \Exception('The page is not found', 404);
        }
        $controllerClass = '\\src\\Controllers\\' . $route['controller'];
        $reflection = new \ReflectionClass($controllerClass);
        $reflectionMethod = $reflection->getMethod($route['action'] . 'Action');

        $args = array();

        foreach ($reflectionMethod->getParameters() as $param) {
            $name = $param->name;
            $args['name'] = isset($route['values']) && isset($route['values'][$name]) ?
                $route['values'][$name] : $param->getDefaultValue();
        }

//        var_dump(new \ReflectionClass($controllerClass)); die;
        $controller = new $controllerClass;
        return $reflectionMethod->invokeArgs($controller, $args);
    }

    /**
     * Searching of the necessary route in the routes' config file
     * @return bool|@route
     */
    private function search()
    {
        foreach ($this->routes as $name => $route) {
            list($pattern, $params) = $this->preparePattern($route);
            if (!preg_match($pattern, Request::getURI(), $match)) {
                continue;
            }
            if (isset($route['requirements']) && isset($route['requirements']['method']) && ($route['requirements']['method'] !== Request::getMethod())) {
                continue;
            }
            array_shift($match);
            if (!empty($match)) {
                $values = array_combine($params, $match);
                $route['values'] = $values;
            }
//            var_dump($route);
            return $route;
        }
        return false;
    }

    /**
     * Preparing the pattern according to the route
     * @param $route
     * @return array(@pattern, @params)
     */
    private function preparePattern($route)
    {
        $pattern = $route['pattern'];
        if (preg_match_all('/\{([\d\w_]+)\}/', $route['pattern'], $match)) {
            foreach ($match[0] as $i => $holder) {
                $pattern = str_replace($holder, '(' . $route['requirements'][$match[1][$i]] . ')', $route['pattern']);
            }
        }
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $params = $match[1];
        return array($pattern, $params);
    }

    /**
     * Route generating
     * @param $name
     * @param array $params
     * @return string @pattern
     * @throws \Framework\Exception\RouteException
     */
    public function generate($name, $params = array())
    {
        if (!isset($this->routes[$name])) {
            throw new RouteException('There is no route with name ' . $name . '.');
        }
        $pattern = $this->routes[$name]['pattern'];
        foreach ($params as $key => $value) {
            $pattern = str_replace('{' . $key . '}', $value, $pattern);
        }
        if ((strpos($pattern, '{') !== false) || (strpos($pattern, '}')) !== false) {
            throw new RouteException('There are not enough parameters for this route ' . $name . '.');
        }
        return $pattern;
    }
}