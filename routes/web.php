<?php
use Framework\Router;
use Framework\Render;
use Framework\Template;

Router::get('/', function(): void {
    Render::withTemplate('home.php', [Template::class, 'Main']);
});

Router::get('/login', function(): void {
    Render::withTemplate('login.php', [Template::class, 'Main']);
});

Router::get('/register', function(): void {
    Render::withTemplate('register.php', [Template::class, 'Main']);
});
