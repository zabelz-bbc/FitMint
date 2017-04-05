<?php
class KommentarArray {
	private $id;
	private $post_id;
	private $inhalt;
	private $email;
	private $benutzer_id;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
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
	
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getBenutzer_id() {
		return $this->benutzer_id;
	}
	public function setBenutzer_id($benutzer_id) {
		$this->benutzer_id = $benutzer_id;
	}

}

?>