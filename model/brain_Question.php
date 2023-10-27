<?php 
		class brain_Question{
			private $qid;
			private $question;
			private $level;
			private $subject;
			private $correct;
			private $choiceB;
			private $choiceC;
			private $choiceD;
			private $answer;
			private $hint;
			private $file_name;
			private $file_path;
			private $file_type;
			private $question_num;
			private $difficulty;
			private $question_id;
			private $room_num;
			private $category;

			public function __construct(){
				$this->qid = 0;
				$this->question = "";
				$this->level = "";
				$this->subject = "";
				$this->correct = "";
				$this->choiceB = "";
				$this->file_path = "";
				$this->file_name = "";
				$this->file_type = "";
				$this->choiceC = "";
				$this->choiceD = "";
				$this->answer = "";
				$this->hint = "";
				$this->question_num = 0;
				$this->question_id = 0;
				$this->difficulty = '';
				$this->question_id = 0;
				$this->room_num = '';
				$this->category = "";
			}

			public function setQid($value){
				$this->qid = $value;
			}
			public function getQid(){
					return $this->qid;
			}
			public function setLevel($value){
				$this->level = $value;
			}
			public function getLevel(){
					return $this->level;
			}public function setSubject($value){
				$this->subject = $value;
			}
			public function getSubject(){
					return $this->subject;
			}
			public function setQuestion($value){
				$this->question = $value;
			}
			public function getQuestion(){
					return $this->question;
			}
			public function setCorrect($value){
				$this->correct = $value;
			}
			public function getCorrect(){
					return $this->correct;
			}
			public function setChoiceB($value){
				$this->choiceB = $value;
			}
			public function getChoiceB(){
					return $this->choiceB;
			}
			public function setChoiceC($value){
				$this->choiceC = $value;
			}
			public function getChoiceC(){
					return $this->choiceC;
			}
			public function setChoiceD($value){
				$this->choiceD = $value;
			}
			public function getChoiceD(){
					return $this->choiceD;
			}
			public function setHint($value){
				$this->hint = $value;
			}
			public function getHint(){
					return $this->hint;
			}
			public function setAnswer($value){
				$this->answer = $value;
			}
			public function getAnswer(){
					return $this->answer;
			}
			public function setfile_name($value){
				$this->file_name = $value;
			}
			public function getfile_name(){
					return $this->file_name;
			}
			public function setfile_path($value){
				$this->file_path = $value;
			}
			public function getfile_path(){
					return $this->file_path;
			}
			public function setfile_type($value){
				$this->file_type = $value;
			}
			public function getfile_type(){
					return $this->file_type;
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
			public function setRoom_num($value){
				$this->room_num = $value;
			}
			public function getRoom_num(){
					return $this->room_num;
			}
			public function setCategory($value){
				$this->category = $value;
			}
			public function getCategory(){
					return $this->category;
			}
		}


 ?>