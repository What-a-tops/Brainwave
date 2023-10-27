<?php 
	class brain_User{
		private $user_id;

		private $acc_name;
		private $acc_path;
		private $acc_type;

		private $lname;
		private $fname;
		private $mname;
		private $address;
		private $contact;
		private $age;
		private $gender;
		private $dob;
		private $username;
		private $password;
		private $usertype;
		private $date;
		private $player_type;
		private $jid;

		private $comments;
		private $data_comms;
		
		private $achiv_counts;
		private $subject;
		private $result;
		private $secret_Quest;
		private $secret_Answer;
		public function __construct(){

			$this->user_id = 0;

			$this->acc_name = '';
			$this->acc_path = '';
			$this->acc_type = '';

			$this->lname = '';
			$this->fname = '';
			$this->mname = 0;
			$this->address = '';
			$this->contact = 0;
			$this->age = 0;
			$this->gender = '';
			$this->username = '';
			$this->password = '';
			$this->usertype = '';
			$this->player_type = "";
			$this->jid = 0;

			$this->comments = '';
			$this->data_comms = '';

			$this->result = '';
			$this->subject = '';
			$this->achiv_counts = 0;

			$this->secret_Quest = '';
			$this->secret_Answer = '';

		}
		public function setUser_id($value){
				$this->user_id = $value;
		}
		public function getUser_id(){
				return $this->user_id;
		}
		public function setAcc_name($value){
				$this->acc_name = $value;
		}
		public function getAcc_name(){
				return $this->acc_name;
		}
		public function setAcc_path($value){
				$this->acc_path = $value;
		}
		public function getAcc_path(){
				return $this->acc_path;
		}
		public function setAcc_type($value){
				$this->acc_type = $value;
		}
		public function getAcc_type(){
				return $this->acc_type;
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
		public function setAddress($value){
				$this->address = $value;
		}
		public function getAddress(){
				return $this->address;
		}
		public function setContact($value){
				$this->contact = $value;
		}
		public function getContact(){
				return $this->contact;
		}
		public function setAge($value){
				$this->age = $value;
		}
		public function getAge(){
				return $this->age;
		}
		public function setDob($value){
				$this->dob = $value;
		}
		public function getDob(){
				return $this->dob;
		}
		public function setGender($value){
				$this->gender = $value;
		}
		public function getGender(){
				return $this->gender;
		}
		public function setUsername($value){
				$this->Username = $value;
		}
		public function getUsername(){
				return $this->Username;
		}
		public function setPassword($value){
				$this->password = $value;
		}
		public function getPassword(){
				return $this->password;
		}
		public function setUsertype($value){
				$this->usertype = $value;
		}
		public function getUsertype(){
				return $this->usertype;
		}
		public function setDate($value){
				$this->date = $value;
		}
		public function getDate(){
				return $this->date;
		}

		public function setPlayer_type($value){
				$this->player_type = $value;
		}
		public function getPlayer_type(){
					return $this->player_type;
		}
		public function setJid($value){
				$this->jid= $value;
		}
		public function getJid(){
					return $this->jid;
		}

		public function setComments($value){
				$this->comments = $value;
		}
		public function getComments(){
					return $this->comments;
		}
		public function setData_comms($value){
				$this->data_comms = $value;
		}
		public function getData_comms(){
					return $this->data_comms;
		}
		public function setAchiv_counts($value){
				$this->achiv_counts = $value;
		}
		public function getAchiv_counts(){
					return $this->achiv_counts;
		}
		public function setSubject($value){
				$this->subject = $value;
		}
		public function getSubject(){
					return $this->subject;
		}
		public function setResult($value){
				$this->result = $value;
		}
		public function getResult(){
					return $this->result;
		}
		public function setSecret_Quest($value){
				$this->secret_Quest = $value;
		}
		public function getSecret_Quest(){
					return $this->secret_Quest;
		}
		public function setSecret_Answer($value){
				$this->secret_Answer = $value;
		}
		public function getSecret_Answer(){
					return $this->secret_Answer;
		}
		
	}




 ?>