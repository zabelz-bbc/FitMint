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
	 *        	für die Spalte email
	 * @param $password Wert
	 *        	für die Spalte password
	 *        	
	 * @throws Exception falls das Ausführen des Statements fehlschlägt
	 */
	public function create($email, $password) {
		$password = password_hash ( $password, PASSWORD_BCRYPT, array (
				'cost' => 14 
		) );
		
		$query = "INSERT INTO $this->fitmint (email, password) VALUES (?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ss', $email, $password );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		return $statement->insert_id;
	}
}
