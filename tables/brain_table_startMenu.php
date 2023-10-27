             <tbody>
                  <tr>
                       <td>
                          <button class="waves-effect waves-light btn left red mod_start" >Exit</button>
                      </td>
                       
                    <?php if ($_SESSION['player_type'] == "Server") { ?>
                        <td>
                        <?php if ($get_roomNum->getPlayers() == $get_roomNum->getNum_of_players()) { ?>
                               <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id();  ?>" id="room_id">
                               <input type="hidden" value="Server" id="server" class="usertype">
                               <button class="waves-effect waves-light btn right green accent-5 gam_start" data-rid="<?= $get_Room->getRid();  ?>">Start</button>
                               <input type="hidden" value="<?= $get_Moves->getMoves(); ?>" id="moves">
                         <?php } ?>  
                        </td>

                       <?php }elseif ($_SESSION['player_type'] == "Client") { ?>
                        <td>
                              <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id(); ?>" id="room_id">
                              <input type="hidden" value="client" id="client" class="usertype">
                              <input type="hidden" value="<?= $get_Moves->getMoves(); ?>" id="moves">
                        </td>
                       <?php } ?>
                     
                  </tr>
            </tbody>

             <!------------------Exit Room-------------------------->

                                                             <div id="exit_rooms" class="modal">
                                                                  <div class="modal-content">
                                                                 
                                                                     <!--  <div class="row"> -->
                                                                        
                                                                                <div class="row">
                                                                                    <div class="col s3 offset-s5 grid-example">
                                                                                         <i class="large glyphicon glyphicon-exclamation-sign red-text"></i>
                                                                                    </div>
                                                                                    <div class="col s12">
                                                                                        <h5 class="del_cat">Are you sure?</b> </h5>
                                                                                    </div>                                                                                                                      
                                                                                </div>
                                                                      <!-- </div> -->
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="waves-effect waves-green btn blue right" id="exit_room">Exit</button>
                                                                    <button type="button" class="modal-close waves-effect waves-green btn red left">Cancel</button>
                                                                  </div>
                                                              
                                                           </div>

                                                          
                                                        

                                            