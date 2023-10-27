<?php 
		class brain_RoomDB{

		public function brain_AddRoom($brain_room){
			$pdo = Database::getDB();

			$room_id = $brain_room->getRoom_id();			
			$category = $brain_room->getCategory();
			$players = $brain_room->getPlayers();
			$user_id = $brain_room->getUser_id();
			$player_type = $brain_room->getPlayer_type();
			$num_of_players = $brain_room->getNum_of_players();

			$stmt = $pdo->prepare("INSERT INTO brain_rooms SET room_num = ?,server_id = ?, category = ?, players = ?, player_type = ?, num_of_players = ? ");
			$stmt->execute(array($room_id,$user_id,$category,$players,$player_type,$num_of_players));
		}
		public function getRoom($user_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE server_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}
		public function getRoomID($rid){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE brim = ?");
			$stmt->execute(array($rid));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}
		public function getRid($room_num){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_num));
			$row = $stmt->fetch();

				$brain_Room = new brain_Room();
	           	$brain_Room->setRid($row['brim']);
				$brain_Room->setRoom_id($row['room_num']);
	            $brain_Room->setUser_id($row['server_id']);
	            $brain_Room->setCategory($row['category']);
	            $brain_Room->setPlayers($row['players']);
	            $brain_Room->setPlayer_type($row['player_type']);
	            $brain_Room->setNum_of_players($row['num_of_players']);
			return $brain_Room;
		}public function deleteRoom($user_id,$room_num,$player_type){
			$pdo = Database::getDB();
	
			$stmt = $pdo->prepare("DELETE FROM brain_result WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz_result WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_finish WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_hint WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz_current WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE room_num = ?");
			$stmt->execute(array($room_num));
			
			$stmt = $pdo->prepare("DELETE FROM brain_score WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_joinroom WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_num));
			$row = $stmt->fetch();

			if ($row['player_type'] == 'Server') {
				$stmt = $pdo->prepare("DELETE FROM brain_rooms WHERE server_id = ?");
		        $stmt->execute(array($user_id));
			}

			if (!empty($row['num_of_players'])) {
				$players  = $row['num_of_players'] - 1;
	            $stmt = $pdo->prepare("UPDATE brain_rooms SET num_of_players = ? WHERE room_num = ?");
				$stmt->execute(array($players,$room_num));
			}
		}public function gameEnd_Game($room_num){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM brain_result WHERE room_num = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_button_submit WHERE room_id = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE room_id = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz_result WHERE room_id = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_finish WHERE room_num = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_hint WHERE room_id = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz_current WHERE room_id = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE room_num = ?");
			$stmt->execute(array($room_num));
			
			$stmt = $pdo->prepare("DELETE FROM brain_score WHERE room_num = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_joinroom WHERE room_num = ?");
			$stmt->execute(array($room_num));

			$stmt = $pdo->prepare("DELETE FROM brain_moves WHERE room_id = ?");
			$stmt->execute(array($room_num));
		}public function gameOver_deleteRoom($user_id,$room_num){
			$pdo = Database::getDB();
	
			$stmt = $pdo->prepare("DELETE FROM brain_result WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_buzz_result WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_moves WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_quitgame WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_score WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("DELETE FROM brain_joinroom WHERE user_id = ?");
			$stmt->execute(array($user_id));

			$stmt = $pdo->prepare("SELECT * FROM brain_joinroom WHERE room_num = ? ORDER BY RAND() LIMIT 1");
			$stmt->execute(array($room_num));
			$uid = $stmt->fetch();

			if (empty($uid['user_id'])) {
				$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE room_num = ?");
				$stmt->execute(array($room_num));
			}else{
				$stmt = $pdo->prepare("UPDATE reserve_question SET user_id = ? WHERE room_num = ?");
				$stmt->execute(array($uid['user_id'],$room_num));
			}

		
			$stmt = $pdo->prepare("SELECT * From brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_num));
			$row = $stmt->fetch();

			if ($row['player_type'] == 'Server') {
				$stmt = $pdo->prepare("DELETE FROM brain_rooms WHERE server_id = ?");
		        $stmt->execute(array($user_id));
			}

			if (!empty($row['num_of_players'])) {
				$players  = $row['num_of_players'] - 1;
	            $stmt = $pdo->prepare("UPDATE brain_rooms SET num_of_players = ? WHERE room_num = ?");
				$stmt->execute(array($players,$room_num));
			}

		}public function delete_records($user_id,$room_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_joinroom WHERE room_num = ?");
			$stmt->execute(array($room_id));
			$row = $stmt->fetchAll();
			$count = 0;
			foreach ($row as $b) {
				$count += 1;
			}
			if ($count == 1) {
				$stmt = $pdo->prepare("DELETE FROM reserve_question WHERE room_num = ?");
				$stmt->execute(array($room_id));
			}
			$stmt = $pdo->prepare("DELETE FROM brain_joinroom WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_moves WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_result WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_rooms WHERE server_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_score WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_hint WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_buzz WHERE user_id = ?");
			$stmt->execute(array($user_id));
			$stmt = $pdo->prepare("DELETE FROM brain_finish WHERE user_id = ?");
			$stmt->execute(array($user_id));
		}
		public function del_room_forStart($room_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM brain_rooms WHERE room_num = ?");
		     $stmt->execute(array($room_id));
		}

		public function delete_movs($user_id){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("DELETE FROM brain_moves WHERE user_id = ?");
			$stmt->execute(array($user_id));
		}
		public function get_Room(){
			$pdo = Database::getDB();
			$stmt = $pdo->prepare("SELECT * From brain_rooms ORDER BY brim DESC");
			$stmt->execute();
			$result = $stmt->fetchAll();

			$brain_rooms = array();

			foreach ($result as $b) {
				$brain_Room = new brain_Room();
				$brain_Room->setRid($b['brim']);
				$brain_Room->setRoom_id($b['room_num']);
	            $brain_Room->setUser_id($b['server_id']);
	        
	            $stmt = $pdo->prepare("SELECT * From brain_rooms WHERE category = ?");
				$stmt->execute(array($b['category']));
				$row = $stmt->fetch();
				$brain_Room->setCategory($b['category']);
	            $brain_Room->setPlayers($b['players']);
	            $brain_Room->setPlayer_type($b['player_type']);
	            $brain_Room->setNum_of_players($b['num_of_players']);
	            $brain_rooms[] = $brain_Room;
			}
			return $brain_rooms;
		}
		public function updateRoom($brain_room){
			$pdo = Database::getDB();

			$rid = $brain_room->getRid();
			$num_of_players = $brain_room->getNum_of_players();

			$stmt = $pdo->prepare("UPDATE brain_rooms SET num_of_players = ? WHERE brim = ?");
			$stmt->execute(array($num_of_players,$rid));
			
		}
		public function getBRoom($brain_room){
			$pdo = Database::getDB();

			$rid = $brain_room->getRid();
			$room_id = $brain_room->getRoom_id();
			$user_id = $brain_room->getUser_id();

			$stmt = $pdo->prepare("SELECT brain_rooms.category, brain_rooms.players, brain_joinroom.player_type, brain_joinroom.room_num FROM brain_rooms, brain_joinroom  WHERE brain_rooms.room_num = brain_joinroom.room_num AND user_id = ?");
			$stmt->execute(array($user_id));
			$row = $stmt->fetch();

			$brain_room = new brain_Room();
	            $brain_room->setRoom_id($row['room_num']);
	            $brain_room->setCategory($row['category']);
	            $brain_room->setPlayer_type($row['player_type']);
	            $brain_room->setPlayers($row['players']);
			return $brain_room;
		}
		public function getRoom_Num($room_num){
			$pdo = Database::getDB();

			$stmt = $pdo->prepare("SELECT * FROM brain_rooms WHERE room_num = ?");
			$stmt->execute(array($room_num));
			$row = $stmt->fetch();

			$brain_room = new brain_Room();
	            $brain_room->setRoom_id($row['room_num']);
	            $brain_room->setCategory($row['category']);
	            $brain_room->setUser_id($row['server_id']);
	            $brain_room->setPlayer_type($row['player_type']);
	            $brain_room->setNum_of_players($row['num_of_players']);
	            $brain_room->setPlayers($row['players']);
			return $brain_room;
		}

	}


 ?>