<?php
require_once '../lib/Repository.php';
require_once 'KommentarArrayLara.php';
class KommentarRepositoryGet extends Repository {
	
	protected $tableName = 'kommentar';
	
	public function getKommentar() {
		$sql = "SELECT * FROM {$this->tableName}";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
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
				$kommentarArray->setBenutzer_id ( $row ["benutzer_id"] );
				$kommentarArray->setPost_id ( $row ["post_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				array_push ( $array, $kommentarArray );
			}
			return $array;
		}
	}
}
		