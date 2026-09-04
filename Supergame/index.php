<?php
require_once 'env.php';
require_once 'utils/utils.php';
require_once 'Model/Model.php';
require_once 'Model/ModelPlayer.php';
require_once 'View/View.php';
require_once 'View/ViewHome.php';
require_once 'Controller/Controller.php';
require_once 'Controller/ControllerHome.php';

$controller = new ControllerHome(new ModelPlayer(), new ViewHome());
$controller->registerPlayer();
$controller->displayPlayers();
$controller->render();