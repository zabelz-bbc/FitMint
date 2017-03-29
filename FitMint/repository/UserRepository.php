<?php
require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository {
	/**
	 * Diese Variable wird von der Klasse Repository verwendet, um generische
	 * Funktionen zur Verfügung zu stellen.
	 */
	protected $fitmint = 'benutzer';
	
	/**
	 * Erstellt einen neuen benutzer mit den gegebenen Werten.
	 *
	 * Das Passwort wird vor dem ausführen des Queries noch mit dem password_hash
	 * Algorythmus gehashed.
	 *
	 * @param $email Wert
	 *        	füsr die Spalte email
	 * @param $password Wert
	 *        	für die Spalte password
	 *        	
	 * @throws Exception falls das Ausführen des Statements fehlschlägt
	 */
	public function create($email, $password) {
		$password = password_hash ( $password, PASSWORD_BCRYPT, array (
				'cost' => 14 
		) );
		
		$query = "INSERT INTO {$this->fitmint} (email, passwort) VALUES (?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ss', $email, $password );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		return $statement->insert_id;
	}
	public function loginToAccount($email, $password) {
		$query = "SELECT * FROM {$this->fitmint} WHERE email=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 's', $email );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		} else {
			$result = $statement->get_result ();
			$row = $result->fetch_object ();
			$hashedPassword = $row->passwort;

			if (password_verify ( $password, $dbPw )) {

			if (password_verify ( $password, $hashedPassword )) {
				return $row;
			}
		}
		return null;
	}
	}
	
	public function saveComment($kommentar) {
		
		$query = "INSERT INTO {$this->fitmint} (kommentar) VALUES (?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 's', $kommentar );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		return null;
	}
	
	public function selectComment() {
		$query = "SELECT * FROM {$this->fitmint} WHERE benutzer_id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 's', $kommentar );
	}
}
?>
