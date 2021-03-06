<?php
require_once '../lib/Repository.php';
require_once 'PostArray.php';
class VoteRepository extends Repository {
	protected $tableName = 'post';
	public function getAnzLike($id) {
		$sql = "SELECT anzLike FROM post where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'i', $id ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc ();
			return $row;
		}
	}
	
	public function setAnzLike($id, $anzLike) {
		$sql = "UPDATE post set anzLike=? where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'ii', $id, $anzLike ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
	
	public function getDislike($id) {
		$sql = "SELECT anzDislike FROM post where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'i', $id ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc ();
			return $row ["anzDislike"];
		}
	}
	
	public function setAnzDislike($id, $anzDislike) {
		$sql = "UPDATE post set anzDislike=? where id=?";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		$statement->bind_param ( 'ii', intval ( $id ), $anzDislike ); // eingrenzen was bekommen
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
}
?>

