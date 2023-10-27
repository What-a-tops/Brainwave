		<?php $get_Quit = $brain_joinRoomDB->get_Quit($_SESSION['user_id'],$_SESSION['room_id']); ?>
	    <input type="hidden" id="quit" value="<?= $get_Quit->getQuit(); ?>">
	    <input type="hidden" id="fname" value="<?= $get_Quit->getFname(); ?>">    