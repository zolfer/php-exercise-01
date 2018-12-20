<?php

// para melhor definicao de rotas e controllers em cada situacao
$q = !isset($_GET['q']) ? '' : $_GET['q'];
switch ($q) {
  case 'done':
    require_once 'controller/ListController.php';
    $controller = new ListController();
    echo $controller->done($_POST);
    break;

  case 'del':
      require_once 'controller/ListController.php';
      $controller = new ListController();
      echo $controller->del($_POST);
      break;

  case 'add':
    require_once 'controller/ListController.php';
    $controller = new ListController();
    echo $controller->add($_POST);
    break;

  case '':
  default:
    require_once 'controller/ListController.php';
    $controller = new ListController();
    $controller->list();
}
