<?php
$view = new stdClass();
$view->pageTitle = 'loyalty points page';
require_once('Views/loyalityPoints.phtml');


$LoyaltyPointsDataSet = new LoyaltyPointsDataSet();
$view->LoyaltyPointsDataSet = $LoyaltyPointsDataSet->fetchLoyaltyPoints();

require_once('Views/loyaltypoints.phtml');


?>


