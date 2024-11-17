<?php

if (!session_id()) session_start();

require_once '../app/init.php'; //ketika membuka file index langsung di arahkan ke file ini 
$app = new App;
