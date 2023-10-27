<?php 
	session_start();
	date_default_timezone_set('Asia/Manila');
	setlocale(LC_MONETARY, 'en_US');
	require './model/database.php';

	require './model/brain_addUser.php';
	require './model/brain_addUserDB.php';

	require './model/brain_Category.php';
	require './model/brain_CategoryDB.php';

	require './model/brain_Question.php';
	require './model/brain_QuestionDB.php';

	require './model/brain_room.php';
	require './model/brain_roomDB.php';

	require './model/brain_joinRoom.php';
	require './model/brain_joinRoomDB.php';

	require './model/brain_reserveQuestion.php';
	require './model/brain_reserveQuestionDB.php';

	require './model/brain_score.php';
	require './model/brain_scoreDB.php';

	// require './model/brain_Game.php';
	// require './model/brain_GameDB.php';


	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		
	}elseif (isset($_GET['action'])) {
		$action = $_GET['action'];
		
	}else{
		$action = 'login_form';
	}

	//--------------------------------------------//

	$brain_User = new brain_User();
	$brain_UserDB = new brain_UserDB();

	$brain_Category = new brain_Category();
	$brain_CategoryDB = new brain_CategoryDB();

	$brain_Question = new brain_Question();
	$brain_QuestionDB = new brain_QuestionDB();

	$brain_room = new brain_Room();
	$brain_roomDB = new brain_RoomDB();

	$brain_joinRoom = new brain_joinRoom();
	$brain_joinRoomDB = new brain_joinRoomDB();

	$brain_reserveQuestion = new brain_reserveQuestion();
	$brain_reserveQuestionDB = new brain_reserveQuestionDB();

	$brain_score = new brain_score();
	$brain_scoreDB = new brain_scoreDB();

	// $brain_room = new brain_Game();
	// $brain_roomDB = new brain_GameDB();

	$values = array();
	//--------------------------------------------//

	if ($action == 'login_form') {
		if (isset($_GET['error'])) {
			$error  = $_GET['error'];
		}else{
			$error = '';
		}
		$utype = 'Admin';
		$registers = $brain_UserDB->getRegisters($utype);
		include './view/brainwave_login.php';	
	}elseif ($action == 'add_user') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['lname'] = ucwords($_POST['lastname']);
		$_SESSION['fname'] = ucwords($_POST['firstname']);
		$_SESSION['mname'] = ucwords($_POST['middlename']);
		$_SESSION['address'] = ucwords($_POST['address']);
		$_SESSION['contact'] = $_POST['contact'];
		$_SESSION['age'] = $_POST['age'];
		$_SESSION['gender'] =  ucwords($_POST['gender']);
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] =  $_POST['password'];
		$_SESSION['usertype'] = ucwords($_POST['usertype']);

		$_SESSION['secret_quest'] = ucwords($_POST['secret_quest']);
		$_SESSION['secret_answer'] = ucwords($_POST['secret_answer']);
		$date = date('M:d:Y');

		$brain_User->setUser_id($_SESSION['user_id']);
		$brain_User->setLname($_SESSION['lname']);
		$brain_User->setFname($_SESSION['fname']);
		$brain_User->setMname($_SESSION['mname']);
		$brain_User->setAddress($_SESSION['address']);
		$brain_User->setContact($_SESSION['contact']);
		$brain_User->setAge($_SESSION['age']);
		$brain_User->setGender($_SESSION['gender']);
		$brain_User->setUsername($_SESSION['username']);
		$brain_User->setPassword($_SESSION['password']);
		$brain_User->setUsertype($_SESSION['usertype']);

		$brain_User->setSecret_Quest($_SESSION['secret_quest']);
		$brain_User->setSecret_Answer($_SESSION['secret_answer']);
		$brain_User->setDate($date);

		if (empty($_FILE['acc_name']['name'])) {
			$acc_name = 'unk.png';
			$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		}else{
			
			$brain_User->setAcc_name($acc_name = $_FILES['acc_name']['name']);
			$brain_User->setAcc_type($acc_type = $_FILES['acc_name']['type']);
			$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		}
		move_uploaded_file($_FILES['acc_name']['tmp_name'], $acc_path);
		$duplicate_user = $brain_UserDB->verify_user($brain_User);
		if ($duplicate_user) {		
			unset($brain_User);
		}else{
			$brain_UserDB->brain_addDB($brain_User);
			unset($brain_User);
		}
		
	}if ($action == 'brain_login') {
		$_SESSION['user'] = $_GET['user'];
 		$_SESSION['pass'] = $_GET['pass'];

 		$brain_User->setUsername($_SESSION['user']);
 		$brain_User->setPassword($_SESSION['pass']);
 		$verified_brainLogin = $brain_UserDB->verify_brainLogin($brain_User);
 		if ($verified_brainLogin) {
 			$row = $brain_UserDB->brain_user_info($brain_User);
			$_SESSION['user_id'] = $row->getUser_id();
			$_SESSION['user'] = $row->getUsername();
			$_SESSION['pass'] = $row->getPassword();
			$usertype = $row->getUsertype();
			if ($usertype == 'Admin') {
				if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
					$user_id = $brain_users->getUser_id();
				}

				$category = $brain_CategoryDB->getCategory();
				$user_id = $brain_users->getUser_id();
				$logs = 'Logged in.';
				$date_log = date('M:d:Y');
				$brain_UserDB->add_Logs($user_id,$logs,$date_log);
				header("location:.?action=admin&user_id=".urlencode($user_id));	
			}elseif ($usertype == 'User') {
				if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}
				$user_id = $brain_users->getUser_id();
				$user_id = $brain_users->getUser_id();
				$brain_UserDB->deleteRecent_records($user_id);
				session_destroy();
				header("location:.?action=brain_Player&user_id=".urlencode($user_id));	
			}
 		}else {
 			$error  = "invalid";
			header("location:.?&error=".urlencode($error));	
		}
	}elseif ($action == "verify_logs") {
		$_SESSION['user']  = $_POST['user'];
		$_SESSION['pass']  = $_POST['pass'];
		$brain_User->setUsername($_SESSION['user']);
 		$brain_User->setPassword($_SESSION['pass']);
 		$verified_brainLogin = $brain_UserDB->verify_brainLogin($brain_User);
 		if ($verified_brainLogin) {
 			$error  = "verified";
 		}else{
 			$error  = "invalid";
 		}
 		include './tables/brain_table_verifiedLogin.php';
 	}elseif ($action == "getQuestion") {
 		$_SESSION['user']  = $_POST['user'];

 		include './tables/brain_tables_forgot.php';
	}elseif ($action == "admin") {

		$_SESSION['user_id'] = $_GET['user_id'];
		 $user = $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username = $user->getUsername();
		 $_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		} 	

		$category = $brain_CategoryDB->getCategory();
		// $dup = $_GET['dup'];						
		include './view/brain_category.php';
	}elseif ($action == "u_logs") {
		$_SESSION['user_id'] = $_GET['user_id'];
		 $user = $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username = $user->getUsername();
		 $_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		} 
		include './view/brain_usersLogs.php';
	}elseif ($action == 'brain_Player') {
			$_SESSION['user_id'] = $_GET['user_id'];
			$user = $brain_UserDB->getUsername($_SESSION['user_id']);
			$username = $user->getUsername();
			$_SESSION['user'] = $username;
			if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}
			include './view/brain_player.php';
	}elseif ($action == 'brain_comments') {
			$_SESSION['user_id'] = $_GET['user_id'];
			
			$user = $brain_UserDB->getUsername($_SESSION['user_id']);

			$username = $user->getUsername();
			$_SESSION['user'] = $username;
			if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
			}
		    include './view/brain_comments.php';
    }elseif ($action == 'brain_add_comments') {
    	 	$_SESSION['coom'] = $_POST['coom'];
    	 	$_SESSION['user_id'] = $_POST['user_id'];
    	 	$date_coom = date('M:d:Y');
    	 	$brain_UserDB->add_coom($_SESSION['coom'],$_SESSION['user_id'],$date_coom);
    	 	// $get_comments = $brain_UserDB->get_comments();
    	 	include './tables/brain_table_Comments.php';
   	}elseif ($action == 'load_cooms') {
   		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './tables/brain_table_Comments.php';

	}elseif ($action == 'load_rooms') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './tables/brain_table_player.php';
	}elseif ($action == 'brain_player_ref') {
			$_SESSION['user_id'] = $_GET['user_id'];
			$user = $brain_UserDB->getUsername($_SESSION['user_id']);
			$username = $user->getUsername();
			$_SESSION['user'] = $username;

			if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}

			// $brain_rooms_play = $brain_roomDB->get_Room();
			$category = $brain_CategoryDB->getCategory();

			// include './view/brain_player.php';
	}elseif ($action == 'view_user') {
		$_SESSION['user_id'] = $_GET['user_id'];
			$user = $brain_UserDB->getUsername($_SESSION['user_id']);
			$username = $user->getUsername();
			$_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		$category = $brain_CategoryDB->getCategory();
		$user = 'User';
		$quest = $_GET['quest'];
		$logs = $brain_UserDB->getUserLogs($user);
		include './view/brain_users.php';
	

	}elseif ($action == 'brain_UpdateAccount') {

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		
		$acc = "";
		$quest = $_GET['quest'];
		// $category = $brain_CategoryDB->getCategory();
		include './view/brain_updateAccount.php';
	}elseif ($action == 'brain_update_Client') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './view/brain_updateAccount_Client.php';
	}elseif ($action == 'brain_UpdateUser') {

		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['lname'] = ucwords($_POST['lastname']);
		$_SESSION['fname'] = ucwords($_POST['firstname']);
		$_SESSION['mname'] = ucwords($_POST['middlename']);
		$_SESSION['address'] = ucwords($_POST['address']);
		$_SESSION['contact'] = $_POST['contact'];
		$_SESSION['age'] = $_POST['age'];
		$_SESSION['gender'] =  ucwords($_POST['gender']);
		
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] =  $_POST['password'];
		$_SESSION['usertype'] = ucwords($_POST['usertype']);
		$date = date('M:d:Y');

		$brain_User->setUser_id($_SESSION['user_id']);
		$brain_User->setLname($_SESSION['lname']);
		$brain_User->setFname($_SESSION['fname']);
		$brain_User->setMname($_SESSION['mname']);
		$brain_User->setAddress($_SESSION['address']);
		$brain_User->setContact($_SESSION['contact']);
		$brain_User->setAge($_SESSION['age']);
		$brain_User->setGender($_SESSION['gender']);
	
		$brain_User->setUsername($_SESSION['username']);
		$brain_User->setPassword($_SESSION['password']);
		$brain_User->setUsertype($_SESSION['usertype']);
		$brain_User->setDate($date);

		if (empty($_FILE['up_name']['name'])) {
			$acc_name = 'unk.png';
			$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		}else{
			$brain_User->setAcc_name($acc_name = $_FILES['up_name']['name']);
			$brain_User->setAcc_type($acc_type = $_FILES['up_name']['type']);
			$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
		}
		move_uploaded_file($_FILES['up_name']['tmp_name'], $acc_path);

	
		$brain_UserDB->brain_updateDB($brain_User);
		

		include './tables/brain_tables_UpdateAccount.php';
	}
	elseif ($action == 'add_category') {

		$_SESSION['category'] = ucwords($_POST['category']);
		$category =  $_SESSION['category'];
		
		 	$brain_Category->setCategory($_SESSION['category']);
		
					if (isset($_SESSION['user'])) {
							$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
					}
					$user_id = $brain_users->getUser_id();				 	
				 	$brain_CategoryDB->brain_addCategory($brain_Category);
		$logs = 'Add Category.';
		$date_log = date('M:d:Y');
		$brain_UserDB->add_Logs($user_id,$logs,$date_log);
				 	
		 unset($_SESSION['category']);
		 include './tables/brain_table_AdminCategory.php';
	}elseif ($action == 'brain_Delete_cat') {
		$_SESSION['cid'] = $_POST['cid'];
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id = $brain_users->getUser_id();		
		$logs = 'Delete Category.';
		$date_log = date('M:d:Y');
		$brain_UserDB->add_Logs($user_id,$logs,$date_log);
		
		$brain_CategoryDB->delete_Category($_SESSION['cid']);
		include './tables/brain_table_AdminCategory.php';
	}elseif ($action == 'brain_update_Category') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$user_id = $brain_users->getUser_id();	
		$_SESSION['cid'] = $_POST['cid'];
		$_SESSION['category'] = ucwords($_POST['cat_nam']);

		$user_id = $brain_users->getUser_id();		
		$logs = 'Upadate Category.';
		$date_log = date('M:d:Y');
		$brain_UserDB->add_Logs($user_id,$logs,$date_log);

		$brain_Category->setCid($_SESSION['cid']);
		$brain_Category->setCategory($_SESSION['category']);
		$brain_CategoryDB->update_Category($brain_Category);
		unset($_SESSION['category']);
		unset($_SESSION['cid']);
		include './tables/brain_table_AdminCategory.php';
	}elseif ($action == 'brain_add_Question') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
					$user_id = $brain_users->getUser_id();		
					$logs = 'Add Question.';
					$date_log = date('M:d:Y');
					$brain_UserDB->add_Logs($user_id,$logs,$date_log);
		}
		
		$user_id = $brain_users->getUser_id();	

		$_SESSION['level'] = $_POST['level'];

		if ($_SESSION['level'] == 'Easy') {
			
			if (empty($_FILES['quest_pic']['name'])) {

			$_SESSION['subject'] = ucwords($_POST['subject_E']);
			$_SESSION['question'] = ucwords($_POST['question']);		
			$_SESSION['hint'] = ucwords($_POST['hint']);
			$_SESSION['correct'] = ucwords($_POST['correct']);
			$_SESSION['choiceB'] = ucwords($_POST['choiceB']);
			$_SESSION['choiceC'] = ucwords($_POST['choiceC']);
			$_SESSION['choiceD'] = ucwords($_POST['choiceD']);
			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setCorrect($_SESSION['correct']);
			$brain_Question->setChoiceB($_SESSION['choiceB']);
			$brain_Question->setChoiceC($_SESSION['choiceC']);
			$brain_Question->setChoiceD($_SESSION['choiceD']);
		}else{
			$_SESSION['subject'] = ucwords($_POST['subject_E']);
			$_SESSION['question'] = ucwords($_POST['question']);		
			$_SESSION['hint'] = ucwords($_POST['hint']);
			$_SESSION['correct'] = ucwords($_POST['correct']);
			$_SESSION['choiceB'] = ucwords($_POST['choiceB']);
			$_SESSION['choiceC'] = ucwords($_POST['choiceC']);
			$_SESSION['choiceD'] = ucwords($_POST['choiceD']);
			$brain_Question->setLevel($_SESSION['level']);
			$brain_Question->setSubject($_SESSION['subject']);
			$brain_Question->setQuestion($_SESSION['question']);
			$brain_Question->setHint($_SESSION['hint']);

			$brain_Question->setCorrect($_SESSION['correct']);
			$brain_Question->setChoiceB($_SESSION['choiceB']);
			$brain_Question->setChoiceC($_SESSION['choiceC']);
			$brain_Question->setChoiceD($_SESSION['choiceD']);

			$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
			$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
			$brain_Question->setfile_path($file_path = "./user/".$file_name);
			move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
		}
			$brain_QuestionDB->brain_addQuestionDB($brain_Question);
			 unset($_SESSION['subject_E']);
			 unset($_SESSION['question']);
			 unset($_SESSION['hint']);
			 unset($_SESSION['correct']);
			 unset($_SESSION['choiceB']);
			 unset($_SESSION['choiceC']);
			 unset($_SESSION['choiceD']);

		//----------------------------//
			
			

			include 'tables/brain_tables_Question.php';
		}elseif ($_SESSION['level'] == 'Moderate' || $_SESSION['level'] == 'Hard') {
			if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
					$user_id = $brain_users->getUser_id();		
					$logs = 'Add Question.';
					$date_log = date('M:d:Y');
					$brain_UserDB->add_Logs($user_id,$logs,$date_log);
			}

			$user_id = $brain_users->getUser_id();
			if (empty($_FILES['quest_pic']['name'])) {
				$_SESSION['subject'] = ucwords($_POST['subject']);
				$_SESSION['question'] = ucwords($_POST['question']);
				$_SESSION['hint'] = ucwords($_POST['hint']);
				$_SESSION['answer'] = ucwords($_POST['answer']);

				$brain_Question->setLevel($_SESSION['level']);
				$brain_Question->setSubject($_SESSION['subject']);
				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setAnswer($_SESSION['answer']);
				$brain_Question->setHint($_SESSION['hint']);
			}else{
				$_SESSION['subject'] = ucwords($_POST['subject']);
				$_SESSION['question'] = ucwords($_POST['question']);
				$_SESSION['hint'] = ucwords($_POST['hint']);
				$_SESSION['answer'] = ucwords($_POST['answer']);

				$brain_Question->setLevel($_SESSION['level']);
				$brain_Question->setSubject($_SESSION['subject']);
				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setAnswer($_SESSION['answer']);
				$brain_Question->setHint($_SESSION['hint']);

				$brain_Question->setfile_name($file_name = $_FILES['quest_pic']['name']);
				$brain_Question->setfile_type($file_type = $_FILES['quest_pic']['type']);
				$brain_Question->setfile_path($file_path = "./user/".$file_name);
				move_uploaded_file($_FILES['quest_pic']['tmp_name'], $file_path);
			}

			
			$brain_QuestionDB->brain_addQuestionDB($brain_Question);

			

			 unset($_SESSION['subject']);
			 unset($_SESSION['question']);
			 unset($_SESSION['hint']);
			 unset($_SESSION['answer']);
	
			include 'tables/brain_tables_Question.php';
		}		
	}elseif ($action == 'brain_update_Question') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		$_SESSION['level'] = $_POST['level'];
	
		if ($_SESSION['level'] == 'Easy') {
			$_SESSION['bid'] = $_POST['bid_e'];
			$_SESSION['question'] = $_POST['question_e'];
			$_SESSION['subject'] = $_POST['subject_e'];
			$_SESSION['hint'] = $_POST['hint_e'];
			$_SESSION['correct'] = $_POST['correct_e'];
			$_SESSION['choiceB'] = $_POST['choiceB_e'];
			$_SESSION['choiceC'] = $_POST['choiceC_e'];
			$_SESSION['choiceD'] = $_POST['choiceD_e'];
			
				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setCorrect($_SESSION['correct']);
				$brain_Question->setChoiceB($_SESSION['choiceB']);
				$brain_Question->setChoiceC($_SESSION['choiceC']);
				$brain_Question->setChoiceD($_SESSION['choiceD']);
				$brain_Question->setLevel($_SESSION['level']);

				if (empty($_FILE['acc_path_e']['name'])) {
					$acc_name = './pics/question.png';
					$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
				}else{
					
					$brain_User->setAcc_name($acc_name = $_FILES['acc_path_e']['name']);
					$brain_User->setAcc_type($acc_type = $_FILES['acc_path_e']['type']);
					$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
				}
				move_uploaded_file($_FILES['acc_path_e']['tmp_name'], $acc_path);

				$user_id = $brain_users->getUser_id();		
				$logs = 'Add Question.';
				$date_log = date('M:d:Y');
				$brain_UserDB->add_Logs($user_id,$logs,$date_log);
	
		}elseif ($_SESSION['level'] == 'Moderate' || $_SESSION['level'] == 'Hard') {

				$_SESSION['bid'] = $_POST['bid'];
				$_SESSION['question'] = $_POST['question_mh'];
				$_SESSION['subject'] = $_POST['subject_mh'];
				$_SESSION['hint'] = $_POST['hints_mh'];
				$_SESSION['answer'] = $_POST['answers_mh'];

				$brain_Question->setQuestion($_SESSION['question']);
				$brain_Question->setHint($_SESSION['hint']);
				$brain_Question->setQid($_SESSION['bid']);
				$brain_Question->setAnswer($_SESSION['answer']);
				$brain_Question->setLevel($_SESSION['level']);
			
				if (empty($_FILE['quest_pic']['name'])) {
					$acc_name = './pics/question.png';
					$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
				}else{
					$brain_User->setAcc_name($acc_name = $_FILES['quest_pic']['name']);
					$brain_User->setAcc_type($acc_type = $_FILES['quest_pic']['type']);
					$brain_User->setAcc_path($acc_path = "./user/".$acc_name);
				}
				move_uploaded_file($_FILES['quest_pic']['tmp_name'], $acc_path);

				$user_id = $brain_users->getUser_id();		
				$logs = 'Add Question.';
				$date_log = date('M:d:Y');
				$brain_UserDB->add_Logs($user_id,$logs,$date_log);

		
		}
		$brain_QuestionDB->update_Question($brain_Question);
		include 'tables/brain_tables_Question.php';
	
	}elseif ($action == 'View_brain_Question') {

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}
		$ques = $_GET['quest'];
		$category = $brain_CategoryDB->getCategory();
		$dup = $_GET['dup'];
		$quest = $_GET['quest'];
		$question = $brain_QuestionDB->get_Question();
		include './view/brain_questionView.php';

	}elseif($action == 'rload_cat'){
		$category = $brain_CategoryDB->getCategory();
		include './tables/cat_subjcts.php';
	}elseif ($action == "brain_DeleteQuestion") {
		$_SESSION['qid'] = $_POST['qid'];

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}
		$brain_QuestionDB->delete_QuestionDB($_SESSION['qid']);
	}elseif ($action == 'brain_addRoom') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		$_SESSION['room_num'] = $_GET['room_num'];
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['category'] = ucwords($_GET['category']);
	
		$_SESSION['players'] = $_GET['players'];
		$_SESSION['num_pl'] = $_GET['num_pl'];
		$_SESSION['player_type'] = "Server";
		$player_type = "Server";
		$num_of_players = 1;
	  


		$brain_room->setRoom_id($_SESSION['room_num']);
		$brain_room->setUser_id($_SESSION['user_id']);
		$brain_room->setCategory($_SESSION['category']);
		$brain_room->setPlayers($_SESSION['players']);
		$brain_room->setPlayer_type($player_type);
		$brain_room->setNum_of_players($num_of_players);

		$brain_roomDB->brain_AddRoom($brain_room);
		$rid = $brain_roomDB->getRid($_SESSION['room_num']);
		$rooms_id = $rid->getRid();
		$player_type = $rid->getPlayer_type();

		$brain_joinRoom->setJid($rooms_id);
		$brain_joinRoom->setUser_id($_SESSION['user_id']);
		$brain_joinRoom->setRoom_num($_SESSION['room_num']);
		$brain_joinRoom->setPlayer_type($player_type);

		$brain_roomDB->delete_movs($_SESSION['user_id']);
		
		if ($_SESSION['category'] == 'Random') {
			$get_random = $brain_QuestionDB->get_random();
			$_SESSION['category'] = $get_random->getCategory();
			$random = 'Random';
		}else{
			$_SESSION['category'];
		}
		// $brain_reserveQuestionDB->removeReservedQs($_SESSION['user_id']);
		//--------Reserve Question(Easy)----------------//
		$level = 'Easy';
		$getQuestion = $brain_QuestionDB->getRandQuestion($level,$_SESSION['category'],$_SESSION['num_pl']);
		$q_num = 0;
		foreach ($getQuestion as $q) {
			    $q_num += 1;
				$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
				$brain_reserveQuestion->setQuestion_id($q->getQid());
				$brain_reserveQuestion->setQuestion_num($q_num);
				$brain_reserveQuestion->setDifficulty($level);
				$brain_reserveQuestion->setCategory($_SESSION['category']);
				$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion,$_SESSION['user_id']);
		}
		
		//--------Reserve Question(Moderate)----------------//
		$level = 'Moderate';
		$getQuestion = $brain_QuestionDB->getRandQuestion($level,$_SESSION['category'],$_SESSION['num_pl']);
		$q_num = 0;
		foreach ($getQuestion as $q) {
			$q_num += 1;
				$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
				$brain_reserveQuestion->setQuestion_id($q->getQid());
				$brain_reserveQuestion->setQuestion_num($q_num);
				$brain_reserveQuestion->setDifficulty($level);
				$brain_reserveQuestion->setCategory($_SESSION['category']);
				$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion,$_SESSION['user_id']);
		}
		//--------Reserve Question(Moderate)----------------//
		$level = 'Hard';
		$getQuestion = $brain_QuestionDB->getRandQuestion($level,$_SESSION['category'],$_SESSION['num_pl']);
		$q_num = 0;
		foreach ($getQuestion as $q) {
			$q_num += 1;
		
				$brain_reserveQuestion->setRoom_num($_SESSION['room_num']);
				$brain_reserveQuestion->setQuestion_id($q->getQid());
				$brain_reserveQuestion->setQuestion_num($q_num);
				$brain_reserveQuestion->setDifficulty($level);
				$brain_reserveQuestion->setCategory($_SESSION['category']);
				$brain_reserveQuestionDB->reserveQuestion($brain_reserveQuestion,$_SESSION['user_id']);
			
		}
		//---------------------------------------//
		$brain_joinRoomDB->join_to_room($brain_joinRoom);
		$join_room = $brain_joinRoomDB->getJoin_Room($brain_joinRoom);

		header("location:.?action=brain_joinRooms&rid=".urlencode($rooms_id) . "&room_num=".urlencode($_SESSION['room_num']) . "&user_id=".urlencode($_SESSION['user_id']) . "&player_type=".urlencode($player_type));	
	}elseif ($action == 'brain_joinRooms') {
		 $_SESSION['user_id'] = $_GET['user_id'];
		 $_SESSION['player_type'] = "Client";
		 $user = $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username = $user->getUsername();
		 $_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
			$_SESSION['rid'] = $_GET['rid'];
			$_SESSION['room_num'] = $_GET['room_num'];
 	
			$brain_joinRoom->setJid($_SESSION['rid'] );
			$brain_joinRoom->setUser_id($_SESSION['user_id']);
			$brain_joinRoom->setRoom_num($_SESSION['room_num']);
			$brain_joinRoom->setPlayer_type($_SESSION['player_type']);

			$brain_room->setRid($_SESSION['rid']);
			$brain_room->setRoom_id($_SESSION['room_num']);
			$brain_room->setUser_id($_SESSION['user_id']);

			$get_Room = $brain_roomDB->getBRoom($brain_room);
			$get_roomNum = $brain_roomDB->getRoom_Num($_SESSION['room_num']);
			$get_Moves = $brain_joinRoomDB->get_Moves($_SESSION['user_id'],$_SESSION['room_num']);
			include './view/brain_joinRoom.php';	
	}elseif ($action == 'load_joinRooms') {
			$_SESSION['room_num'] = $_GET['room_num'];
			$brain_joinRoom->setRoom_num($_SESSION['room_num']);
			include './tables/brain_table_joinRoom.php';
	}elseif ($action == 'brain_moves') {
			$_SESSION['user_id'] = $_POST['user_id'];
			$_SESSION['room_id'] = $_POST['room_id'];
			$_SESSION['gam_start'] = $_POST['gam_start'];
			include './tables/brain_table_startMenu.php';
	}elseif ($action == 'brain_joinRoom') {
		 $_SESSION['rid'] = $_GET['rid'];
		 $user_id = $_GET['user_id'];
		 $player_type = $_GET['player_type'];
		 $room_num = $_GET['room_num'];

		 $_SESSION['player_type'] = $player_type;

		 $user = $brain_UserDB->getUsername($_SESSION['user_id']);
		 $username = $user->getUsername();
		 $_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}


		$brain_roomDB->delete_movs($_SESSION['user_id']);
		$Room = $brain_roomDB->getRoomID($_SESSION['rid']);
		$brain_joinRoom->setJid($_SESSION['rid']);

		$room_num = $Room->getRoom_id();	
		$rid = $Room->getRid();
		$num_of_players = $Room->getNum_of_players();
		$num_players = $num_of_players + 1;

		$brain_room->setRid($rid);
		$brain_room->setNum_of_players($num_players);
		$brain_roomDB->updateRoom($brain_room);

		$brain_joinRoom->setUser_id($user_id);
		$brain_joinRoom->setRoom_num($room_num);
		$brain_joinRoom->setPlayer_type($player_type);

		$brain_joinRoomDB->join_to_room($brain_joinRoom);
		$user = $brain_UserDB->getProfile($user_id);
	
		header("location:.?action=brain_joinRooms&rid=".urlencode($_SESSION['rid']) . "&room_num=".urlencode($room_num) . "&user_id=".urlencode($user_id) . "&player_type=".urlencode($player_type));	
	}elseif ($action == 'brain_UpdateQuestion') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
				}
		
		$_SESSION['qid'] = $_POST['qid'];
		$level = $_POST['level'];
		

		if ($level == 'Easy') {	
				$update_Question = $brain_QuestionDB->get_Question_Easy($_SESSION['qid']);
		}elseif ($level == 'Moderate' || $level == 'Hard') {
			$update_Question = $brain_QuestionDB->get_Question_HM($_SESSION['qid'],$level);
		}
		$category = $brain_CategoryDB->getCategory();
		include './view/brain_UpdateQuestion.php';
	}elseif ($action == 'brain_StartGame') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['room_id'] = $_GET['room_id'];
		$_SESSION['playr_typ'] = $_GET['playr_typ'];
		$_SESSION['qid'] = 1;

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$_SESSION['lvl'] = 'Easy';
		$username = $user->getUsername();
		$_SESSION['user'] = $username;

		if (isset($_SESSION['user'])) { $brain_users = $brain_UserDB->brain_getUser($_SESSION['user']); }
		$page = 1;
		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		$get_mod = $brain_scoreDB->get_mod($_SESSION['room_id'],$_SESSION['lvl']);
		$get_User_ID = $brain_UserDB->getProfile($_SESSION['user_id']);
		$brain_roomDB->del_room_forStart($_SESSION['room_id']);
		if ($_SESSION['playr_typ'] == "Server")
		 { $brain_joinRoomDB->addMoves("Game Start",$_SESSION['user_id'],$_SESSION['room_id'],$_SESSION['playr_typ']);
			$brain_joinRoomDB->RestScores($_SESSION['room_id'],$_SESSION['user_id']);
			$get_roomNum = $brain_roomDB->getRoom_Num($_SESSION['room_id']); }
		include './view/brain_game.php';
	}elseif ($action == 'load_ans') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['lvl'] = $_GET['lvl'];
		$_SESSION['qid'] = $_POST['qid'];
		$_SESSION['user_id'] = $_POST['user_id'];
		include './tables/brain_table_FinishAns.php';
	}elseif ($action == 'load_Submit') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['lvl'] = $_GET['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		// $get_submit = $brain_joinRoomDB->get_submit($_SESSION['user_id'],$_SESSION['room_id']);
		include './tables/brain_table_submitMod.php';
	}elseif ($action == 'load_hint') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['user_id'] = $_POST['user_id'];
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './tables/brain_table_hint.php';
	}elseif ($action == 'load_buzz') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['lvl'] = $_GET['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './tables/brain_table_Buzz.php';
	}elseif ($action == 'load_buzz_stats') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['qid'] = $_POST['qid'];

		include './tables/brain_table_BuzzStats.php';
	}elseif ($action == 'load_liveScore') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['lvl'] = $_POST['lvl'];

		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		// $get_users = $brain_joinRoomDB->get_Users($brain_score);
		include './tables/brain_table_liveScore.php';
	}elseif ($action == 'load_liveScore_stats') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		$stats_load = 'Load Stats';
		// $get_users = $brain_joinRoomDB->get_Users_stats($brain_score,$_SESSION['user_id']);
		include './tables/brain_table_liveScore.php';
	}elseif ($action == 'delMovs') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$brain_joinRoomDB->del_movs($_SESSION['room_id']);
		include './tables/brain_table_FinishAns.php';
	}elseif ($action == 'delSubmit') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$brain_joinRoomDB->del_Submit($_SESSION['room_id']);
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		include './tables/brain_table_submitMod.php';
	}elseif ($action == 'brain_liveScore') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['question_id'] = $_POST['question_id'];
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['qid'] = $_POST['qid'];

		if ($_SESSION['lvl'] == 'Hard') {
			$_SESSION['qid'] = $_POST['qid'];
			$_SESSION['score'] = $_POST['score_BH'];
			$_SESSION['answer'] = $_POST['answer_H'];
			if ($_SESSION['answer'] == 'correct') {
				$buzz = 'correct';
				$brain_joinRoomDB->add_buzzResult($buzz,$_SESSION['qid'],$_SESSION['user_id'],$_SESSION['room_id']);
			}else{
				$buzz = 'wrong';
				$brain_joinRoomDB->add_buzzResult($buzz,$_SESSION['qid'],$_SESSION['user_id'],$_SESSION['room_id']);
			}
		}else{
			$_SESSION['score'] = $_POST['score'];
			$_SESSION['answer'] = $_POST['answer'];
		}
		
		if ($_SESSION['lvl'] == 'Moderate') {
			$submit = 'Submit';
			$brain_joinRoomDB->addSubmit($submit,$_SESSION['user_id'],$_SESSION['room_id'],$_SESSION['question_id']);
		}else if ($_SESSION['lvl'] == 'Hard') {
			$submit = $_POST['submit'];
			$brain_joinRoomDB->addSubmit($submit,$_SESSION['user_id'],$_SESSION['room_id'],$_SESSION['question_id']);
		}

		$brain_score->setScore($_SESSION['score']);
		$brain_score->setUser_id($_SESSION['user_id']);
		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		$brain_score->setChoice($_SESSION['answer']);
		$brain_score->setQuestion_id($_SESSION['question_id']);

		$brain_scoreDB->brain_addScore($brain_score);
		$brain_scoreDB->UpdateStats($brain_score,$_SESSION['qid']);
		$brain_scoreDB->brain_addAns_Stats($brain_score);
		$brain_scoreDB->brain_addResult($brain_score);
		
	}elseif ($action == 'brain_loadGame') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['page'] = $_GET['page'];
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		if (isset($_SESSION['page'])) {
			$page = $_SESSION['page'];
		}else{
			$page = 1;
		}
		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		$get_users = $brain_joinRoomDB->get_Users($brain_score);
		include './tables/brain_table_game(Easy).php';
	}elseif ($action == 'brain_loadGame_MH') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['page'] = $_GET['page'];
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		if (isset($_SESSION['page'])) {
			$page = $_SESSION['page'];
		}else{
			$page = 1;
		}

		if (isset($_SESSION['page'])) {
			$page = $_SESSION['page'];
		}else{
			$page = 1;
		}
		include './tables/brain_table_game(Moderate).php';
	}elseif ($action == 'brain_loadGame_H') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['page'] = $_GET['page'];
		$_SESSION['lvl'] = $_POST['lvl'];

		$_SESSION['user_id'] = $_POST['user_id'];
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		if (isset($_SESSION['page'])) { $page = $_SESSION['page']; }else{ $page = 1; }
		$brain_score->setRoom_num($_SESSION['room_id']);
		$brain_score->setLvl($_SESSION['lvl']);
		include './tables/brain_table_game(Hard).php';
	}elseif ($action == 'brain_exitRoom') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['room_num'] = $_GET['room_id'];
		$_SESSION['gam_start'] = $_GET['gam_start'];
		$_SESSION['player_type'] = $_GET['playr_typ'];

		$brain_joinRoomDB->addMoves($_SESSION['gam_start'],$_SESSION['user_id'],$_SESSION['room_num'],$_SESSION['player_type']);
		$brain_roomDB->deleteRoom($_SESSION['user_id'],$_SESSION['room_num'],$_SESSION['player_type']);
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();

		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		
		include './view/brain_player.php';	
	}elseif ($action == 'brain_gameOver') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['room_num'] = $_GET['room_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$brain_roomDB->gameOver_deleteRoom($_SESSION['user_id'],$_SESSION['room_num']);

		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		
		include './view/brain_player.php';	
	}elseif ($action == 'brain_endGame') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['room_num'] = $_GET['room_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();

		$brain_roomDB->gameEnd_Game($_SESSION['room_num']);

		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		
		
		include './view/brain_player.php';	
	}elseif ($action == 'load_joinRooms_start') {
		$_SESSION['room_num'] = $_GET['room_num'];
		$brain_room->setRid($_GET['rid']);
		$brain_room->setRoom_id($_SESSION['room_num']);
		$brain_room->setUser_id($_GET['user_id']);
		$_SESSION['player_type'] = $_GET['player_type'];
		$get_Room = $brain_roomDB->getBRoom($brain_room);
		$get_roomNum = $brain_roomDB->getRoom_Num($_SESSION['room_num']);
		$get_Moves = $brain_joinRoomDB->get_Moves_For_Starting($_SESSION['room_num']);

		include './tables/brain_table_startMenu.php';
	}elseif ($action == 'brain_fail_gam') {
		$_SESSION['user_id'] = $_GET['user_id'];
		$_SESSION['room_id'] = $_GET['room_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
			$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$brain_roomDB->delete_records($_SESSION['user_id'],$_SESSION['room_id']);
		$category = $brain_CategoryDB->getCategory();
		include './view/brain_player.php';
	}elseif ($action == 'QuitGame') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['quit'] = $_POST['quit'];
		$brain_scoreDB->addQuitGame($_SESSION['room_id'],$_SESSION['user_id'],$_SESSION['quit']);
	}elseif ($action == 'load_Quit') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['room_id'] = $_POST['room_id'];
		include './tables/brain_table_QuitGame.php';
	}elseif ($action == 'brain_profile') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		 $_SESSION['uid'] = $_GET['uid'];
	    $profile = $brain_UserDB->getProfile( $_SESSION['uid']);
		include './view/brain_profile.php';
	}elseif ($action == 'get_result') {
		$_SESSION['room_id'] = $_POST['room_id'];	
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['user_id'] = $_POST['user_id'];
		include './tables/brain_tables_EResult.php';
	}elseif ($action == 'game_addHint') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['movs'] = $_POST['movs'];
		$brain_joinRoomDB->add_Hint($_SESSION['movs'],$_SESSION['user_id'],$_SESSION['room_id']);
		include './tables/brain_table_FinishAns.php';
	}elseif ($action == 'add_buzz') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['user_id'] = $_POST['user_id'];

		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}

		$_SESSION['buzz'] = $_POST['buzz'];

		$brain_joinRoomDB->add_Buzz($_SESSION['buzz'],$_SESSION['user_id'],$_SESSION['room_id']);
		include './tables/brain_table_Buzz.php';
	}elseif ($action == 'add_buzzResult') {
		$_SESSION['room_id'] = $_POST['room_id'];
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['answer'] = $_POST['answer'];
		$brain_joinRoomDB->add_buzzResult($_SESSION['answer'],$_SESSION['user_id'],$_SESSION['room_id']);
		
	}elseif ($action == 'del_buzz') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['room_id'] = $_POST['room_id'];
		
		$user = $brain_UserDB->getUsername($_SESSION['user_id']);
		$username = $user->getUsername();
		$_SESSION['user'] = $username;
		if (isset($_SESSION['user'])) {
				$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		}
		$brain_joinRoomDB->dl_Buzz($_SESSION['room_id']);
		include './tables/brain_table_Buzz.php';
	}elseif ($action == 'get_Ovresult') {
		$_SESSION['user_id'] = $_POST['user_id'];
		$_SESSION['room_id'] = $_POST['room_id'];
		include './tables/brain_table_ovrR.php';
	}elseif ($action == 'logout') {
		if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
					$user_id = $brain_users->getUser_id();
					$usertype = $brain_users->getUsertype();
		}

		if ($usertype == 'Admin') {
			$logs = 'Logged Out.';
			$date_log = date('M:d:Y');
			$brain_UserDB->add_Logs($user_id,$logs,$date_log);
		}
		$_SESSION = [];
		session_destroy();
		header('location:.');
	}
 ?>