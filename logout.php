<?php
session_start();
include 'core/functions.php';
redirect('login.php');
session_destroy();
die();


