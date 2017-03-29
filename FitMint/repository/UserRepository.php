<?php
require_once '../lib/Repository.php';

class UserRepository extends Repository {

	protected $fitmint = 'benutzer';
	
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
			
			if (password_verify ( $password, $hashedPassword )) {
				return $row;
			}
		}
		return null;
	}
	
}
?>
