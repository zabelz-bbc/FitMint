<?php
require_once '../lib/Repository.php';
require_once 'PostArray.php';

class PostRepository extends Repository
{
	protected $tableName = 'post';

	 
	public function getAnzLike($id) {

		$sql = "SELECT anzLike FROM post where id=?";
		$statement = ConnectionHandler::getConnection()->prepare($sql);
		$statement->bind_param ( 'i', $id ); // eingrenzen was bekommen
		if (!$statement->execute()) {
			throw new Exception($statement->error);
		}
		$result = $statement -> get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row->anzLike;
		}
	}

	public function getDislike($id) {
	
		$sql = "SELECT anzDislike FROM post where id=?";
		$statement = ConnectionHandler::getConnection()->prepare($sql);
		$statement->bind_param ( 'i', $id ); // eingrenzen was bekommen
		if (!$statement->execute()) {
			throw new Exception($statement->error);
		}
		$result = $statement -> get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row->anzDislike;
		}
	}
}



