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
	public function createUser() {
		$view = new View ( 'user_create' );
		$view->title = 'Benutzer erstellen';
		$view->heading = 'Benutzer erstellen';
		$view->active = 'login';
		$view->display ();
	}
	public function doCreateUser() {
		$email = $_POST ['email'];
		$password = $_POST ['password'];
		
		$userRepository = new UserRepository ();
		$userRepository->create ( $email, $password );
		header ( 'Location: /home' );
		exit ();
	}
	public function loginToAccount() {
		$email = $_POST ['email'];
		$password = $_POST ['password'];
		$userRepository = new UserRepository ();
		$row = $userRepository->loginToAccount ( $email, $password );
		
		if ($row != NULL) {
			
			$_SESSION ['email'] = $row->email;
			$_SESSION ['loggedInUserId'] = $row->id;
			$_SESSION ['loggedin'] = true;
			echo "Sie sind eingellogt als: " . $_SESSION ['email'];
			header ( 'Location: /home' );
			exit ();
		} else {
			echo "Zugriff verweigert";
		}
	}
	public function delete() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_GET ['id'] );
		header ( 'Location: /user' );
	}
	
	public function logout() {
		session_destroy ();
		header ( 'Location: /home' );
		$view->display ();
	}
	
	public function like() {
		if (session == "IchBinOnline") {
			if (like) {
	
			}
		}
	}
	
}
?>