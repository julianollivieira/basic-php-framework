<?php
use Framework\Router;
use Controllers\UserController;

Router::post('/api/login', [UserController::class, 'Login']);
Router::post('/api/register', [UserController::class, 'Register']);
