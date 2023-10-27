<?php 
	class brain_QuestionDB{

		
		public function brain_addQuestionDB($brain_Question){
			$pdo = Database::getDB();

			$level = $brain_Question->getLevel();
			$file_path = $brain_Question->getfile_path();
			$question = $brain_Question->getQuestion();
			$subject = $brain_Question->getSubject();
			$hint = $brain_Question->getHint();
			$answer = $brain_Question->getAnswer();

			$correct = $brain_Question->getCorrect();
		    $choiceB = $brain_Question->getChoiceB();
		    $choiceC = $brain_Question->getChoiceC();
			$choiceD = $brain_Question->getChoiceD();

			$stmt = $pdo->prepare("INSERT INTO brain_question SET question_path = ?, level = ?, subject = ?, question = ?,  hint = ?, answer = ?");
			$stmt->execute(array($file_path,$level,$subject,$question,$hint,$answer));

			if ($level == 'Easy') {
				$stmt = $pdo->prepare("SELECT * FROM brain_question WHERE level = ? AND subject = ? AND question = ? AND hint = ?");
				$stmt->execute(array($level,$subject,$question,$hint));
				$row = $stmt->fetch();

				$brain_Question = new brain_Question();
	         	$stmt = $pdo->prepare("INSERT INTO easy_choice SET qid = ?, correct = ?, choiceB = ?, choiceC = ?, choiceD = ?");
				$stmt->execute(array($row['bid'],$correct,$choiceB,$choiceC,$choiceD));
	          
	           return $brain_Question;
			}
			

		}
		public function get_QuestionDB_Easy(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE level = 'Easy'");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$brain_Questions = array();

			foreach ($result as $row) {

				$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);

	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	            $brain_Question->setHint($row['hint']);
	            $brain_Question->setfile_path($row['question_path']);

	            $stmt = $pdo->prepare("SELECT * FROM easy_choice WHERE qid = ?");
	            $stmt->execute(array($row['bid']));
				$row = $stmt->fetch();

	            $brain_Question->setCorrect($row['correct']);
				$brain_Question->setChoiceB($row['choiceB']);
				$brain_Question->setChoiceC($row['choiceC']);
				$brain_Question->setChoiceD($row['choiceD']);
	            $brain_Questions[] = $brain_Question;
	        }
			return $brain_Questions;
		}
		public function get_Question(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question ORDER BY bid desc");
			$stmt->execute();
			$result = $stmt->fetchAll();
			$brain_Questions = array();
			foreach ($result as $row) {

				$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	            $brain_Question->setHint($row['hint']);
	            $brain_Question->setfile_path($row['question_path']);
	           	$brain_Question->setAnswer($row['answer']);

	            $stmt = $pdo->prepare("SELECT * FROM easy_choice WHERE qid = ?");
	            $stmt->execute(array($row['bid']));
				$row = $stmt->fetch();

	            $brain_Question->setCorrect($row['correct']);
				$brain_Question->setChoiceB($row['choiceB']);
				$brain_Question->setChoiceC($row['choiceC']);
				$brain_Question->setChoiceD($row['choiceD']);
	            $brain_Questions[] = $brain_Question;
	        }
			return $brain_Questions;
		}
		public function get_QuestionDB_Mod(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE level = 'Moderate'");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$brain_Questions = array();

			foreach ($result as $row) {

			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	            $brain_Question->setHint($row['hint']);
	            $brain_Question->setAnswer($row['answer']);
	            $brain_Question->setfile_path($row['question_path']);
	            $brain_Questions[] = $brain_Question;
	        }
			return $brain_Questions;
		}
		public function get_QuestionDB_Hard(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE level = 'Hard'");
			$stmt->execute();
			$result = $stmt->fetchAll();
			$brain_Questions = array();
			foreach ($result as $row) {

			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	           	$brain_Question->setHint($row['hint']);
	            $brain_Question->setAnswer($row['answer']);
	            $brain_Question->setfile_path($row['question_path']);
	            $brain_Questions[] = $brain_Question;
	        }
			return $brain_Questions;
		}public function delete_Question($qid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM brain_question, easy_choice WHERE brain_question.bid AND easy_choice.qid = ?");
			$stmt->execute(array($qid));
		}
		public function get_Subject($qid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE bid = ?");
			$stmt->execute(array($qid));
			$row = $stmt->fetch();

			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	            $brain_Question->setHint($row['hint']);
	           
	            $brain_Question->setAnswer($row['answer']);
	           return $brain_Question;
	        
		}
		public function getQid($question){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE question = ?");
			$stmt->execute(array($question));
			$row = $stmt->fetch();

			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	            $brain_Question->setHint($row['hint']);
	            $brain_Question->setAnswer($row['answer']);
	           return $brain_Question;
	        
		}
		public function getCat_name($category_Name){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_question WHERE subject = ?");
			$stmt->execute(array($category_Name));
			$result = $stmt->fetchAll();

			$brain_Questions = array();
			foreach ($result as $row) {

			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_Question->setQuestion($row['question']);
	           	$brain_Question->setHint($row['hint']);
	            $brain_Question->setAnswer($row['answer']);
	            $brain_Question->setfile_path($row['question_path']);
	            $brain_Questions[] = $brain_Question;
	        }
			return $brain_Questions;
		}
		public function verify_Question($Question)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT question FROM brain_Question WHERE question = ?");
			$stmt->execute(array($Question));
			$is_duplicate = $stmt->rowCount() ? true : false;
			return $is_duplicate;
		}
		public function verify_Questions($Question,$qid)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT question FROM brain_Question WHERE question = ? AND bid = ?");
			$stmt->execute(array($Question,$qid));
			$is_duplicate = $stmt->rowCount() ? true : false;
			return $is_duplicate;
		}

		public function getQuestion_Easy($easy)
		{
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM brain_Question where level = ? ORDER BY RAND() limit 5");
			$stmt->execute(array($easy));
			$row = $stmt->fetch();

			$brain_Question = new brain_Question();
	        $brain_Question->setQid($row['bid']);
	        $brain_Question->setfile_path($row['question_path']);
	        $brain_Question->setLevel($row['level']);
	        $brain_Question->setSubject($row['subject']);
	        $brain_Question->setQuestion($row['question']);
	        $brain_Question->setHint($row['hint']);
	           
	           
	        return $brain_Question;
			
		}
		public function get_Question_Easy($qid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM brain_Question,easy_choice WHERE brain_Question.bid AND easy_choice.qid = ?");
			$stmt->execute(array($qid));
			$row = $stmt->fetch();

			$brain_Question = new brain_Question();
	        $brain_Question->setQid($row['bid']);
	        $brain_Question->setfile_path($row['question_path']);
	        $brain_Question->setSubject($row['subject']);
	        $brain_Question->setLevel($row['level']);
	        $brain_Question->setSubject($row['subject']);
	        $brain_Question->setQuestion($row['question']);

	        $brain_Question->setCorrect($row['correct']);
			$brain_Question->setChoiceB($row['choiceB']);
			$brain_Question->setChoiceC($row['choiceC']);
			$brain_Question->setChoiceD($row['choiceD']);

	        // $brain_Question->setAnswer($row['answer']);
	        $brain_Question->setHint($row['hint']);
	        return $brain_Question;
		}
		public function get_Question_HM($qid,$level){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * FROM brain_Question WHERE bid = ? AND level = ?");
			$stmt->execute(array($qid,$level));
			$row = $stmt->fetch();

			$brain_Question = new brain_Question();
	        $brain_Question->setQid($row['bid']);
	        $brain_Question->setfile_path($row['question_path']);
	        $brain_Question->setSubject($row['subject']);
	        $brain_Question->setLevel($row['level']);
	        $brain_Question->setSubject($row['subject']);
	        $brain_Question->setQuestion($row['question']);
	        $brain_Question->setAnswer($row['answer']);
			
	        $brain_Question->setHint($row['hint']);
	        return $brain_Question;
		}

		public function delete_QuestionDB($qid){
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("DELETE FROM brain_question WHERE bid = ?");
			$stmt->execute(array($qid));
		}
		public function brain_updateQuestionDB($brain_Question){
			$pdo = Database::getDB();

			$qid = $brain_Question->getQid();
			$question = $brain_Question->getQuestion();
			$hint = $brain_Question->getHint();
			$answer = $brain_Question->getAnswer();
			$file_path = $brain_Question->getfile_path();
			

			$stmt = $pdo->prepare("UPDATE brain_question SET question_path = ?, question = ?, answer = ?, hint = ? WHERE bid = ?");
			$stmt->execute(array($file_path,$question,$answer,$hint,$qid));	
		}public function getRandQuestion($level,$Subject,$num_pl){		
			$pdo = Database::getDB();
			$kwiri = "SELECT * FROM brain_Question WHERE level = '" . $level . "' AND subject = '" . $Subject . "' ORDER BY Rand() LIMIT " . $num_pl;
			$stmt = $pdo->prepare($kwiri);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$brain_RQuestions = array();
			foreach ($result as $row) {
			$brain_Question = new brain_Question();
	            $brain_Question->setQid($row['bid']);
	            $brain_Question->setLevel($row['level']);
	            $brain_Question->setSubject($row['subject']);
	            $brain_RQuestions[] = $brain_Question;
	    	}	           
	        return $brain_RQuestions;
	    }public function get_random(){
	    	$pdo = Database::getDB();
	    	$stmt = $pdo->prepare("SELECT cat_name FROM category ORDER BY Rand() LIMIT 1");
			$stmt->execute();
			$b = $stmt->fetch();
			$brain_Question = new brain_Question();
			$brain_Question->setCategory($b['cat_name']);
			// $r = 'Random';
	  //   	$stmt = $pdo->prepare("UPDATE category SET random = ? WHERE cat_name = ?");
			// $stmt->execute(array($r,$b['cat_name']));
			return $brain_Question;
		}public function update_Question($brain_Question){
			$pdo = Database::getDB();
			$qid = $brain_Question->getQid();
			$file_path = $brain_Question->getfile_path();
			$question = $brain_Question->getQuestion();
			$correct = $brain_Question->getCorrect();
			$choiceB = $brain_Question->getChoiceB();
			$choiceC = $brain_Question->getChoiceC();
			$choiceD = $brain_Question->getChoiceD();
			$answer = $brain_Question->getAnswer();
			$hint = $brain_Question->getHint();
			$level = $brain_Question->getLevel();

			if ($level == 'Easy') {
	
				$stmt = $pdo->prepare("UPDATE brain_question SET question_path = ?, question = ?, hint = ? WHERE bid = ?");
				$stmt->execute(array($file_path,$question,$hint,$qid));
				$stmt = $pdo->prepare("UPDATE easy_choice SET correct = ?, choiceB = ?, choiceC = ?, choiceD = ?  WHERE qid = ?");
				$stmt->execute(array($correct,$choiceB,$choiceC,$choiceD,$qid));

			}elseif ($level == 'Moderate' || $level == 'Hard') {
				
				$stmt = $pdo->prepare("UPDATE brain_question SET question_path = ?, question = ?, hint = ?, answer = ? WHERE bid = ?");
				$stmt->execute(array($file_path,$question,$hint,$answer,$qid));
			}

		}
		
	}

 ?>