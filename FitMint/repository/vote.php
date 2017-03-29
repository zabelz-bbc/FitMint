<?php

class PostArray{
	private $vote;
	private $benutzer_id;
	private $id;
	

	public function getVote() {
		return $this->vote;
	}
	public function setVote($vote) {
		$this->vote = $vote;
	}


	public function getBenutzer_id() {
		return $this->Benutzer_id;
	}
	public function setBenutzer_id($benutzer_id) {
		$this->benutzer_id = $benutzer_id;
	}


	public function getId() {
		return $this->Id;
	}
	public function setId($id) {
		$this->Id = $id;
	}
}

?>