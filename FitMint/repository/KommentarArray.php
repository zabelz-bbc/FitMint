<?php
class PostArray {
	private $id;
	private $benutzer_id;
	private $post_id;
	private $inhalt;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getBenutzer_id() {
		return $this->benutzer_id;
	}
	public function setBenutzer_id($benutzer_id) {
		$this->benutzer_id = $benutzer_id;
	}
	
	public function getPost_id() {
		return $this->post_id;
	}
	public function setPost_id($post_id) {
		$this->post_id = $post_id;
	}
	
	public function getInhalt() {
		return $this->inhalt;
	}
	public function setInhalt($inhalt) {
		$this->inhalt = $inhalt;
	}
}

?>