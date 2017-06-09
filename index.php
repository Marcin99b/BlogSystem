<?php

//Router
require_once 'libs/Router.php';

//Interfaces
require_once 'interfaces/CrudInterface.php';

//MVC
require_once 'libs/Controller.php';
require_once 'libs/Model.php';
require_once 'libs/View.php';

//Start routing (start program) when all files loaded
$router = new Router();
