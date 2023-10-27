<?php 
	class brain_reserveQuestionDB{
		public function reserveQuestion($brain_reserveQuestion,$user_id){
			$pdo = Database::getDB();

			$room_num = $brain_reserveQuestion->getRoom_num();
			$question_id = $brain_reserveQuestion->getQuestion_id();
			$question_num = $brain_reserveQuestion->getQuestion_num();
			$difficulty = $brain_reserveQuestion->getDifficulty();
			$category = $brain_reserveQuestion->getCategory();
			
			$stmt = $pdo->prepare("INSERT INTO reserve_question SET room_num = ?, question_num = ?, question_id = ?, difficulty = ?, subject = ?, user_id = ?");
			$stmt->execute(array($room_num,$question_num,$question_id,$difficulty,$category,$user_id));
		}
		public function removeReservedQs($user_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE user_id = ?");
			$stmt->execute(array($user_id));		
		}public function get_total_Ques($room_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT COUNT(*) AS i FROM reserve_question WHERE room_num = ? AND difficulty = 'Easy'");
			$stmt->execute(array($room_id));
			$i = $stmt->fetch();

			$brain_reserveQuestion = new brain_reserveQuestion();
			$brain_reserveQuestion->setTotal_numQ($i['i']);
			return $brain_reserveQuestion;
		}public function getReserveQuestions($room_id,$page,$lvl){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM reserve_question WHERE room_num = ? AND question_num = ? AND difficulty = ?");
			$stmt->execute(array($room_id,$page,$lvl));
			$b = $stmt->fetch();
			$brain_Questions = array();

				$brain_question = new brain_Question();
				$brain_question->setQuestion_id($b['question_id']);
				$brain_question->setRoom_num($b['room_num']);
				$brain_question->setQuestion_num($b['question_num']);
				
				$stmt = $pdo->prepare("SELECT * FROM brain_question, easy_choice WHERE brain_question.bid = easy_choice.qid AND easy_choice.qid = ?");
				$stmt->execute(array($b['question_id']));

				$row = $stmt->fetch();

				$brain_question->setQuestion($row['question']);
				$brain_question->setLevel($row['level']);
				$brain_question->setSubject($row['subject']);
				$brain_question->setfile_path($row['question_path']);
				$brain_question->setHint($row['hint']);
				$brain_question->setQuestion_id($row['bid']);

				$brain_question->setCorrect($row['correct']);
				$brain_question->setChoiceB($row['choiceB']);
				$brain_question->setChoiceC($row['choiceC']);
				$brain_question->setChoiceD($row['choiceD']);
				
				$brain_Questions[] = $brain_question;
			
			return $brain_Questions;
		}
		public function getReserveQuestionsMH($room_id,$page,$lvl){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM reserve_question WHERE room_num = ? AND question_num = ? AND difficulty = ?");
			$stmt->execute(array($room_id,$page,$lvl));
			$b = $stmt->fetch();
			$brain_Questions = array();

				$brain_question = new brain_Question();
				$brain_question->setQuestion_id($b['question_id']);
				$brain_question->setRoom_num($b['room_num']);
				$brain_question->setQuestion_num($b['question_num']);
				
				$stmt = $pdo->prepare("SELECT * FROM brain_question WHERE bid = ?");
				$stmt->execute(array($b['question_id']));
				$row = $stmt->fetch();

				$brain_question->setQuestion($row['question']);
				$brain_question->setLevel($row['level']);
				$brain_question->setSubject($row['subject']);
				$brain_question->setfile_path($row['question_path']);
				$brain_question->setHint($row['hint']);
				$brain_question->setQuestion_id($row['bid']);
				$brain_question->setAnswer($row['answer']);
				
				$brain_Questions[] = $brain_question;
			
			return $brain_Questions;
		}
		public function get_subMod($room_id,$lvl){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM reserve_question WHERE room_num = ? AND difficulty = ?");
			$stmt->execute(array($room_id,$lvl));
			$j = $stmt->fetch();
			
			$brain_reserveQuestion = new brain_reserveQuestion();
			$brain_reserveQuestion->setDifficulty($j['difficulty']);
			$brain_reserveQuestion->setCategory($j['subject']);
			$brain_reserveQuestion->setRoom_num($j['room_num']);
			
			return $brain_reserveQuestion;
		}
	}


 ?>