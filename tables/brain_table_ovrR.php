          
         <?php $get_results_or = $brain_scoreDB->get_results1($_SESSION['room_id']); ?>
          <?php $get_results_total = $brain_scoreDB->get_results_total($_SESSION['room_id'],$_SESSION['user_id']); ?>
          <thead>
              <tr>
                <th colspan="2">Rank.</th>
                <th>Image</th>
                <th>Name:</th>
                <th>EASY</th>
                <th>MODERATE</th>
                <th>HARD</th>
                <th>Total Points:</th>
                <th>Remarks:</th>
              </tr>
          </thead>
          <tbody>


            <?php $ctr = 0; foreach ($get_results_or as $r) { ?>
            <?php 
                      $e = $r->getScoreE();
                      $m = $r->getScoreM();
                      $h = $r->getScoreH();
                      $total = $e + $m + $h;
            ?>
              <tr>
                  <?php if ($total == 15) { ?>
                        <td>
                        <img src="./bootstrap/img/backgrounds/Metal-gold-blue.png" class="responsive-image" height="50" width="50">
                        </td>
                  <?php }else if ($total >= 13 && $total <= 15) { ?>
                         <td>
                         <img src="./bootstrap/img/backgrounds/Metal-silver-blue.png" class="responsive-image" height="50" width="50">
                         </td>
                   <?php }else if ($total >= 12 && $total <= 14) { ?>
                         <td>
                         <img src="./bootstrap/img/backgrounds/Metal-bronze-blue.png" class="responsive-image" height="50" width="50">
                         </td>
                   <?php }else{ ?>
                    <td><img src="./bootstrap/img/backgrounds/a_major_award.png" class="responsive-image" height="50" width="50"></td>
                  <?php } ?>
                 
                  <td><?= $ctr += 1; ?>.</td>
                  <?php if (empty($r->getAcc_path())) { ?>
                       <td><img src="./pics/question.png" width="60" height="60" class="responsive-image"></td>
                  <?php }else{ ?>
                         <td><img src="<?= $r->getAcc_path();  ?>" width="60" height="60" class="responsive-image"></td>
                  <?php } ?>
                  <td><?= $r->getLname() .', '. $r->getFname() .' '. $r->getMname(); ?></td>
                  <td><?= $r->getScoreE(); ?> / <?= $get_results_total->getTotal_E();  ?></td>
                  <td><?= $r->getScoreM(); ?> / <?= $get_results_total->getTotal_M();  ?></td>
                  <td><?= $r->getScoreH(); ?> / <?= $get_results_total->getTotal_H();  ?></td>

                 
                  <td><b><?= $total;  ?></b></td>
               
                  <?php if ($total == 15) { ?>
                      <td><b >Master</b></td>
                      
                  <?php }else if ($total >= 13 && $total <= 15) { ?>
                      <td><b>Expert</b></td>
                       
                  <?php }else if ($total >= 12 && $total <= 14) { ?>
                      <td><b>Best</b></td>
                       
                 <?php }else if ($total >= 10) { ?>
                      <td><b>Average</b></td>
                       
                  <?php }else{ ?>  
                      <td><b class="red-text">Fail</b></td>
                      
                  <?php } ?>
              </tr>
         <?php } ?>
         <tr>
              <td colspan="9">
                  <h6>Exit Game In..</h6>
                  <h4 id="timer_wow" class="center"></h4>
              </td>
         </tr>
         
          </tbody>

