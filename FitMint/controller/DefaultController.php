<?php

require_once 'HomeController.php';

class DefaultController {
	public function index() {
		$homeController = new HomeController ();
		$homeController->index ();
	}
}
