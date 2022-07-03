<?php
require('models/dbh.php');
require('models/usersModel.php');
require('models/blogModel.php');
require('controllers/appController.php');
require('controllers/usersController.php');

require('controllers/blogController.php');
require('controllers/routesController.php');
$appController = new AppController;
$appController->showTemplate();
$appController->showView();