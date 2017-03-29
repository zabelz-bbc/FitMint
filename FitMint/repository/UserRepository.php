<?php
require_once '../lib/Repository.php';

class UserRepository extends Repository {

	/**
	 * Diese Variable wird von der Klasse Repository verwendet, um generische
	 * Funktionen zur Verfügung zu stellen.
	 */
	protected $tableName = 'benutzer';
	
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
		
		$query = "INSERT INTO {$this->tableName} (email, passwort) VALUES (?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'ss', $email, $password );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		return $statement->insert_id;
	}
	
	/**
	 *
	 * @param unknown $email        	
	 * @param unknown $password        	
	 * @throws Exception
	 * @return unknown|NULL
	 */
	public function loginToAccount($email, $password) {

		$query = "SELECT * FROM {$this->tableName} WHERE email=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 's', $email );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		} else {
			$result = $statement->get_result ();
			$row = $result->fetch_object ();
			$hashedPassword = $row->passwort;
			
			if (password_verify ( $password, $hashedPassword )) {
				return $row;
			}
			
			return null;
		}
	}
	
}
?>
