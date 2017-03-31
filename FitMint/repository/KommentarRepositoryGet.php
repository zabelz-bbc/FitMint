<?php
require_once '../lib/Repository.php';
require_once '../repository/KommentarArray.php';
class KommentarRepositoryGet extends Repository {
	protected $tableName = 'kommentar';
	public function getKommentar() {
		$sql = "SELECT kommentar.id, post_id, inhalt, email   FROM {$this->tableName}
		join fitmint.benutzer on benutzer.id = kommentar.benutzer_id";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$arrayKommentar = array ();
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) { // solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
				$kommentarArray = new KommentarArray ();
				$kommentarArray->setId ( $row ["id"] );
				$kommentarArray->setPost_id ( $row ["post_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				$kommentarArray->setEmail ( $row ["email"] );
				array_push ( $arrayKommentar, $kommentarArray );
			}
			return $arrayKommentar;
		}
	}
	public function getKommentarbyId($post_id) {
		$sql = "SELECT * FROM {$this->tableName} join fitmint.benutzer on benutzer.id = kommentar.benutzer_id where post_id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'i', $post_id ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$array = array ();
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) { // solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
				$kommentarArray = new KommentarArray ();
				$kommentarArray->setId ( $row ["id"] );
				$kommentarArray->setPost_id ( $row ["post_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				$kommentarArray->setEmail ( $row ["email"] );
				array_push ( $array, $kommentarArray );
			}
			return $array;
		}
	}
	
	// public function getKommentarId($post_id, $benutzer_id){
	// $sql = "SELECT id FROM {$this->tableName}";
	// $statement = ConnectionHandler::getConnection ()->prepare ( $sql );
	// }
}
		