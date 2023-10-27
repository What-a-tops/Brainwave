        
        <input type="hidden" id="rid" value="<?= $_SESSION['rid'];  ?>">
         <thead>
                <tr>
                    <th class="center">No:</th>
                    <th colspan="3">Name:</th>
                </tr>
          </thead>

          <tbody>
              <?php $ctr = 0; $join_room = $brain_joinRoomDB->getJoin_Room($brain_joinRoom); foreach ($join_room as $u) { ?>             
                 <tr>
                    <td class="center"><?= $ctr += 1;  ?>.</td>              
                    <td colspan="2">
                    <?php if ($u->getPlayer_type() == 'Server') { ?>
                        <b><?= $u->getLname().', '. $u->getFname().' '.$u->getMname();  ?></b>
                     <?php }else{ ?>
                         <?= $u->getLname().', '.$u->getFname().' '.$u->getMname();  ?>
                    <?php } ?>                  
                    </td>
                    <td class="right">
                        <a class="waves-effect waves-blue btn-flat view_profile" data-param="<?= $u->getAcc_path();  ?>" data-param1="<?= $u->getLname();  ?>" data-param2="<?= $u->getFname();  ?> " data-param3="<?= $u->getMname();  ?>" data-param4="<?= $u->getAddress();  ?>"  data-param5="<?= $u->getAge();  ?>" data-param6="<?= $u->getGender();  ?>" data-param7="<?= $u->getAcc_path();  ?>" data-param8="<?= $u->getAchiv_counts(); ?>" data-param9="<?= $u->getSubject(); ?>" data-param10="<?= $u->getResult(); ?>"  href="#view_profile">View Profile</a>
                    </td>
                </tr>
               <?php } ?>  
          </tbody>
               
          <div id="view_profile" class="modal modal-fixed-footer white  white-text">
            <div class="modal-content">
              <blockquote class="black-text">
               <img src="" id="medal" width="20" height="20"> : Profile Information 
              </blockquote>
               <hr>  
               <div class="row">
                     <div class="col l3 ">
                          <img alt="Brand" src="./pics/question.png" id="join_acc_path" class="img-responsive z-depth-2" width="150" height="150" id="logo-container">
                      </div>

                          <div class="col l3">
                            <input type="text" id="last_name" class="join_info center  black-text" readonly>
                            <label for="last_name"><b class="black-text center">Last Name:</b></label>
                          </div>

                          <div class="col l3">
                            <input type="text" id="first_name"  class="join_info center black-text" readonly>
                            <label for="first_name"><b class="black-text center ">First Name:</b></label>
                          </div>

                         <div class="col l3">
                            <input type="text" id="middle_name"  class="join_info center black-text" readonly>
                            <label for="middle_name"><b class="black-text center ">Middle Name:</b></label>
                          </div>

                           <div class="col l4">
                            <input type="text" id="address"  class="join_info center black-text" readonly>
                            <label for="address"><b class="black-text center">Address:</b></label>
                          </div>

                           <div class="col l2">
                            <input type="text" id="age"  class="join_info center black-text" readonly>
                            <label for="age"><b class="black-text center">Age: </b></label>
                          </div>

                          <div class="col l2">
                            <input type="text" id="gender"  class="join_info center black-text" readonly>
                            <label for="age"><b class="black-text center ">Gender: </b></label>
                          </div>
               </div> 
                <b>Records:</b>
                <div class="row">
                      <div class="col l4">
                            <input type="text" id="subject" class="join_info center black-text" readonly>
                            <label for="cat_bst"><b class="black-text center">Category Best:</b></label>
                      </div>
                      <div class="col l4">
                            <input type="text" id="result" class="join_info center black-text" readonly>
                            <label for="remarks"><b class="black-text center">Recent Remarks:</b></label>
                      </div>
                       <div class="col l4">
                            <input type="text" id="achiv_counts" class="join_info center black-text" readonly>
                            <label for="remarks"><b class="black-text center">Games Played:</b></label>
                      </div>
                </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
            </div>
          </div>
