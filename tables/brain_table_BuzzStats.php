  <?php $get_buzzStats = $brain_joinRoomDB->get_buzzStats($_SESSION['qid'],$_SESSION['user_id'],$_SESSION['room_id']); ?>
  <input type="hidden" id="buzz_val" value="<?= $get_buzzStats->getBuzz(); ?>">
  <input type="hidden" id="buzz_correct" value="<?= $get_buzzStats->getJid(); ?>">
  <input type="hidden" id="buzz_wrong" value="<?= $get_buzzStats->getJid1(); ?>">
  <input type="hidden" id="buzz_plr_count" value="<?= $get_buzzStats->getJid3(); ?>">

