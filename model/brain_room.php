<?php 
		class brain_Room{
			private $rid;
			private $room_id;
			private $category;
			private $players;
			private $user_id;
			private $player_type;
			private $num_of_players;
			
			public function __construct(){
				$this->rid = 0;
				$this->room_id = '';
				$this->category = "";
				$this->players = "";
				$this->user_id = "";
				$this->player_type = "";
				$this->num_of_players = 0;
			}

			public function setRid($value){
				$this->rid = $value;
			}
			public function getRid(){
					return $this->rid;
			}

			public function setRoom_id($value){
				$this->room_id = $value;
			}
			public function getRoom_id(){
					return $this->room_id;
			}
			public function setCategory($value){
				$this->category = $value;
			}
			public function getCategory(){
					return $this->category;
			}
			public function setPlayers($value){
				$this->players = $value;
			}
			public function getPlayers(){
					return $this->players;
			}
			public function setUser_id($value){
				$this->user_id = $value;
			}
			public function getUser_id(){
					return $this->user_id;
			}
			public function setPlayer_type($value){
				$this->player_type = $value;
			}
			public function getPlayer_type(){
					return $this->player_type;
			}
			public function setNum_of_players($value){
				$this->num_of_players = $value;
			}
			public function getNum_of_players(){
					return $this->num_of_players;
			}
			
		}


 ?>