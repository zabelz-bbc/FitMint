<?php
require_once '../lib/Repository.php';
require_once 'PostArray.php';

class PostRepository extends Repository
{
	protected $tableName = 'benutzer_post';

	 
	public function getVote() {

		$sql = "SELECT vote FROM benutzer_post";
		$statement = ConnectionHandler::getConnection()->prepare($sql);

		if (!$statement->execute()) {
			throw new Exception($statement->error);
		}
		$result = $statement -> get_result();
		$array = array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {// solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
			
			}
			return $array;
		}

	}


}



