                                      <thead>
                                          <tr class="info">
                                            <th>No.</th>
                                            <th>User ID:</th>
                                            <th>Fullname:</th>
                                            <th>Date Registered:</th>
                                            <th></th>
                                            
                                          </tr>
                                      </thead>
                                
                                <?php 
                                $ctr = 0;
                                foreach ($logs as $u) { ?>
                                      <tr>
                                        <td><?= $ctr += 1;  ?>.</td>
                                        <td><?= $u->getUser_id();  ?></td>
                                        <td><?= $u->getLname() . ', ' .$u->getFname().' ' .$u->getMname();   ?></td>
                                        <td><?= $u->getDate();  ?></td>
                                        <td>                         
                                         <a href="#view_profile<?=$u->getUser_id();?>" class="btn waves-effect waves-light modal-trigger" >View Profile</a>

                                            <div id="view_profile<?=$u->getUser_id();?>" class="modal">
                                                <div class="modal-content col l12">
                                                          <div class="row"> 
                                                    
                                                                    <div class="col l3">
                                                                        
                        
                                                                          <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $u->getAcc_path(); ?>" width="180" height="280">
                                                                       
                                                                    </div>

                                                                    <div class="col l9">
                                                                             <h4>Profile Information</h4>
                                                                            <hr>
                                                                            <div class="input-field col l4">
                                                                              <input  value="<?= $u->getLname(); ?>" length="30" name="lastname" type="text" id="last_name" class="view" readonly>
                                                                              <label for="last_name">Last Name:</label>
                                                                            </div>

                                                                            <div class="input-field col l4">
                                                                              <input value="<?= $u->getFname(); ?>" length="30" name="firstname" type="text" id="first_name"  class="view" readonly>
                                                                              <label for="first_name">First Name:</label>
                                                                            </div>
                                                                         
                                                                           <div class="input-field col l4">
                                                                              <input value="<?= $u->getMname(); ?>" length="30" name="middlename" type="text" id="middle_name"  class="view" readonly>
                                                                              <label for="middle_name">Middle Name:</label>
                                                                            </div>

                                                                             <div class="input-field col l6">
                                                                              <input value="<?= $u->getAddress(); ?>" length="50" name="address" type="text" id="address"  class="view" readonly>
                                                                              <label for="address">Address:</label>
                                                                            </div>

                                                                             <div class="input-field col l3">
                                                                              <input value="<?= $u->getAge(); ?>" length="30" name="age" type="number" id="age"  class="view" readonly>
                                                                              <label for="gender">Age:</label>
                                                                            </div>

                                                                            <div class="input-field col l3">
                                                                              <input value="<?= $u->getGender(); ?>" length="30" name="gender" type="text" id="gender"  class="view" readonly>
                                                                              <label for="gender">Gender:</label>
                                                                            </div>

                                                                             <div class="input-field col l3">
                                                                              <input value="<?= $u->getContact(); ?>" length="30" name="contact" type="text" id="Contact"  class="view" readonly>
                                                                              <label for="bday">Contact:</label>
                                                                            </div>
                                                                                                   
                                                                </div>
                                                                                    
                                                        </div>
                                                            
                                                  </div>
                                                  <div class="modal-footer">
                                                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
                                                  </div>
                                              </div>    
                                        
                                        </td>
                                      </tr>
                                 <?php } ?>