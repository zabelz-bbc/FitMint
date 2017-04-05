<?php
require_once '../repository/UserRepository.php';
require_once '../repository/VoteRepository.php';
class UserController {
	
	public function index() {
		$userRepository = new UserRepository ();
		$view = new View ( 'user_index' );
		$view->title = 'Benutzer';
		$view->heading = '';
		$view->users = $userRepository->readAll ();
		$view->active = 'home';
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
		$view->active = 'einstellungen';
		$view->display ();
	}
	
	public function doCreateUser() {
		$email = $_POST ['email'];
		$password = $_POST ['password'];
		$userRepository = new UserRepository ();
		$userRepository->create ( $email, $password );
		header ( 'Location: /home' );
		$this->loginToAccount ();
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
			$view = new View ('loginFailure');
			$view->active = 'login';
			$view->display();
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
	}
	
	public function like() {
		if (isset ( $_SESSION ["loggedin"] )) {
			$voteRepository = new VoteRepository ();
			$anzLikes = $voteRepository->getAnzLike ( $_POST ["postId"] );
			$anzLikes ["anzLike"] += 1;
			$voteRepository->setAnzLike ( $_POST ["postId"], $anzLikes ["anzLike"] );
			header ( 'Location: /home' );
		}
	}
	
	public function dislike() {
		if (isset ( $_SESSION ["loggedin"] )) {
			$voteRepository = new VoteRepository ();
			$anzDislikes = $voteRepository->getDislike ( $_POST ["postId"] );
			$anzDislikes ["anzDislike"] += 1;
			$voteRepository->setAnzDislike ( $_POST ["postId"], $anzDislikes ["anzDislike"] );
			header ( 'Location: /home' );
		}
	}
}
?>