<?php
require_once '../repository/KommentarRepository.php';
class KommentarController {
	public function doCreateComment() {
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->saveComment ( $_SESSION ['loggedInUserId'], $_POST ["postId"], $_POST ["Kommentar"] );
		header ( "Location: /" ); // Location macht eine neue Anfrage und gelangt zur index Funktion. Diese ruft die Home Seite auf.
		exit ();
	}
	public function doUpdateKommentar() {
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->updateKommentar ( $_POST ["id"], $_POST ['inhalt'] );
		header ('Location: /');
		
	}
	public function doShowKommentar() {
		$view = new View ( 'changeKommentar' );
		$kommentarRepository = new KommentarRepository ();
		$view->title = '';
		$view->heading = '';
		$view->active = 'home';
		$view->kommentarInhalt = $kommentarRepository->showKommentar ( $_GET ['kommentarId'] );
		$view->id = $_GET ['kommentarId'];
		$view->display ();
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