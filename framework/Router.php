<?php
namespace Framework;

class Router {

    private static Request $request;
    private static string $basepath;
    private static array $routes = [];
    private static array $supportedHttpMethods = ['GET', 'POST'];

    public static function init(string $basepath, Request $request): void {
        self::$request = $request;
        self::$basepath = ($basepath === '') ? '/' : $basepath;
    }

    public static function __callStatic($name, $args) {
        if(!in_array(strtoupper($name), self::$supportedHttpMethods))
            self::invalidMethodHandler();

        list($route, $function) = $args;
        array_push(self::$routes, [
            'route' => $route,
            'function' => $function,
            'method' => $name
        ]);
    }

    public static function start(): void {
        $route_match_found = false;
        $parsed_url = parse_url(self::$request->requestUri);
        $path = isset($parsed_url['path']) ? $parsed_url['path'] : '/';
        $method = strtolower(self::$request->requestMethod);

        foreach(self::$routes as $route) {
            $b = (self::$basepath !== '/') ? '('.self::$basepath.')' : '';
            $route['route'] = "^{$b}{$route['route']}$";
            if(preg_match("#{$route['route']}#", $path, $matches)) {
                if($method !== $route['method'])
                    self::invalidMethodHandler();
                $route_match_found = true;
                call_user_func_array($route['function'], [self::$request]);
                break;
            }
        }

        if(!$route_match_found)
            self::pageNotFoundHandler();
    }

    private static function invalidMethodHandler(): void {
        header(self::$request->serverProtocol.' 405 Method Not Allowed');
        exit();
    }

    private static function pageNotFoundHandler(): void {
        header(self::$request->serverProtocol.' 404 Not Found');
        exit();
    }

}
