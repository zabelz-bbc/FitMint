<?php
require_once '../lib/Repository.php';
require_once 'PostArray.php';
class PostRepository extends Repository {
	protected $tableName = 'post';

	public function getPosts() {
		$sql = "SELECT id, bildpfad, beschreibung, titel, anzLike, anzDislike FROM {$this->tableName}";
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$result = $statement->get_result ();
		$array = array ();
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) { // solange es noch daten hat geht es eins nach dem anderen durch in db// fetch holen
				$postArray = new PostArray ();
				$postArray->setPostId ( $row ["id"] );
				$postArray->setBildpfad ( $row ["bildpfad"] );
				$postArray->setBeschreibung ( $row ["beschreibung"] );
				$postArray->setAnzDislike ( $row ["anzDislike"] );
				$postArray->setAnzLike ( $row ["anzLike"] );
				$postArray->setTitel ( $row ["titel"] );
				array_push ( $array, $postArray );
			}
			return $array;
		}
	}
}