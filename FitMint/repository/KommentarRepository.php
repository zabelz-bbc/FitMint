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
	public function changeKommentar($id, $inhalt) {
		$sql = "update kommentar set inhalt=? where id=?";
		$statement = connectionhandler::getconnection ()->prepare ( $sql );
		$statement->bind_param ( 'is', $id, $inhalt );
		if (! $statement->execute ()) {
			throw new exception ( $statement->error );
		}
	}
	public function deleteKommentar($id, $benutzerId) {
		$sql = "DELETE * FROM fitmint.kommentar WHERE id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'iiis', $id,  $benutzerId, $post_id, $inhalt );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
	}
	
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
	
	public function getKommentarbyPostId($post_id) {
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

}
?>
