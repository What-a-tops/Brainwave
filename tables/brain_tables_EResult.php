                                            <audio id="my_audio_pass" src="./audio/You-win.mp3" loop="loop"></audio>
                                            <audio id="my_audio_fail" src="./audio/You-fail.mp3" loop="loop"></audio>
                                            <?php $get_mod = $brain_scoreDB->get_mod($_SESSION['room_id'],$_SESSION['lvl']); ?>
                                            <?php $get_results = $brain_scoreDB->get_results($_SESSION['user_id'],$_SESSION['room_id'],$_SESSION['lvl']); ?>
                                            <?php $get_numQuestions = $brain_scoreDB->get_numQuestions($_SESSION['room_id']); ?>

                                             <?php if ($get_mod->getDifficulty() == 'Easy') { ?>
                                                   <input type="hidden" id="nxt_lvl" value="Moderate">
                                            <?php }else if ($get_mod->getDifficulty() == 'Moderate') { ?>
                                                  <input type="hidden" id="nxt_lvl" value="Hard">
                                            <?php }else if ($get_mod->getDifficulty() == 'Hard') { ?>
                                                  <input type="hidden" id="nxt_lvl" value="End">
                                             <?php }?>
                                           
                                            <li class="collection-header"><h5 class="center">Results -- (<?= $get_mod->getDifficulty(); ?> Mode)</h5></li>
                                                    <?php $points = 0; $ctr = 0; foreach ($get_results as $l) { ?>
                                                          <li class="collection-item">
                                                              <div><?= $ctr += 1;  ?>. <?= $l->getQuestion(); ?>
                                                                  <a href="#!" class="secondary-content">
                                                                      <?php if ($l->getChoice() == 'correct') { ?>
                                                                          <i class="glyphicon glyphicon-ok blue-text"></i>
                                                                       <?php }elseif ($l->getChoice() == 'wrong') { ?>
                                                                          <i class="glyphicon glyphicon-remove red-text"></i>
                                                                      <?php } ?>                 
                                                                  </a>
                                                              </div>
                                                          </li>
                                                     <?php $passed = ''; $points += $l->getPoints(); ?>
                                                    <?php } ?>
                                                       <li class="collection-item">
                                                       <div>Total:
                                                           <a href="#!" class="secondary-content">
                                                              <b>
                                                              <?= $points  ?> / <?= $get_numQuestions->getTotal_E();  ?></b>
                                                          </a>
                                                       </div></li> 
                                                       <?php $total = $get_numQuestions->getTotal_E(); ?>
<?php if ($total == 5 && $points < 3 || $total == 6 && $points < 4 || $total == 7 && $points < 5 || $total == 8 && $points < 6 || $total == 9 && $points < 7 || $total == 10 && $points < 8) { ?>
                                                       <li class="collection-item">
                                                          <div class="center red-text left-align">Sorry! You Failed -- Game Over</div>
                                                          <div class="center right-align">Exit Game in... <label id="timer_nxtLvl" class="black-text"></label></div>
                                                          <input type="hidden" value="fail" id="fail">
                                                      </li>
  <?php }else{ ?>
                                                     <?php $passed = 'Passed'; ?>
                                                       <li class="collection-item">
                                                            <div class="center left-align">Congratulations! You Passed</div>
                                                            <div class="center right-align">Next Level Starts in... <label id="timer_nxtLvl" class="black-text"></label></div>
                                                            <input type="hidden" value="pass" id="pass">
                                                      </li>
                                                    <?php } ?>
                                                      

                                                    
