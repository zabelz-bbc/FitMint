<?php
require_once '../repository/PostRepository.php';
require_once '../repository/KommentarRepository.php';
require_once '../repository/VoteRepository.php';
class HomeController {
	public function index() {
		$view = new View ( 'home' );
		$view->title = 'FitMint';
		$view->active = 'home';
		
		$postRepository = new PostRepository ();
		$postArray = $postRepository->getPosts ();
		$kommentarArray = array ();
		$kommentarRepository = new KommentarRepository ();
		
		foreach ( $postArray as $pa ) 
		{
			$pa->setKommentare($kommentarRepository->getKommentarbyPostId ( $pa->getPostId () ));
		}
		
		$view->postArray = $postArray;
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
