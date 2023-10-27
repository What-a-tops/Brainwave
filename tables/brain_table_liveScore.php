                          
                              <thead>
                                <tr>
                                   <th class="center black-text">Rank:</th>
                                   <th colspan="2" class="center black-text">Name:</th>
                                   <th class="center black-text" colspan="2">Score:</th>
                                </tr>
                            </thead>
                            <?php $ctr = 0; $get_users = $brain_joinRoomDB->get_Users($brain_score); foreach ($get_users as $k) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $ctr += 1;  ?>.</td>
                                            <?php if (empty($k->getAcc_path())) { ?>
                                                <td><img src="./pics/question.png" class="responsive-image circle" height="25" width="25"></td>
                                            <?php }else{ ?>
                                                <td><img src="<?= $k->getAcc_path();  ?>" class="responsive-image circle" height="25" width="25"></td>
                                            <?php } ?>
                                            
                                            <td><?= $k->getLname() . ',' . $k->getFname();  ?></td>
                                            <?php if (empty($k->getScore())) {?>
                                                <td class="center">0</td>
                                           <?php }else{ ?>
                                             <td class="center"><?= $k->getScore(); ?></td>
                                            <?php } ?>
                                            <!-- <td><i class="mdi mdi-thumb-up-outline"></i></td> -->
                                    
                                        </tr>
                                    </tbody>
                             <?php } ?>
              

                              