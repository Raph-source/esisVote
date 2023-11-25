<?php
include('config.php');


if(!isset($_GET['r']))
    $request = 'index';
else
    $request = $_GET['r'];

require(ROUTEUR);
$routeur = new Routeur($request);
$routeur->goToController();
