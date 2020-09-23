<?php
use Framework\Router;
use Controllers\UserController;

Router::add('post', '/api/login', [UserController::class, 'Login']);
Router::add('post', '/api/register', [UserController::class, 'Register']);
