<?php
require_once '../lib/Repository.php';


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

}
?>
