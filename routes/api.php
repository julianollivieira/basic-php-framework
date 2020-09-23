<?php

Router::add('post', '/api/login', function() {
    echo 'Login API';
});

Router::add('post', '/api/register', function() {
    echo 'Register API';
});
