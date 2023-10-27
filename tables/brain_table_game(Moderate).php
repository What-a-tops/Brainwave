                       <?php $reserveQuestions = $brain_reserveQuestionDB->getReserveQuestionsMH($_SESSION['room_id'],$page,$_SESSION['lvl']);  ?> 
                       <?php $get_subMod = $brain_reserveQuestionDB->get_subMod($_SESSION['room_id'],$_SESSION['lvl']); ?>
                       <label class="Yellow-text left" id="sub"></label>
                       <p class="flow-text black-text right" id="timer"></p>
                       <input type="hidden" id="room_id" value="<?= $get_subMod->getRoom_num(); ?>">
                       <label class="Yellow-text left" id="click_mod"></label>
                       
                      <input type="hidden" id="lvl" value="Moderate">
                      <audio id="my_audio_correct" src="./audio/correct.mp3"></audio>
                      <audio id="my_audio_wrong" src="./audio/wrong.mp3"></audio>
                     
                       <?php $ctr = 0; foreach ($reserveQuestions as $rq) { ?>
                      
                         <thead>
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
                                                                  <p><?= $rq->getQuestion_num();  ?>. <?= $rq->getQuestion(); ?></p>
                                                                  <b id="us_hints">(<?= $rq->getHint(); ?>)</b>
                                                                  <input type="hidden" id="mod_ans" value="<?= $rq->getAnswer(); ?>"> 
                                                                 <b id="mod_ML"><?= $rq->getAnswer(); ?></b>
                                                                 
                                                        </div>
                                                 
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
                                      <span class="tiny glyphicon glyphicon-ok blue-text prefix" id="iconM1"></span>
                                      <span class="tiny glyphicon glyphicon-remove red-text prefix" id="iconM2"></span>
                               </td>

                               <td id="info_buzz">
                                                <div class="col l10" id="wow1">
                                                      <input type="text" id="answer_mod" class="black-text" placeholder="Input Your Answer Here...">
                                                </div>   
                               </td>

                                <td id="buzz_subo">
                                     <input type="hidden" id="lvl" value="<?= $get_subMod->getDifficulty(); ?>">
                                     <button class="waves-effect scorMod waves-light blue btn btn-large" id="ans_mod" data-param="<?= $rq->getQuestion_id(); ?>">Submit <span class="mdi mdi-send"></span></button>
                                      <input type="hidden" id="qids" value="<?= $rq->getQuestion_id(); ?>">
                               </td>

                               

                                 <input type="hidden" id="timers"> 
                          </tr>
                       </tbody>
                    <?php } ?>

                     <div id="hints_gam" class="modal">
                      <div class="modal-content">
                         <div class="col l12 center">
                              <i class="glyphicon glyphicon-eye-open large"></i>
                         </div>
                        <h4 class="center">Are you sure?</h4>
                        <p class="center">You can only use once for this..</p>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" waves-effect waves-green btn-flat" id="hint_click">Agree</a>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
                      </div>
                    </div>
            