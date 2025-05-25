<?php
  define('BASE_URL', '/eventos_proponto_challenge/public');
  require_once '../config/db.php';
  require_once '../app/controllers/EventoController.php';

  $route = $_GET['route'] ?? 'evento/index';
  list($controller, $action) = explode('/', $route);

  $controllerName = ucfirst($controller) . 'Controller';
  $controllerInstance = new $controllerName();
  $controllerInstance->$action();