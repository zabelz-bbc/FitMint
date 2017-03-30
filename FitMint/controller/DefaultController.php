<?php
class DefaultController {
	public function index() {
		// In diesem Fall möchten wir dem Benutzer die View mit dem Namen
		// "default_index" rendern. Wie das genau funktioniert, ist in der
		// View Klasse beschrieben.
		require_once 'HomeController.php';
		$homeController = new HomeController ();
		$homeController->index ();
	}
}
