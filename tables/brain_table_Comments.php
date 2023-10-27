	 		       <tbody>
             <tr>
            <?php  $get_comments = $brain_UserDB->get_comments();
             if (empty($get_comments)) {  ?>
                            <th colspan="6" class="center">Comments is Empty!</th>
            <?php }else{ ?>
            
            <?php $ctr = 0; $get_comments = $brain_UserDB->get_comments(); foreach ($get_comments as $c ) { ?>
	 				  

                            <tr>
                                <td>
                                        <div class="row">
                                            <div class="col l2">
                                              <div class="card z-depth-2">
                                                <div class="card-image" id="card_lok">
                                                  <img src="<?= $c->getAcc_path();  ?>" class="responsive-image circle" height="90" width="30">
                                                  <span class="black-text"><?= $c->getLname() .', ' .  $c->getFname() .' '.  $c->getMname(); ?></span>
                                                </div>
                                              </div>
                                            </div>
                                          
                                        <div class="col l10">

                                          <div class="card transparent">

                                            <div class="card-content white-text" id="colkop">
                                              <p class="black-text left-align "><?= $c->getComments(); ?></p>
                                            </div>

                                            <div class="card-action">
                                              <label class="right black-text">Date Comment: <b><?= $c->getData_comms(); ?></b></label>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                           

            </tbody>
                <?php } ?>  
            <?php } ?>
          
          
                         