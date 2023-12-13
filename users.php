<?php
require_once('Models/UserDataSet.php');

$view = new stdClass();
$view->pageTitle = 'users page';


$userDataSet = new UserDataSet();
$view->userDataSet = $userDataSet->fetchUsers();

require_once('Views/users.phtml');

?>