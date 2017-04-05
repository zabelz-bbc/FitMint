<?php
require_once '../lib/Repository.php';
require_once '../repository/KommentarArray.php';
class KommentarRepository extends Repository {
	protected $tableName = 'kommentar';
	
	/**
	 *
	 * @param unknown $benutzerId        	
	 * @param unknown $postId        	
	 * @param unknown $kommentar        	
	 * @throws Exception
	 * @return unknown
	 */
	public function saveComment($benutzerId, $postId, $kommentar) {
		$query = "INSERT INTO kommentar (benutzer_id, post_id, inhalt) VALUES (?,?,?)";
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'iis', $benutzerId, $postId, $kommentar );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		return $statement->insert_id;
	}
	public function selectComment($postId) {
		$query = "SELECT inhalt FROM fitmint.kommentar WHERE postId=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 's', $kommentar );
		return $kommentar;
	}
	public function selectCommentByKommentarId($kommentarId) {
		$query = "SELECT benutzer_id FROM {$this->tableName} WHERE id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'i', $id );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$row = $result->fetch_assoc ();
		return $row ["benutzerId"];
	}
	public function changeKommentar($id, $inhalt) {
		$sql = "update kommentar set inhalt=? where id=?";
		$statement = Connectionhandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'is', $id, $inhalt );
		if (! $statement->execute ()) {
			throw new exception ( $statement->error );
		}
	}
	public function deleteKommentarById($id) {
		$sql = "DELETE FROM {$this->tableName} WHERE id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'i', $id );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
	public function getKommentar() {
		$sql = "SELECT kommentar.id, post_id, inhalt, email FROM {$this->tableName}
		join fitmint.benutzer on benutzer.id = kommentar.benutzer_id";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$arrayKommentar = array ();
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) { // assoziatives Array: solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
				$kommentarArray = new KommentarArray ();
				$kommentarArray->setId ( $row ["kommentar.id"] );
				$kommentarArray->setPost_id ( $row ["post_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				$kommentarArray->setEmail ( $row ["email"] );
				array_push ( $arrayKommentar, $kommentarArray );
			}
			return $arrayKommentar;
		}
	}
	public function getKommentarbyPostId($post_id) {
		$sql = "SELECT kommentar.id as 'id', benutzer.id as 'user_id', post_id, inhalt, email FROM {$this->tableName} join fitmint.benutzer on benutzer.id = kommentar.benutzer_id where post_id=?";
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
				$kommentarArray->setBenutzer_id( $row ["user_id"] );
				$kommentarArray->setPost_id ( $row ["post_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				$kommentarArray->setEmail ( $row ["email"] );
				array_push ( $array, $kommentarArray );
			}
			return $array;
		}
	}
	public function getKommentarbyBenutzerId($benutzer_id) {
		$sql = "SELECT * FROM {$this->tableName} WHERE benutzer_id = $benutzer_id";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'i', $benutzer_id ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$array = array ();
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) { // solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
				$kommentarArray = new KommentarArray ();
				$kommentarArray->setId ( $row ["id"] );-
				$kommentarArray->setBenutzer_id ( $row ["benutzer_id"] );
				$kommentarArray->setInhalt ( $row ["inhalt"] );
				array_push ( $array, $kommentarArray );
			}
			return $array;
		}
	}
}
?>
