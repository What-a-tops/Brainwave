  <?php $get_buzz = $brain_joinRoomDB->get_buzz($_SESSION['user_id'],$_SESSION['room_id']);  ?>
  <?php if (isset($_SESSION['user'])) { ?>
           <?php if ($brain_users->getUser_id() == $get_buzz->getUser_id()) { ?>
           		<input type="hidden" id="hard_buzz" value="<?= $get_buzz->getBuzz(); ?>">
           <?php } ?>
  <?php } ?>

