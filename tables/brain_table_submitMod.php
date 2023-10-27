<?php $get_submit = $brain_joinRoomDB->g_Submit($_SESSION['user_id'],$_SESSION['room_id']); ?>
<?php if (!empty($get_submit->getSubmit()) || !empty($get_submit->getUser_id())) { ?>
		<?php if (isset($_SESSION['user'])) { ?>
	           <?php if ($brain_users->getUser_id() == $get_submit->getUser_id()) { ?>
	           		<input type="hidden" id="mod_submit" value="<?= $get_submit->getSubmit(); ?>">
	           <?php } ?>
 		 <?php } ?>
<?php } ?>
 