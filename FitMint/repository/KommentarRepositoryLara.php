<?php
require_once '../lib/Repository.php';
require_once 'KommentarArrayLara.php';
class KommentarRepositoryLara extends Repository {
	protected $tableName = 'kommentar';
	public function getInhalt() {
		$sql = "Select * from post where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc ();
			return $row;
		}
	}
	public function setKommentar() {
		$sql = "Update kommentar set * where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
}
