<?php 
		class brain_Game{
			private $sid;
			private $user_id;
			private $acc_path;
			private $lname;
			private $fname;
			private $mname;
			private $room_num;
			private $room_id;
			public function __construct(){
				$this->sid = 0;
				$this->user_id = "";
				$this->lname = "";
				$this->fname = "";
				$this->mname = "";
				$this->room_num = "";
				$this->room_id = "";
				$this->acc_path = "";

			}

			public function setSid($value){
				$this->sid = $value;
			}
			public function getSid(){
					return $this->sid;
			}
			public function setUser_id($value){
				$this->user_id = $value;
			}
			public function getUser_id(){
					return $this->user_id;
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
			public function setRoom_num($value){
				$this->room_num = $value;
			}
			public function getRoom_num(){
					return $this->room_num;
			}
			public function setRoom_id($value){
				$this->room_id = $value;
			}
			public function getRoom_id(){
					return $this->room_id;
			}
			
		}


 ?>