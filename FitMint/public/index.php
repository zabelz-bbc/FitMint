<?php
require_once '../lib/Dispatcher.php';
require_once '../lib/View.php';

try{
session_start();
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
 } catch (Exception $e){
header("location: /");
 }
 ?>