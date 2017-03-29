<?php
require_once '../lib/Repository.php';

/**
 * Das KommentarRepository ist zuständig für alle Zugriffe auf die Tabelle "kommentar".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class KommentarRepository extends Repository {
	/**
	 * Diese Variable wird von der Klasse Repository verwendet, um generische
	 * Funktionen zur Verfügung zu stellen.
	 */
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
	
	
	/**
	 * todo
	 */
	public function selectComment() {
		$query = "SELECT * FROM fitmint.kommentar WHERE benutzer_id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 's', $kommentar );
	}
}
?>
