<?php
require_once '../lib/Dispatcher.php';
require_once '../lib/View.php';

session_start();	//Werte werden erst eingefügt, wenn sich ein Besucher registriert oder einloggt.
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
