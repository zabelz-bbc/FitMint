<?php
class PostArray {
	private $bildpfad;
	private $beschreibung;
	private $titel;
	private $anzLike;
	private $anzDislike;
	private $id;
	
	public function getPostId() {
		return $this->id;
	}
	public function setPostId($id) {
		$this->id = $id;
	}
	
	public function getBildpfad() {
		return $this->bildpfad;
	}
	public function setBildpfad($bildpfad) {
		$this->bildpfad = $bildpfad;
	}
	
	public function getBeschreibung() {
		return $this->beschreibung;
	}
	public function setBeschreibung($beschreibung) {
		$this->beschreibung = $beschreibung;
	}
	
	public function getTitel() {
		return $this->titel;
	}
	public function setTitel($titel) {
		$this->titel = $titel;
	}
	
	public function getAnzDislike() {
		return $this->anzDislike;
	}
	public function setAnzDislike($anzDislike) {
		$this->anzDislike = $anzDislike;
	}
	
	public function getAnzLike() {
		return $this->anzLike;
	}
	public function setAnzLike($anzLike) {
		$this->anzLike = $anzLike;
	}
}
?>