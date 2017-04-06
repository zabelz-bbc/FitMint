<?php
require_once '../lib/Dispatcher.php';
require_once '../lib/View.php';

 session_start();
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
