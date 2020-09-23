<?php
use Framework\Router;

require('framework/Router.php');
require('controllers/UserController.php');
require('routes/web.php');
require('routes/api.php');

Router::start('/');
