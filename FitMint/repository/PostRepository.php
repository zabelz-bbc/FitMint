<?php
require_once '../lib/Repository.php';
require_once 'PostArray.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class PostRepository extends Repository {
	/**
	 * Diese Variable wird von der Klasse Repository verwendet, um generische
	 * Funktionen zur Verfügung zu stellen.
	 */
	protected $tableName = 'post';
	
	/**
	 * Erstellt einen neuen benutzer mit den gegebenen Werten.
	 *
	 * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
	 * Algorythmus gehashed.
	 *
	 * @param $firstName Wert
	 *        	für die Spalte firstName
	 * @param $lastName Wert
	 *        	für die Spalte lastName
	 * @param $email Wert
	 *        	für die Spalte email
	 * @param $password Wert
	 *        	für die Spalte password
	 *        	
	 * @throws Exception falls das Ausführen des Statements fehlschlägt
	 */
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



