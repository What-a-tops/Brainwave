<?php 
	
	class brain_scoreDB 
	{
		public $pdo;
		public function __construct(){
			$this->pdo = Database::getDB();
		}
		public function brain_addScore($brain_score){
			$score = $brain_score->getScore();
			$user_id = $brain_score->getUser_id();
			$room_num = $brain_score->getRoom_num();
			$lvl = $brain_score->getLvl();

			$stmt = $this->pdo->prepare("SELECT * FROM brain_score WHERE user_id = ? AND room_num = ? AND difficulty = ?");
			$stmt->execute(array($user_id,$room_num,$lvl));
			$result = $stmt->fetch();
			
				if ($lvl == 'Easy' || $lvl == 'Moderate' || $lvl == 'Hard') {
					if (empty($result['user_id']) AND empty($result['room_num']) AND empty($result['score'])) {
						$stmt = $this->pdo->prepare("INSERT INTO brain_score SET user_id = ?, room_num = ?, score = ?, difficulty = ?");
						$stmt->execute(array($user_id,$room_num,$score,$lvl));
					}else{
						$nscor = $score + $result['score'];
						$stmt = $this->pdo->prepare("UPDATE brain_score SET score = ? WHERE room_num = ? AND user_id = ? AND difficulty = ?");
						$stmt->execute(array($nscor,$result['room_num'],$result['user_id'],$lvl));
					}
				}
		}
		public function UpdateStats($brain_score,$qid){
			$user_id = $brain_score->getUser_id();
			$room_num = $brain_score->getRoom_num();
			$stmt = $this->pdo->prepare("UPDATE brain_stats SET qid = ? WHERE room_num = ? AND user_id = ?");
		    $stmt->execute(array($qid,$room_num,$user_id));
		}
		public function brain_addResult($brain_score){
			$user_id = $brain_score->getUser_id();
			$room_num = $brain_score->getRoom_num();
			$lvl = $brain_score->getLvl();
			$choice = $brain_score->getChoice();
			$qid = $brain_score->getQuestion_id();

			if ($choice == 'correct') {
				$points = 1;
			}else{
				$points = 0;
			}

			$stmt = $this->pdo->prepare("SELECT question FROM brain_question WHERE bid = ?");
			$stmt->execute(array($qid));
			$result = $stmt->fetch();

			$stmt = $this->pdo->prepare("INSERT INTO brain_result SET user_id = ?, question = ?, room_num = ?, difficulty = ?, choice = ?, points = ? , qid = ?");
			$stmt->execute(array($user_id,$result['question'],$room_num,$lvl,$choice,$points,$qid));
		}
		public function brain_addAns_Stats($brain_score){
			$user_id = $brain_score->getUser_id();
			$room_num = $brain_score->getRoom_num();
			$ans = 'Answer';
			$stmt = $this->pdo->prepare("INSERT INTO brain_finish SET user_id = ?, room_num = ?, ans = ?");
			$stmt->execute(array($user_id,$room_num,$ans));
		}
		public function get_results($user_id,$room_id,$lvl){
			$stmt = $this->pdo->prepare("SELECT * FROM brain_result WHERE user_id = ? AND room_num = ? AND difficulty = ?");
			$stmt->execute(array($user_id,$room_id,$lvl));
			$result = $stmt->fetchAll();
			$brain_scores = array();
			foreach ($result as $k) {
				$brain_score = new brain_score();
				$brain_score->setQuestion($k['question']);
				$brain_score->setChoice($k['choice']);
				$brain_score->setPoints($k['points']);
				$brain_score->setDifficulty($k['difficulty']);
				$brain_scores[] = $brain_score;
			}
			return $brain_scores;
		}
		public function get_numQuestions($room_id){
			$stmt = $this->pdo->prepare("SELECT COUNT(*) AS E FROM reserve_question WHERE room_num = ? AND difficulty = 'Easy'");
			$stmt->execute(array($room_id));
			$emh = $stmt->fetch();
			
			$brain_score = new brain_score();
			$brain_score->setTotal_E($emh['E']);
			return $brain_score;
		}
		public function get_results_total($room_id,$user_id){
			$us = $user_id;
			$stmt = $this->pdo->prepare("SELECT COUNT(*) AS E FROM reserve_question WHERE room_num = ? AND difficulty = 'Easy'");
			$stmt->execute(array($room_id));
			$result1 = $stmt->fetch();
			
			$stmt = $this->pdo->prepare("SELECT COUNT(*) AS M FROM reserve_question WHERE room_num = ? AND difficulty = 'Moderate'");
			$stmt->execute(array($room_id));
			$result2 = $stmt->fetch();

			$stmt = $this->pdo->prepare("SELECT COUNT(*) AS H FROM reserve_question WHERE room_num = ? AND difficulty = 'Hard'");
			$stmt->execute(array($room_id));
			$result3 = $stmt->fetch();

			$stmt = $this->pdo->prepare("SELECT subject FROM reserve_question WHERE room_num = ?");
			$stmt->execute(array($room_id));
			$sub = $stmt->fetch();

			$stmt = $this->pdo->prepare("SELECT SUM(score) AS S FROM brain_score WHERE room_num = ? AND user_id = ?");
			$stmt->execute(array($room_id,$user_id));
			$total = $stmt->fetch();

			$stmt = $this->pdo->prepare("SELECT * FROM brain_achievements WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$achiv = $stmt->fetch();

			if ($total['S'] == 15 || $total['S'] == 18 || $total['S'] == 21 || $total['S'] == 24 || $total['S'] == 27 || $total['S'] == 30) {
				$result = 'Master';
			}elseif ($total['S'] >= 13 && $total['S'] <= 15 || $total['S'] >= 16 && $total['S'] <= 18 || $total['S'] >= 19 && $total['S'] >= 21 || $total['S'] <= 22 && $total['S'] >= 24 || $total['S'] <= 25 && $total['S'] >= 27 || $total['S'] <= 28 && $total['S'] >= 30) {
				$result = 'Expert';
			}elseif ($total['S'] >= 12 && $total['S'] <= 14 || $total['S'] <= 15 && $total['S'] >= 17 || $total['S'] <= 18 && $total['S'] >= 20 || $total['S'] <= 21 && $total['S'] >= 23 || $total['S'] <= 24 && $total['S'] >= 26) {
				$result = 'Best';
			}else{
				$result = 'Average';
			}

			if ($result == 'Master' || $result == 'Expert' || $result == 'Best') {
				if (empty($achiv['user_id'])) {
					$stmt = $this->pdo->prepare("INSERT INTO brain_achievements SET user_id = ?, achiv_counts = ?, subject = ?, result = ?");
					$stmt->execute(array($user_id,1,$sub['subject'],$result));
				}else if ($achiv['user_id'] == $user_id) {
						$aw = $achiv['achiv_counts'] + 1;
						$stmt = $this->pdo->prepare("UPDATE brain_achievements SET achiv_counts = ?,subject = ?, result = ? WHERE user_id = ?");
						$stmt->execute(array($aw,$sub['subject'],$result,$user_id));
				}
			}

			$brain_score = new brain_score();
			$brain_score->setTotal_E($result1['E']);
			$brain_score->setTotal_M($result2['M']);
			$brain_score->setTotal_H($result3['H']);
			return $brain_score;
		}
		
		public function get_results1($room_id){
			$stmt = $this->pdo->prepare("SELECT brain_buzz.user_id, register.* FROM brain_buzz, register WHERE brain_buzz.room_id = ? AND brain_buzz.user_id =  register.user_id LIMIT 10");
			$stmt->execute(array($room_id));
			$resultt = $stmt->fetchAll();	
	
			$brain_scores = array();
			foreach ($resultt as $k) {
				$brain_score = new brain_score();
				$brain_score->setUser_id($k['user_id']);

				$brain_score->setAcc_path($k['user_path']);
				$brain_score->setLname($k['lname']);
				$brain_score->setFname($k['fname']);
				$brain_score->setMname($k['middlename']);
				$brain_score->setRoom_num($room_id);
				
				$stmt = $this->pdo->prepare("SELECT * FROM brain_score WHERE user_id = ? AND difficulty = 'Easy'");
				$stmt->execute(array($k['user_id']));
				$r1 = $stmt->fetch();
				$brain_score->setScoreE($r1['score']);

				$stmt = $this->pdo->prepare("SELECT * FROM brain_score WHERE user_id = ? AND difficulty = 'Moderate'");
				$stmt->execute(array($k['user_id']));
				$r2 = $stmt->fetch();
				$brain_score->setScoreM($r2['score']);

				$stmt = $this->pdo->prepare("SELECT * FROM brain_score WHERE user_id = ? AND difficulty = 'Hard'");
				$stmt->execute(array($k['user_id']));
				$r3 = $stmt->fetch();
				$brain_score->setScoreH($r3['score']);

				$brain_scores[] = $brain_score;

			}
			return $brain_scores;
		}
		public function get_mod($room_id,$lvl){
			$stmt = $this->pdo->prepare("SELECT difficulty FROM brain_result WHERE room_num = ? AND difficulty = ?");
			$stmt->execute(array($room_id,$lvl));
			$result = $stmt->fetch();
			$brain_score = new brain_score();
			if ($result['difficulty'] == 'Easy') {
				$brain_score->setDifficulty('Easy');
			}elseif ($result['difficulty'] == 'Moderate') {
				$brain_score->setDifficulty('Moderate');
			}elseif ($result['difficulty'] == 'Hard') {
				$brain_score->setDifficulty('Hard');
			}
			return $brain_score;
		}
		public function addQuitGame($room_id,$user_id,$quit){
			$stmt = $this->pdo->prepare("INSERT INTO brain_QuitGame SET room_id = ?, user_id = ?, quit = ?");
			$stmt->execute(array($room_id,$user_id,$quit));
		}
		public function get_achiv($user_id){
			$stmt = $this->pdo->prepare("SELECT * FROM brain_achievements WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$results = $stmt->fetch();

			$brain_score = new brain_score();
		
			if ($results['result'] == 'Master' || $results['result'] == 'Expert' || $results['result'] == 'Best') {
				$brain_score->setDifficulty($results['subject']);
				$brain_score->setAchiv_counts($results['achiv_counts']);
				$brain_score->setResult($results['result']);
			}
			return $brain_score;
		}
	}



 ?>