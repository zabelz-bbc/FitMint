<?php
require_once '../repository/KommentarRepository.php';
class KommentarController {
	
	public function doCreateComment() {
		$kommentarRepository = new KommentarRepository ();
		$kommentarRepository->saveComment ( $_SESSION ['loggedInUserId'], $_POST ["postId"], $_POST ["Kommentar"] );
		
		header ( "Location: /" ); // Location macht eine neue Anfrage und gelangt zur index Funktion. Diese ruft die Home Seite auf.
		exit ();
	}
	
	public function doChangeKommentar(){
		$kommentarRepository = new KommentarRepository();
		
		$kommentarRepository->changeKommentar($_POST["id"], $inhalt);
		
	}
	
	public function doGetKommentar(){
		$kommentarGetRepository = new KommentarRepositoryGet();
		$kommentarGetRepository->getKommentar();
		return $kommentarGetRepository;
	}
	
	public function getPostId(){
		$postArray = new PostArray();
		$postArray->getPostId();
		echo $postArray;
		return $postArray;
	}	
	
	public function doDeleteKommentar(){
		$kommentarRepository = new KommentarRepository();
		$kommentarRepository->deleteKommentar($id, $benutzerId);
	}
}
?>