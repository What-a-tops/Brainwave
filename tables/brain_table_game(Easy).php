                       <?php $reserveQuestions = $brain_reserveQuestionDB->getReserveQuestions($_SESSION['room_id'],$page,$_SESSION['lvl']);  ?> 
                       <?php $get_subMod = $brain_reserveQuestionDB->get_subMod($_SESSION['room_id'],$_SESSION['lvl']); ?>
                       <?php if (isset($_SESSION['user'])) { ?>
                           <input type="hidden" id="uid" value="<?= $brain_users->getUser_id(); ?>">
                       <?php } ?>
                       <label class="black-text left" id="sub"></label>
                       <label class="flow-text black-text right" id="timer"></label>
                       <input type="hidden" id="room_id" value="<?= $get_subMod->getRoom_num(); ?>">

                       <audio id="my_audio_correct" src="./audio/correct.mp3"></audio>
                       <audio id="my_audio_wrong" src="./audio/wrong.mp3"></audio>
                       <audio id="my_audio_game" src="./audio/pb.mp3" loop="loop"></audio>
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
                                                            <input type="hidden" id="qid" value="<?= $rq->getQuestion_num(); ?>">

                                                                  <p><?= $rq->getQuestion_num();  ?>. <?= $rq->getQuestion(); ?></p>
                                                                 <b id="us_hints">(<?= $rq->getHint(); ?>)</b>
                                                                 
                                                        </div>
                                                 
                                               </div>
                                       </div>
                                  </th>                                
                            </tr>
                       </thead>
                                               
                       <tbody>
                            <tr>
                                <td>
                                   <button class="btn-floating btn-large waves-light deep-purple darken-1  z-depth-1 " id="btn_hint"><b>HINT</b></button>
                               </td>
                          
                                <td>
                                   <div id="shuffle">
                                 
                                      <div class="col l6 z-depth-1" id="io">
                                             <input type="hidden" id="uns" value="<?= $rq->getCorrect();  ?>">
                                              <button class="waves-effect but_ans waves-light btn-flat" id="correct" data-ans="<?= $rq->getCorrect(); ?>">
                                                    <span class="tiny glyphicon glyphicon-ok blue-text left" id="icon1"></span>
                                                    <span id="cor_cor"><?= $rq->getCorrect(); ?></span>  
                                              </button>
                                     </div>
                              
                                      <div class="col l6 z-depth-1" id="io">
                                             <button class="waves-effect but_ans waves-light btn-flat" id="btn_ans2">

                                                  <span class="tiny glyphicon glyphicon-remove red-text left" id="icon2"></span>
                                                  <span><?= $rq->getChoiceB();  ?></span>
                                            
                                             </button>
                                      </div> 
                                 
                                      <div class="col l6 z-depth-1" id="io">
                                            <button class="waves-effect but_ans waves-light btn-flat" id="btn_ans3">
                                                    <span class="tiny glyphicon glyphicon-remove red-text left" id="icon3"></span>
                                                    <span> <?= $rq->getChoiceC(); ?></span>
                                            </button>
                                      </div>
                                  
                               
                                      <div class="col l6 z-depth-1" id="io">
                                             <button class="waves-effect but_ans waves-light btn-flat" id="btn_ans4">
                                            <span class="tiny glyphicon glyphicon-remove red-text left" id="icon4">
                                            </span>
                                                  <span><?= $rq->getChoiceD(); ?></span>
                                            </button>
                                      </div>

                                    </div>
                                       
                                </td>
                                  
                                <td>
                                   <input type="hidden" id="lvl" value="<?= $get_subMod->getDifficulty(); ?>">
                                   <button class="waves-effect scor waves-light blue btn btn-large" id="ans" data-param="<?= $rq->getQuestion_id(); ?>">Submit <i class="mdi mdi-send"></i></button>
                                    <input type="hidden" id="qids" value="<?= $rq->getQuestion_id(); ?>">
                                </td>
                             
                             </tr>
                       </tbody>
                       <input type="hidden" id="timers"> 
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
                        <a href="#!" class=" waves-effect waves-green btn-flat" id="hint_click" >Agree</a>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
                      </div>
                    </div>

                   



            