<?php

class Router {

    private static array $routes = [];

    public static function add(string $method, string $expression, callable $function): void {
        array_push(self::$routes, [
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ]);
    }

    public static function start($basepath = '/'): void {
        $basepath = ($basepath == '') ? '/' : $basepath;
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        $path = isset($parsed_url['path']) ? $parsed_url['path'] : '/';
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        $path_match_found = false;
        $route_match_found = false;

        foreach(self::$routes as $route) {
            $route['expression'] = "^".($basepath != '/' ? "({$basepath})" : '')."{$route['expression']}$";
            if(preg_match("#{$route['expression']}#", $path, $matches)) {
              $path_match_found = true;
              if($method == $route['method']) {
                array_shift($matches);
                if($basepath != '')
                  array_shift($matches);
                call_user_func_array($route['function'], $matches);
                $route_match_found = true;
                break;
              }
            }
        }
    }
}
