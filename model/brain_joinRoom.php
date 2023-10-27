<?php 
	class brain_joinRoom{
		private $jid;
		private $jid1;
		private $jid3;
		private $user_id;
		private $room_num;
		private $player_type;
		private $moves;
		private $Quit_server;
		private $score;
		private $difficulty;

		private $lname;
		private $fname;
		private $mname;
		private $user_path;
		private $hint;
		private $buzz;
		private $submit;
		private $quit;
		public function __construct(){
			$this->jid = 0;
			$this->user_id = '';
			$this->room_num = '';
			$this->player_type = "";
			$this->moves = "";
			$this->Quit_server = "";
			$this->score = 0;
			$this->difficulty = '';

			$this->lname = '';
			$this->fname = '';
			$this->mname = '';
			$this->user_path = '';
			$this->hint = '';
			$this->buzz = '';
			$this->submit = '';
			$this->jid1 = 0;
			$this->jid3 = 0;
			$this->quit = '';
		}
		public function setAcc_path($value){
				$this->acc_path = $value;
		}
		public function getAcc_path(){
				return $this->acc_path;
		}
		public function setLname($value){
				$this->lname = $value;
		}
		public function getLname(){
				return $this->lname;
		}
		public function setFname($value){
				$this->fname = $value;
		}
		public function getFname(){
				return $this->fname;
		}
		public function setMname($value){
				$this->mname = $value;
		}
		public function getMname(){
				return $this->mname;
		}

		public function setJid($value){
				$this->jid = $value;
		}
		public function getJid(){
				return $this->jid;
		}

		public function setJid1($value){
				$this->jid1 = $value;
		}
		public function getJid1(){
				return $this->jid1;
		}

		public function setJid3($value){
				$this->jid3 = $value;
		}
		public function getJid3(){
				return $this->jid3;
		}

		public function setUser_id($value){
				$this->user_id = $value;
		}
		public function getUser_id(){
				return $this->user_id;
		}
		
		public function setRoom_num($value){
				$this->room_num = $value;
		}
		public function getRoom_num(){
				return $this->room_num;
		}
		public function setPlayer_type($value){
				$this->player_type = $value;
		}
		public function getPlayer_type(){
				return $this->player_type;
		}
		public function setMoves($value){
				$this->moves = $value;
		}
		public function getMoves(){
				return $this->moves;
		}
		public function setQuit_server($value){
				$this->Quit_server = $value;
		}
		public function getQuit_server(){
				return $this->Quit_server;
		}
		public function setScore($value){
				$this->score = $value;
		}
		public function getScore(){
				return $this->score;
		}
		public function setDifficulty($value){
				$this->difficulty = $value;
		}
		public function getDifficulty(){
				return $this->difficulty;
		}
		public function setHint($value){
				$this->hint = $value;
		}
		public function getHint(){
				return $this->hint;
		}
		public function setBuzz($value){
				$this->buzz = $value;
		}
		public function getBuzz(){
				return $this->buzz;
		}
		public function setSubmit($value){
				$this->submit = $value;
		}
		public function getSubmit(){
				return $this->submit;
		}
		public function setQuit($value){
				$this->quit = $value;
		}
		public function getQuit(){
				return $this->quit;
		}
	}

 ?>