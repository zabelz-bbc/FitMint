<?php
require_once '../repository/KommentarRepository.php';
require_once '../view/editKommentar.php';
class KommentarController {
	
	public function doCreateComment() {
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->saveComment ( $_SESSION ['loggedInUserId'], $_POST ["postId"], $_POST ["Kommentar"] );
		
		header ( "Location: /" ); // Location macht eine neue Anfrage und gelangt zur index Funktion. Diese ruft die Home Seite auf.
		exit ();
	}
	public function doEditKommentar() {
	
		$view = new View ( 'editKommentar' );
		$view->title = 'Kommentar ändern';
		$view->heading = '';
		$view->active = 'home';
		$view->display ();
		
		
		/*header ('Location: /editKommentar' );
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->editKommentar ( $_POST ["id"], $inhalt );*/
	}
	public function doGetKommentar() {
		$kommentarGetRepository = new KommentarRepositoryGet ();
		$kommentarGetRepository->getKommentar ();
		return $kommentarGetRepository;
	}
	public function getPostId() {
		$postArray = new PostArray ();
		$postArray->getPostId ();
		echo $postArray;
		return $postArray;
	}
	public function doDeleteKommentar() {
		$kommentarRepository = new KommentarRepository ();
		$commentId = $_GET ['kommentarId'];
		$userId = $_GET ['benutzerId'];
		$kommentarRepository->deleteKommentarById ( $commentId );
		header ( 'Location: /home' );
	}
}
?>