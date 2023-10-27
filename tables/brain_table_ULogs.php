<tbody>
<?php $ctr = 0; $get_ULogs = $brain_UserDB->get_ULogs(); foreach ($get_ULogs as $log ) { ?>
	<tbody>
             				<tr>
                              <td><img src="<?= $log->getAcc_path()  ?>" width="100" height="100"></td>
                              <td><?= $ctr += 1; ?>.</td>
                              <td><?= $log->getLname() .', ' .  $log->getFname() .' '.  $log->getMname();?></td>
                              <td><?= $log->getComments(); ?></td>
                              <td><?= $log->getData_comms(); ?></td>
                            </tr>
                        </tbody>
<?php } ?>
</tbody>