<?php
require_once '../repository/PostRepository.php';
class HomeController {
	public function index() {
		$view = new View ( 'home' );
		$view->title = 'FitMint';
		$postRepository = new PostRepository ();
		$view->array = $postRepository->getPosts ();
		$view->active = 'home';
		$view->display ();
	}
	public function ueberUns() {
		$view = new View ( 'home_ueberUns' );
		$view->title = 'Über uns';
		$view->active = 'ueberUns';
		$view->display ();
	}
	public function einstellungen() {
		$view = new View ( 'user_einstellungen' );
		$view->title = 'Einstellungen';
		$view->heading = '';
		$view->active = 'einstellungen';
		$view->display ();
	}
}
?>
