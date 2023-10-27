<?php 
	class brain_reserveQuestion{
		private $res_id;
		private $room_num;
		private $question_num;
		private $question_id;
		private $difficulty;

		private $question;
		// private $c1, $c2, $c3, $c4;
		private $correct;
		private $category;
		private $total_numQ;
		public function __construct(){
			$this->res_id = 0;
			$this->room_num = 0;
			$this->question_num = 0;
			$this->question_id = 0;
			$this->difficulty = '';
			$this->category = '';
			$this->total_numQ = 0;
		}

		public function setRes_id($value){
				$this->res_id = $value;
		}
		public function getRes_id(){
					return $this->res_id;
		}
		public function setRoom_num($value){
				$this->room_num = $value;
		}
		public function getRoom_num(){
					return $this->room_num;
		}
		public function setQuestion_num($value){
				$this->question_num = $value;
		}
		public function getQuestion_num(){
					return $this->question_num;
		}
		public function setQuestion_id($value){
				$this->question_id = $value;
		}
		public function getQuestion_id(){
					return $this->question_id;
		}
		public function setDifficulty($value){
				$this->difficulty = $value;
		}
		public function getDifficulty(){
					return $this->difficulty;
		}
		public function setCategory($value){
				$this->category = $value;
		}
		public function getCategory(){
					return $this->category;
		}
		public function setTotal_numQ($value){
				$this->total_numQ = $value;
		}
		public function getTotal_numQ(){
					return $this->total_numQ;
		}
	}
 ?>