<?php 
		class brain_joinRoomDB{
			public function join_to_room($brain_joinRoom){
				$pdo = Database::getDB();
				$jid = $brain_joinRoom->getJid();
				$user_id = $brain_joinRoom->getUser_id();
				$room_num = $brain_joinRoom->getRoom_num();
				$player_type = $brain_joinRoom->getPlayer_type();
				$stmt = $pdo->prepare("INSERT INTO brain_joinroom SET rid = ?, user_id = ?, room_num = ?, player_type = ?");
				$stmt->execute(array($jid,$user_id,$room_num,$player_type));
			}public function getJoin_Room($brain_joinRoom){
				$pdo = Database::getDB();
				$jid = $brain_joinRoom->getJid();
				$user_id = $brain_joinRoom->getUser_id();
				$room_num = $brain_joinRoom->getRoom_num();
				$player_type = $brain_joinRoom->getPlayer_type();
				$stmt = $pdo->prepare("SELECT * FROM register, brain_joinroom WHERE brain_joinroom.user_id = register.user_id AND room_num = ?");
				$stmt->execute(array($room_num));
				$result = $stmt->fetchAll();
				$brain_joinUsers = array();
				foreach ($result as $j) {
						$brain_User = new brain_User();
						$brain_User->setJid($j['rid']);
						$brain_User->setAcc_path($j['user_path']);
						$brain_User->setAddress($j['address']);
						$brain_User->setContact($j['contact']);
						$brain_User->setAge($j['age']);
						$brain_User->setGender($j['gender']);
						$brain_User->setUser_id($j['user_id']);
						$brain_User->setFname($j['fname']);
						$brain_User->setLname($j['lname']);
						$brain_User->setMname($j['middlename']);
						$brain_User->setPlayer_type($j['player_type']);

							$stmt = $pdo->prepare("SELECT * FROM brain_achievements WHERE user_id = ?");
							$stmt->execute(array($j['user_id']));
							$row = $stmt->fetch();
					
							if (empty($row['achiv_counts'])) {
									$brain_User->setAchiv_counts(0);
							}else{
									$brain_User->setAchiv_counts($row['achiv_counts']);
							}

							if (empty($row['subject'])) {
									$brain_User->setSubject('N/A');
							}else{
									$brain_User->setSubject($row['subject']);
							}

							if (empty($row['result'])) {
									$brain_User->setResult('N/A');
							}else{
									$brain_User->setResult($row['result']);
							}

				$brain_joinUsers[] = $brain_User;
				}
				return $brain_joinUsers;
			
			}public function get_Users($brain_score){
				$pdo = Database::getDB();

				$lvl = $brain_score->getLvl();
				$room_id = $brain_score->getRoom_num();

				$stmt = $pdo->prepare("SELECT brain_joinroom.user_id, brain_score.score, register.* FROM brain_joinroom, brain_score, register
				WHERE brain_joinroom.room_num  = ? AND register.user_id = brain_joinroom.user_id AND
				brain_score.user_id = brain_joinroom.user_id AND brain_score.difficulty = ? ORDER BY brain_score.score DESC LIMIT 10");
				$stmt->execute(array($room_id,$lvl));
				$rooms = $stmt->fetchAll();
				$brain_scores = array();
				foreach ($rooms as $v) {
					$brain_score = new brain_score();
					 $brain_score->setScore($v['score']);
					 $brain_score->setLname($v['lname']);
					 $brain_score->setFname($v['fname']);
					 $brain_score->setMname($v['middlename']);
					 $brain_score->setAcc_path($v['user_path']);
					 $brain_score->setUser_id($v['user_id']);
					 $brain_scores[] = $brain_score;
				}
				return $brain_scores;
			}
			public function get_Users_stats($brain_score,$user_id){
				$pdo = Database::getDB();
				$lvl = $brain_score->getLvl();
				$room_id = $brain_score->getRoom_num();

	$stmt = $pdo->prepare("SELECT * FROM brain_score WHERE room_id = ? AND difficulty = ? AND stats = 'ok'");	
				$stmt->execute(array($room_id,$lvl));
				$rooms = $stmt->fetch();
					 $brain_score = new brain_score();
					 $brain_score->setStats($rooms['stats']);
					 $brain_score->setUser_id($rooms['user_id']);
				return $brain_score;
			}
			public function get_Anu($room_id,$qid,$user_id){
				$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT choice FROM brain_result WHERE room_num = ? AND qid = ? AND user_id = ?");
				$stmt->execute(array($room_id,$qid,$user_id));
				$rooms = $stmt->fetch();
				$brain_score = new brain_score();
				$brain_score->setStats($rooms['choice']);
				return $brain_score;
			}
			public function total_play($room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("SELECT room_num FROM brain_joinroom WHERE room_num = ?");
				$stmt->execute(array($room_id));
				$result1 = $stmt->fetchAll();
				$counts = 0;
				$brain_score = new brain_score();
				foreach ($result1 as $a) {
					$counts += 1;
				}
				$brain_score->setTotal_plays($counts);
				return $brain_score;
			}
			
			public function brain_finish($room_id){
				$pdo = Database::getDB();
				$ans = 'Answer';
				$stmt = $pdo->prepare("SELECT * FROM brain_finish WHERE room_num = ? AND ans = ?");
				$stmt->execute(array($room_id,$ans));
				$result2 = $stmt->fetchAll();
				$anss = 0;
				$brain_score = new brain_score();
				foreach ($result2 as $b) {
					$anss += 1;
				}
				$brain_score->setAns($anss);
				return $brain_score;
			}
			public function addMoves($gam_start,$user_id,$room_id,$player_type){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_moves WHERE user_id = ? AND room_id  = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				if (empty($result['moves']) || empty($result['user_id']) || empty($result['room_id'])) {
						if ($player_type == 'Server') {
							$stmt = $pdo->prepare("INSERT INTO brain_moves SET moves = ?, user_id = ?, room_id = ?");
							$stmt->execute(array($gam_start,$user_id,$room_id));
						}
						
			    }else{
			    		$stmt = $pdo->prepare("UPDATE brain_moves SET moves = ? WHERE user_id = ? AND room_id = ?");
						$stmt->execute(array($gam_start,$user_id,$room_id));
				}
			}
			public function addSubmit($submit,$user_id,$room_id,$question_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("INSERT INTO brain_button_Submit SET submit = ?, user_id = ?, room_id = ?, question_num = ?");
				$stmt->execute(array($submit,$user_id,$room_id,$question_id));
			}
			public function get_Moves($user_id,$room_id){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_moves WHERE user_id = ? AND room_id  = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setMoves($result['moves']);
				$brain_joinroom->setUser_id($result['user_id']);
				$brain_joinroom->setRoom_num($result['room_id']);
				return $brain_joinroom;
			}public function get_submit($user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("SELECT * FROM brain_button_Submit WHERE user_id = ? AND room_id = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setSubmit($result['submit']);
				$brain_joinroom->setUser_id($result['user_id']);
				return $brain_joinroom;
			}public function get_buzz($user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("SELECT * FROM brain_buzz WHERE user_id = ? AND room_id = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setBuzz($result['buzz']);
				$brain_joinroom->setUser_id($result['user_id']);
				return $brain_joinroom;
			}public function get_buzzStats($qid,$user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("SELECT COUNT(*) AS C FROM brain_buzz_result WHERE question_num = ? AND room_id = ? AND buzz_result = 'correct'");
				$stmt->execute(array($qid,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setJid($result['C']);

				$stmt = $pdo->prepare("SELECT * FROM brain_buzz_result WHERE question_num = ? AND user_id = ? AND room_id = ?");
				$stmt->execute(array($qid,$user_id,$room_id));
				$result1 = $stmt->fetch();
				$brain_joinroom->setBuzz($result1['buzz_result']);

				$stmt = $pdo->prepare("SELECT COUNT(*) AS W FROM brain_buzz_result WHERE question_num = ? AND room_id = ? AND buzz_result = 'wrong'");
				$stmt->execute(array($qid,$room_id));
				$result = $stmt->fetch();
				$brain_joinroom->setJid1($result['W']);

				$stmt = $pdo->prepare("SELECT COUNT(*) AS P FROM brain_buzz_result WHERE question_num = ? AND room_id = ?");
				$stmt->execute(array($qid,$room_id));
				$result2 = $stmt->fetch();
				$brain_joinroom->setJid3($result2['P']);

				return $brain_joinroom;
			}public function get_Hint($user_id,$room_id){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_hint WHERE user_id = ? AND room_id = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setHint($result['hint']);
				$brain_joinroom->setUser_id($result['user_id']);
				return $brain_joinroom;
			}public function get_Quit($user_id,$room_id){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_QuitGame WHERE room_id = ? AND quit = 'Quit'");
				$stmt->execute(array($room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setQuit($result['quit']);
				$stmt = $pdo->prepare("SELECT * FROM register WHERE user_id = ?");
				$stmt->execute(array($result['user_id']));
				$uid = $stmt->fetch();
				$brain_joinroom->setFname($uid['fname']);
				return $brain_joinroom;
			}public function add_Hint($movs,$user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("INSERT INTO brain_hint SET hint = ?, user_id = ?, room_id = ?");
				$stmt->execute(array($movs,$user_id,$room_id));
			}public function add_Buzz($buzz,$user_id,$room_id){
				$pdo = Database::getDB();
				// $stmt = $pdo->prepare("UPDATE brain_buzz SET buzz = ? WHERE user_id = ? AND room_id = ?");
				// $stmt = $pdo->prepare("UPDATE brain_buzz_current AS t1 INNER JOIN (SELECT COUNT(*) AS C FROM brain_buzz_current AS t2 WHERE t2.user_id = '') aux SET t1.user_id = ? WHERE aux.C = 0 AND t1.qid = ? AND t1.room_id = ?");

				$stmt = $pdo->prepare("UPDATE brain_buzz AS t1 INNER JOIN (SELECT COUNT(*) AS C FROM brain_buzz AS t2 WHERE t2.user_id != ? AND t2.room_id = ? AND t2.buzz = ?) aux SET t1.buzz = ? WHERE aux.C = 0 AND t1.room_id = ? AND t1.user_id = ?");
				$stmt->execute(array($user_id,$room_id,$buzz,$buzz,$room_id,$user_id));
				// $stmt->execute(array($buzz,$user_id,$room_id));

				$stmt =$pdo->prepare("SELECT * FROM brain_buzz WHERE room_id = ? AND user_id = ?");
				$stmt->execute(array($room_id, $user_id));
				$result = $stmt->fetch();
				if ($result['buzz'] == $buzz) {
					$stmt = $pdo->prepare("SELECT * FROM brain_buzz WHERE room_id = ? AND user_id != ?");

					$stmt->execute(array($room_id,$user_id));
					$result = $stmt->fetchAll();

					$brain_joinRoom = array();

					foreach ($result as $b) {
						if (empty($b['buzz'])) {
							$stmt = $pdo->prepare("UPDATE brain_buzz SET buzz = 'Waiting' WHERE user_id = ?");
							$stmt->execute(array($b['user_id']));	
						}
					}
				}

				
			}public function add_buzzResult($answer,$qid,$user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("UPDATE brain_buzz_result SET buzz_result = ? WHERE question_num = ? AND user_id = ? AND room_id = ?");
				$stmt->execute(array($answer,$qid,$user_id,$room_id));	

			}public function dl_Buzz($room_id){	
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("UPDATE brain_buzz SET buzz = '' WHERE room_id = ?");
				$stmt->execute(array($room_id));	
			}public function del_movs($room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("DELETE FROM brain_finish WHERE room_num = ?");
				$stmt->execute(array($room_id));

			}public function del_Submit($room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("DELETE FROM brain_button_Submit WHERE room_id = ?");
				$stmt->execute(array($room_id));
			}public function g_Submit($user_id,$room_id){
				$pdo = Database::getDB();
				$stmt = $pdo->prepare("SELECT * FROM brain_button_Submit WHERE user_id = ? AND room_id = ?");
				$stmt->execute(array($user_id,$room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setSubmit($result['submit']);
				$brain_joinroom->setUser_id($result['user_id']);
				return $brain_joinroom;
			
			}public function get_Moves_For_Starting($room_id){
				$pdo = Database::getDB();

				$stmt = $pdo->prepare("SELECT * FROM brain_moves WHERE room_id  = ?");
				$stmt->execute(array($room_id));
				$result = $stmt->fetch();

				$brain_joinroom = new brain_joinRoom();
				$brain_joinroom->setMoves($result['moves']);
				$brain_joinroom->setUser_id($result['user_id']);
				$brain_joinroom->setRoom_num($result['room_id']);
				
				return $brain_joinroom;
			}
			public function RestScores($room_id, $user_id){
				$pdo = Database::getDB();
				
				$stmt = $pdo->prepare("SELECT * FROM brain_joinroom WHERE room_num  = ?");
				$stmt->execute(array($room_id));
				$players = $stmt->fetchAll();
				foreach ($players as $v) {
					$stmt = $pdo->prepare("DELETE FROM brain_score WHERE user_id = ?");
					$stmt->execute(array($v['user_id']));

					$stmt = $pdo->prepare("DELETE FROM brain_Hint WHERE user_id = ?");
					$stmt->execute(array($v['user_id']));

					$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE user_id = ?");
					$stmt->execute(array($v['user_id']));

					$stmt = $pdo->prepare("DELETE FROM brain_buzz_result WHERE user_id = ?");
					$stmt->execute(array($v['user_id']));

					$stmt = $pdo->prepare("DELETE FROM brain_button_Submit WHERE user_id = ?");
					$stmt->execute(array($v['user_id']));

					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?, difficulty = 'Easy'");
					$stmt->execute(array($room_id, $v['user_id']));
					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?, difficulty = 'Moderate'");
					$stmt->execute(array($room_id, $v['user_id']));
					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?, difficulty = 'Hard'");
					$stmt->execute(array($room_id, $v['user_id']));

					$stmt = $pdo->prepare("INSERT INTO brain_buzz SET room_id = ?, user_id = ?");
					$stmt->execute(array($room_id, $v['user_id']));

					$stmt = $pdo->prepare("SELECT COUNT(*) AS C FROM reserve_question WHERE room_num = ? AND difficulty = 'Hard'");
					$stmt->execute(array($room_id));

					$result = $stmt->fetch();
					$num = $result['C'];
					$stmt = $pdo->prepare("INSERT INTO brain_buzz_result SET question_num = ?, room_id = ?, user_id = ?, buzz_result = '_'");
					for ($i=1; $i < $num + 1; $i++) { 
						$stmt->execute(array($i,$room_id, $v['user_id']));
					}
					
				}
					$stmt = $pdo->prepare("DELETE FROM brain_score WHERE user_id = ?");
					$stmt->execute(array($user_id));

					$stmt = $pdo->prepare("DELETE FROM brain_Hint WHERE user_id = ?");
					$stmt->execute(array($user_id));

					$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE user_id = ?");
					$stmt->execute(array($user_id));

					$stmt = $pdo->prepare("DELETE FROM brain_buzz_result WHERE user_id = ?");
					$stmt->execute(array($user_id));

					$stmt = $pdo->prepare("DELETE FROM brain_button_Submit WHERE user_id = ?");
					$stmt->execute(array($user_id));

					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?,  difficulty = 'Easy'");
					$stmt->execute(array($room_id, $user_id));
					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?, difficulty = 'Moderate'");
					$stmt->execute(array($room_id, $user_id));
					$stmt = $pdo->prepare("INSERT INTO brain_score SET score = 0, room_num = ?, user_id = ?, difficulty = 'Hard'");
					$stmt->execute(array($room_id, $user_id));

					$stmt = $pdo->prepare("INSERT INTO brain_buzz SET room_id = ?, user_id = ?");
					$stmt->execute(array($room_id, $user_id));
					
					$stmt = $pdo->prepare("SELECT COUNT(*) AS C FROM reserve_question WHERE room_num = ? AND difficulty = 'Hard'");
					$stmt->execute(array($room_id));

					$result = $stmt->fetch();
					$num = $result['C'];
					$stmt = $pdo->prepare("INSERT INTO brain_buzz_result SET question_num = ?, room_id = ?, user_id = ?, buzz_result = '_'");
					for ($i=1; $i < $num + 1; $i++) { 
						$stmt->execute(array($i,$room_id, $user_id));
					}
			}
		}

?>

