<?php
require_once '../repository/KommentarRepository.php';
class KommentarController {
	public function doCreateComment() {
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->saveComment ( $_SESSION ['loggedInUserId'], $_POST ["postId"], $_POST ["Kommentar"] );
		
		header ( "Location: /" ); // Location macht eine neue Anfrage und gelangt zur index Funktion. Diese ruft die Home Seite auf.
		exit ();
	}
	
	public function doChangeComment(){
		$kommentarRepository = new KommentarRepository();
		$kommentarRepository->changeKommentar($id, $benutzerId);
	}
	
	public function doGetComment(){
		$kommentarGetRepository = new KommentarRepositoryGet();
		$kommentarGetRepository->getKommentar();
		return $kommentarGetRepository;
	}
}
?>