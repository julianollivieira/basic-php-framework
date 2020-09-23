<?php

Router::add('get', '/', function() {
    echo "<h1>Home page</h1>";
});

Router::add('get', '/login', function() {
    echo "<h1>Login page</h1>";
});

Router::add('get', '/register', function() {
    echo "<h1>Register page</h1>";
});
