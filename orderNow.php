<?php
session_start(); 
//print_r($_SESSION);
$view = new stdClass();
$view->pageTitle = 'orderNow';
require_once('Views/orderNow.phtml');

