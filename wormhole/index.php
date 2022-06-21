<?php
require('helpers.php');
require('models/RoutesModel.php');
require('models/UsersDataModel.php');
require('models/PostsDataModel.php');
require('controllers/UiController.php');

$uiController = new UiController();
$uiController->showTemplate();
$uiController->routing();