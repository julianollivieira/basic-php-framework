<?php
use Framework\Router;

Router::get('/', function(): void {
    echo '<h1>Home page</h1>';
});

Router::get('/login', function(): void {
    echo '<h1>Login page</h1>';
});

Router::get('/register', function(): void {
    echo '<h1>Register page</h1>';
});
