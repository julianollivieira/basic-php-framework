<?php
use Framework\Router;
use Framework\Request;

require('framework/Request.php');
require('framework/Router.php');
Router::init('/', new Request());

require('controllers/UserController.php');
require('routes/web.php');
require('routes/api.php');

Router::start();
