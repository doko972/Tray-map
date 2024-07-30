<?php
session_start();
include 'includes/_database.php';
include 'includes/_functions.php';
include 'includes/_config.php';

if (!isset($_REQUEST['action'])) {
    redirectTo('index.php');
}

preventCSRF();