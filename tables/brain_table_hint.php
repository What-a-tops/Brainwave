		<?php $get_Hint = $brain_joinRoomDB->get_Hint($_SESSION['user_id'],$_SESSION['room_id']); ?>
		<?php if (isset($_SESSION['user'])) { ?>
	           <?php if ($brain_users->getUser_id() == $get_Hint->getUser_id()) { ?>
	           		<input type="hidden" id="hintooo" value="<?= $get_Hint->getHint(); ?>">
	           <?php } ?>
 		 <?php } ?>
