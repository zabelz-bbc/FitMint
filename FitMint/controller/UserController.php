<?php
require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController {
	public function index() {
		$userRepository = new UserRepository ();
		$view = new View ( 'user_index' );
		$view->title = 'Benutzer';
		$view->heading = '';
		$view->users = $userRepository->readAll ();
		$view->active = 'login';
		$view->display ();
	}
	public function login() {
		$userRepository = new UserRepository ();
		
		$view = new View ( 'user_login' );
		$view->title = 'Benutzer';
		$view->heading = '';
		$view->users = $userRepository->readAll ();
		$view->active = 'login';
		$view->display ();
	}
	public function einstellungen() {
		$userRepository = new UserRepository ();
		
		$view = new View ( 'user_einstellungen' );
		$view->title = 'Benutzer';
		$view->heading = '';
		$view->users = $userRepository->readAll ();
		$view->active = 'login';
		$view->display ();
	}
	public function create() {
		$view = new View ( 'user_create' );
		$view->title = 'Benutzer erstellen';
		$view->heading = 'Benutzer erstellen';
		$view->active = 'login';
		$view->display ();
	}
	public function doCreate() {
		if ($_POST ['send']) {
			$firstName = $_POST ['firstName'];
			$lastName = $_POST ['lastName'];
			$email = $_POST ['email'];
			$password = $_POST ['password'];
			
			$userRepository = new UserRepository ();
			$userRepository->create ( $firstName, $lastName, $email, $password );
		}
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
	public function delete() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}