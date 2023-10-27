                              <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Image:</th>
                                      <th>Level:</th>
                                      <th>Subject:</th>
                                      <th>Question:</th>
                                      <th colspan="4">Choices / Answer:</th>
                                      <th>Options:</th>
                                  </tr>
                               </thead>

                            <?php $question = $brain_QuestionDB->get_Question(); ?>   
                             <?php $ctr = 0; foreach ($question as $q) { ?>
                              <?php if ($q->getLevel() == 'Easy') { ?>  
                                  
                                  <tbody>
                                      <tr   id="yu<?= $q->getQid(); ?>">
                                        <td><?= $ctr += 1; ?>.</td>
                                        <?php if (empty($q->getfile_path())) {?>
                                            <td><img src="./pics/question.png" width="60" height="60"></td>
                                        <?php }else{ ?>
                                            <td><img src="<?= $q->getfile_path(); ?>" width="60" height="60"></td>
                                        <?php  } ?>
                                        <td><?= $q->getLevel(); ?></td>
                                        <td><?= $q->getSubject(); ?></td>
                                        <td><?= $q->getQuestion(); ?></td>
                                        <td><?= $q->getCorrect(); ?></td>
                                        <td><?= $q->getChoiceB(); ?></td>
                                        <td><?= $q->getChoiceC(); ?></td>
                                        <td><?= $q->getChoiceD(); ?></td>
                                        <td> 
                                          <div class="col s12 m8 l12">
                                              <div class="row">
                                                  <div class="col s12 m8 l3">
                                                  <a href="#!" class="delete_question waves-light red-text" data-param1="<?= $q->getQid();?>" ><i class="mdi mdi-delete tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete"></i></a>
                                                  </div>
                                                  <div class="col s12 m8 l3">
                                                        <a class="waves-light mod_quest_easy blue-text"  href="#modal_edit2" data-param="<?= $q->getfile_path(); ?>" data-param1="<?= $q->getQuestion();?>" data-param2="<?= $q->getSubject();?>" data-param3="<?= $q->getCorrect();?>" data-param4="<?= $q->getChoiceB();?>" data-param5="<?= $q->getChoiceC();?>" data-param6="<?= $q->getChoiceD();?>" data-param7="<?= $q->getHint();?>" data-param8="<?= $q->getQid(); ?>" data-param9="<?= $q->getLevel();  ?>"><i class="mdi mdi-pencil tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update"></i></a>
                                                  </div>
                                              </div>
                                            
                                          </div>
                                          
                                        </td>
                                             
                                        </tr> 
                                 
                                     <?php }elseif ($q->getLevel() == 'Moderate' || $q->getLevel() == 'Hard') { ?>
                            
                               
                                      <tr id="yu<?= $q->getQid(); ?>">
                                        <td><?= $ctr += 1; ?>.</td>
                                        <?php if (empty($q->getfile_path())) {?>
                                            <td><img src="./pics/question.png" width="60" height="60"></td>
                                        <?php }else{ ?>
                                            <td><img src="<?= $q->getfile_path(); ?>" width="60" height="60"></td>
                                        <?php  } ?>
                                        <td><?= $q->getLevel(); ?></td>
                                        <td><?= $q->getSubject(); ?></td>
                                        <td><?= $q->getQuestion(); ?></td>
                                        <td colspan="4"><?= $q->getAnswer(); ?></td>
                                        <td> 
                                            <div class="col s12">
                                                <div class="row">
                                                      <div class="col s12 m8 l3">
                                                          <a href="#!" class="delete_question waves-light red-text" data-param1="<?= $q->getQid();?>" ><i class="mdi mdi-delete tooltipped"  data-position="bottom" data-delay="50" data-tooltip="Delete"></i></a>
                                                      </div>

                                                      <div class="col s12 m8 l3">
                                                           <a class="waves-light mod_quest_MH blue-text" href="#modal_edit3" data-param="<?= $q->getfile_path(); ?>"  data-param1="<?= $q->getQuestion();?>" data-param2="<?= $q->getSubject();?>" data-param3="<?= $q->getAnswer();?>" data-param4="<?= $q->getHint();?>" data-param5="<?= $q->getQid(); ?>" data-param6="<?= $q->getLevel();  ?>"><i class="mdi mdi-pencil tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update"></i></a>
                                                      </div>
                                                </div>
                                              
                                            </div>
                                            
                                            
                                        </td>
                                             
                                        </tr> 
                                  </tbody>
                                   
                           <?php } ?>  
                     <?php } ?>

                                           <div id="modal_edit2" class="modal modal-fixed-footer">
                                                <div class="modal-content">
                                                      <h5>Update Question:</h5> 
                                                      <hr>
                                                       <div class="row">
                                                                    <form id="update_quest" enctype="multipart/form-data">
                                                                    <input type="hidden" name="bid_e" id="bid_e">
                                                                    <input type="hidden" name="level" value="Easy" id="level">
                                                                    
                                                                    <div class="row">
                                                                    
                                                                          <div class=" col s12 m8 l3">
                                                                             <div class="ip">
                                                                                <img src="./pics/question.png" id="outputQuest_e" class="responsive-image z-depth-2" width="190" height="200">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var outputQuest_e = document.getElementById('outputQuest_e');
                                                                                  outputQuest_e.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload center grid-example">
                                                                                       <span class="btn-flat"><i class="small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="acc_path_e" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>
                                                                  
                                                                        

                                                                        <div class="col s12 m8 l9">
                                                                                                                                              
                                                                            <div class="col s12 m8 l12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_prefix_dit" type="text" name="question_e">
                                                                              <label for="icon_prefix">Question: </label>
                                                                              <label id="a1" class="red-text"></label>
                                                                              
                                                                            </div>

                                                                            <div class="col s12 m8 l12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_sub_dit" type="text" name="subject_e" >
                                                                              <label for="icon_sub_dit">Subject: </label>
                                                                              <label id="a2" class="red-text"></label>
                                                                            </div>

                                                                            <div class="col s12 m8 l6">
                                                                              <input id="ans_dit" type="text" name="correct_e" required>
                                                                              <label for="ans_dit">Edit Correct Answer: </label>
                                                                              <label id="a3" class="red-text"></label>
                                                                            </div>

                                                                             <div class="col s12 m8 l6">
                                                                             
                                                                              <input id="choiceB_dit" type="text" name="choiceB_e" required>
                                                                              <label for="choiceB_dit">Edit Another Choice:  </label>
                                                                              <label id="a4" class="red-text"></label>
                                                                            </div>

                                                                             <div class="col s12 m8 l6">
                                                                              
                                                                              <input id="choiceC_dit" type="text" name="choiceC_e" required>
                                                                              <label for="choiceC_dit">Edit Another Choice:  </label>
                                                                              <label id="a5" class="red-text"></label>
                                                                            </div>

                                                                             <div class="col s12 m8 l6">
                                                                             
                                                                              <input id="choiceD_dit" type="text" name="choiceD_e" required>
                                                                              <label for="choiceD_dit">Edit Another Choice: </label>
                                                                               <label id="a6" class="red-text"></label>
                                                                            </div>

                                                                            <div class="col s12 m8 l12">
                                                                             
                                                                              <input id="hint_dit" type="text" name="hint_e" required>
                                                                              <label for="hint_dit">Edit Hint: </label>
                                                                              <label id="a7" class="red-text"></label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                   
                                                                  </div>
                                                             
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="submit" id="Edit_e" class="waves-effect waves-green btn-flat">Edit</button>
                                                          <a href="#!" type="button" class="modal-action modal-close waves-effect waves-red btn-flat left">Close</a>
                                                        </div>
                                                        </form>
                                                      </div>
                                                           
                                                       <div id="modal_edit3" class="modal modal-fixed-footer">
                                                              <div class="modal-content">
                                                                <h5>Update Question:</h5> 
                                                                <hr>
                                                                <div class="row">
                                                                    <form id="update_quest_mh" enctype="multipart/form-data">
                                                                    <input type="hidden" name="bid" value="<?= $q->getQid();  ?>">
                                                                    <input type="hidden" name="level" value="<?= $q->getLevel();  ?>">
                                                                    <input type="hidden" name="subject_mh" value="<?= $q->getSubject(); ?>">
                                                                    <!-- <input type="hidden" name="action" value="brain_update_Question"> -->
                                                                    
                                                                      <div class="row">
                                                                   
                                                                          <div class=" col s12 m4 l3">
                                                                             <div class="ip_view">
                                                                                <img id="outputQuest_mh" class="responsive-image z-depth-2" width="190" height="200">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var output = document.getElementById('outputQuest_mh');
                                                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col l6 offset-l3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>
                                                                  
                                                                        <div class="col s12 m4 l9">
                                                                                                                                              
                                                                            <div class="col l12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_prefix" type="text" name="question_mh">
                                                                              <label for="icon_prefix">Question:</label>
                                                                              <label id="b1" class="red-text"></label>
                                                                            </div>

                                                                             <div class="col s12 m4 l12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_sub" type="text" name="subject_mh">
                                                                              <label for="icon_sub">Subject:</label>
                                                                              <label id="b2" class="red-text"></label>
                                                                            </div>

                                                                             <div class="col s12 m4 l12">
                                                                              <input id="hint" type="text" name="answers_mh" required>
                                                                              <label for="hint">Edit Answer:</label>
                                                                              <label id="b3" class="red-text"></label>
                                                                            </div>

                                                                            <div class="col s12 m4 l12">
                                                                             
                                                                              <input id="hint" type="text" name="hints_mh" required>
                                                                              <label for="hint">Edit Hint:</label>
                                                                              <label id="b4" class="red-text"></label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                   
                                                                  </div>
                                                              </div>  
                                                              <div class="modal-footer">
                                                               <button type="submit" class="waves-effect waves-green btn-flat">Edit</button>
                                                                <a href="#!" type="button" class="modal-action modal-close waves-effect waves-red btn-flat left">Close</a>
                                                              </div>
                                                            </div>
                                                        </form>
                                                             <!------------------Update Question-------------------------->



        
     
