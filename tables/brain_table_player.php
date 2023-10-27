                 

                  <tbody>
                  <tr>
                  <?php $brain_rooms_play = $brain_roomDB->get_Room();
                    if (empty($brain_rooms_play)) { ?>
                            <th colspan="6" class="center">Room List is Empty!</th>
                  <?php }else{ ?>
                   <thead>
                        <tr>
                            <th data-field="id">No.</th>
                            <th data-field="Room">Room ID:</th>
                            <th data-field="Subject">Subject:</th>
                            <th data-field="Number">Number of Players:</th>
                            <th data-field="Action">Action:</th>
                        </tr>
                  </thead>
                   <?php $ctr = 0; foreach ($brain_rooms_play as $r ) { ?>                   
                            <td><?= $ctr += 1; ?>.</td>
                            <td><?= $r->getRoom_id(); ?></td>
                            <td><?= $r->getCategory();  ?></td>
                            <td><?= $r->getNum_of_players() . '/ ' . $r->getPlayers(); ?></td>
                            <?php if ($r->getNum_of_players() == $r->getPlayers()) { ?> 
                            <td><a href="#" onclick="Materialize.toast('Sorry! Full Room Not Allowed', 3000, 'rounded' )" class="waves-effect waves-red btn red ">Full</a></td>   
                           <?php }else{ ?>     
                            <td><a href="" data-param="<?= $r->getRid(); ?>" data-param1="<?= $r->getRoom_id();   ?>" class="join_room waves-effect waves-blue btn-flat">Join</a></td>
                        
                      </tr>
                          <?php } ?>                  
                    <?php } ?> 
                  <?php } ?>                   
                  </tbody>