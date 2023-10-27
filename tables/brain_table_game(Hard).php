                       <?php $reserveQuestions = $brain_reserveQuestionDB->getReserveQuestionsMH($_SESSION['room_id'],$page,$_SESSION['lvl']);  ?> 
                       <?php $get_subMod = $brain_reserveQuestionDB->get_subMod($_SESSION['room_id'],$_SESSION['lvl']); ?>
                       <label class="red-text left" id="sub"></label>
                       <p class="flow-text black-text right" id="timer"></p>
                       <input type="hidden" id="room_id" value="<?= $get_subMod->getRoom_num(); ?>">
                       <audio id="my_buzz" src="./audio/buzz.mp3"></audio>
                       
                       <audio id="my_audio_correct" src="./audio/correct.mp3"></audio>
                       <audio id="my_audio_wrong" src="./audio/wrong.mp3"></audio>
                      <input type="hidden" id="lvl" value="Hard">
                       <audio id="my_audio_game" src="./audio/hard.mp3" loop="loop"></audio>
                       <?php $ctr = 0; foreach ($reserveQuestions as $rq) { ?>
                         <input type="hidden" id="question_id" value="<?= $rq->getQuestion_id();; ?>">
                         <thead class="warn">
                            <tr>
                              <th colspan="4" >
                                   <div id="hq">
                                           <div class="col l12">
                                             
                                                <?php if (empty($rq->getfile_path())) { ?>
                                                    <div class="col l12" id="kolp2">

                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="col l12" id="kolp1">
                                                              <img src="<?= $rq->getfile_path();  ?>" class="img-responsive z-depth-2" height="150" width="170">
                                                    </div>
                                                <?php } ?>
                                                    <div class="col l12 flow-text" id="kolp">
                                                              <input type="hidden" id="qid" value="<?= $rq->getQuestion_num(); ?>">
                                                              <p><?= $rq->getQuestion_num();  ?>. <?= $rq->getQuestion(); ?></p>
                                                              <b id="us_hints">(<?= $rq->getHint(); ?>)</b>
                                                              <input type="hidden" id="hard_ans" value="<?= $rq->getAnswer(); ?>"> 
                                                              <b id="hard_FL"><?= $rq->getAnswer(); ?></b> 
                                                    </div>
                                                     <h3 id="timer_buzz"></h3>
                                                     <h3 id="timer_wait"></h3>
                                           </div>
                                   </div>
                               </th>       

                            </tr>
                         </thead>
                                               
                       <tbody>
                            <tr>

                               <td id="buzz_hint">
                                   <button class="btn-floating btn-large waves-light deep-purple darken-1  z-depth-1 " id="btn_hint"><b>HINT</b></button>
                               </td>

                               <td id="sign_buzz">
                                      <span class="tiny glyphicon glyphicon-ok blue-text prefix" id="iconH1"></span>
                                      <span class="tiny glyphicon glyphicon-remove red-text prefix" id="iconH2"></span>
                               </td>
                               <td id="info_buzz">

                                               <button class="center btn btn-large white-text darken-4 red z-depth-2" id="btn_buzz">
                                                <span class="mdi mdi-paw"></span>
                                                 <i class="glyphicon glyphicon-remove red-text prefix" id="iconH3"></i>
                                                  BUZZ 
                                                <span class="mdi mdi-paw"></span>
                                                </button>
                                      
                                                <div class="col l10" id="uis">
                                                        <input type="text" id="answer_hard" class="black-text" placeholder="Input Your Answer Here...">
                                                </div>
                               </td>

                              <td id="buzz_subo">
                                     <input type="hidden" id="lvl" value="<?= $get_subMod->getDifficulty(); ?>">
                                     <button class="waves-effect scorHard waves-light blue btn btn-large" id="ans_hard" data-param="<?= $rq->getQuestion_id(); ?>">Submit <span class="mdi mdi-send"></span></button>
                              </td>

                             
                             
                             </tr>
                       </tbody>
                    
                    <?php } ?>

                     
            