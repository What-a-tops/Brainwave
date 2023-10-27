 <?php $get_Total = $brain_joinRoomDB->total_play($_SESSION['room_id']); ?>
 <?php $finish_ans = $brain_joinRoomDB->brain_finish($_SESSION['room_id']); ?>
 <?php $get_Anu = $brain_joinRoomDB->get_Anu($_SESSION['room_id'],$_SESSION['qid'],$_SESSION['user_id']); ?>
 <input type="hidden" id="ans_stats" value="<?= $get_Total->getTotal_plays(); ?>">
 <input type="hidden" id="total_plays" value="<?= $finish_ans->getAns(); ?>">
 <input type="hidden" id="e_finalStarts" value="<?= $get_Anu->getStats();  ?>">
