<?php 
		class brain_score{
			private $sid;
			private $user_id;
			private $acc_path;
			private $lname;
			private $fname;
			private $mname;
			private $score;
			private $room_num;
			private $lvl;
			private $choice;
			private $question_id;
			private $points;
			private $question;
			private $difficulty;
			private $ans;
			private $total_plays;
			private $scoreE;
			private $scoreM;
			private $scoreH;
			private $total_E;
			private $total_M;
			private $total_H;
			private $result;
			private $achiv_counts;
			private $stats;
			public function __construct(){
				$this->sid = 0;
				$this->user_id = "";
				$this->score = 0;
				$this->lname = "";
				$this->fname = "";
				$this->mname = "";
				$this->room_num = "";
				$this->acc_path = "";
				$this->lvl = '';
				$this->choice = '';
				$this->question_id = 0;
				$this->points = 0;
				$this->question = "";
				$this->difficulty = "";
				$this->ans = 0;
				$this->total_plays = 0;
				$this->scoreE = 0;
				$this->scoreM = 0;
				$this->scoreH = 0;
				$this->total_E = 0;
				$this->total_M = 0;
				$this->total_H = 0;
				$this->result = '';
				$this->achiv_counts = 0;
				$this->stats = '';
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
			public function setScore($value){
				$this->score = $value;
			}
			public function getScore(){
					return $this->score;
			}
			public function setLvl($value){
				$this->lvl = $value;
			}
			public function getLvl(){
					return $this->lvl;
			}
			public function setChoice($value){
				$this->choice = $value;
			}
			public function getChoice(){
					return $this->choice;
			}
			public function setQuestion_id($value){
				$this->question_id = $value;
			}
			public function getQuestion_id(){
						return $this->question_id;
			}
			public function setPoints($value){
				$this->points = $value;
			}
			public function getPoints(){
						return $this->points;
			}
			public function setQuestion($value){
				$this->question = $value;
			}
			public function getQuestion(){
					return $this->question;
			}
			public function setDifficulty($value){
				$this->difficulty = $value;
			}
			public function getDifficulty(){
					return $this->difficulty;
			}
			public function setAns($value){
				$this->ans = $value;
			}
			public function getAns(){
					return $this->ans;
			}
			public function setTotal_plays($value){
				$this->total_plays = $value;
			}
			public function getTotal_plays(){
					return $this->total_plays;
			}
			public function setScoreE($value){
				$this->scoreE = $value;
			}
			public function getScoreE(){
					return $this->scoreE;
			}
			public function setScoreM($value){
				$this->scoreM = $value;
			}
			public function getScoreM(){
					return $this->scoreM;
			}
			public function setScoreH($value){
				$this->scoreH = $value;
			}
			public function getScoreH(){
					return $this->scoreH;
			}
			public function setTotal_E($value){
				$this->total_E = $value;
			}
			public function getTotal_E(){
					return $this->total_E;
			}
			public function setTotal_M($value){
				$this->total_M = $value;
			}
			public function getTotal_M(){
					return $this->total_M;
			}
			public function setTotal_H($value){
				$this->total_H = $value;
			}
			public function getTotal_H(){
					return $this->total_H;
			}
			public function setResult($value){
				$this->result = $value;
			}
			public function getResult(){
					return $this->result;
			}
			public function setAchiv_counts($value){
				$this->achiv_counts = $value;
			}
			public function getAchiv_counts(){
					return $this->achiv_counts;
			}
			public function setStats($value){
				$this->stats = $value;
			}
			public function getStats(){
					return $this->stats;
			}

		}


 ?>