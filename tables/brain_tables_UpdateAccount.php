<?php if (isset($_SESSION['user'])) {
					$brain_users = $brain_UserDB->brain_getUser($_SESSION['user']);
		} ?>

 <div class="white-text teal col l6 center z-depth-2" id="list_users">
                               <span class="flow-text" id="h_list">Edit My Account</span></div>

                                 <div class="col l12">
                                     <div class="row">
                                                         <div class="section white z-depth-2" id="cont">
                                                                  <div class="row">
                                                                          <div class="col l12">
                                                                 <blockquote class="right">Note: 
                                                                    <b class="red-text">(***) As Required</b>
                                                                 </blockquote> 
                                                             <form id="update_Accounts" enctype="multipart/form-data">
                                                                  	<input type="hidden" name="user_id" value="<?= $brain_users->getUser_id();  ?>">
                                                                                  <div class="col l3 ">

                                                                                     <h6 class="center">Usertype: <b><?= $brain_users->getUsertype(); ?></b></h6>
                                                                                     <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="250" height="350" id="inputs">
                                                                                  <script>
                                                                                    var loadFile = function(event) {
                                                                                     var input = document.getElementById('inputs');
                                                                                     input.src = URL.createObjectURL(event.target.files[0]);
                                                                                    };

                                                                                  </script>

                                                                                     <div class="fileUpload col l6 offset-l3 grid-example">
                                                                                          <span class="btn btn-primary btn-flat "><i class="glyphicon glyphicon-camera"></i></span>
                                                                                          <input type="file" class="upload" value="<?= $brain_users->getAcc_path(); ?>" name="up_name"  accept="image/*" onchange="loadFile(event)" >
                                                                                      </div>
                                                                                </div>

                                                                                 <h4 class="center">Profile Information
                                                                                  </h4>
                                                                        
                                                                                      <hr>
                                                                                <div class="col s9">
                                                                                     
                                                                                      <div class="col l4">
                                                                                              <input  value="<?= $brain_users->getLname(); ?>" name="lastname" type="text" id="last_name" required>
                                                                                              <label for="last_name">Last Name:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                       <div class="col l4">
                                                                                              <input value="<?= $brain_users->getFname(); ?>" name="firstname" type="text" id="first_name"  required>
                                                                                              <label for="first_name">First Name:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                      <div class="col l4">
                                                                                              <input value="<?= $brain_users->getMname(); ?>" name="middlename" type="text" id="middle_name" required>
                                                                                              <label for="middle_name">Middle Name:<b class="red-text">(***)</b></label>
                                                                                      </div> 
                                                                                       <div class="col l4">
                                                                                              <input value="<?= $brain_users->getAddress(); ?>" name="address" type="text" id="address"  required>
                                                                                              <label for="address">Address:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                      <div class="col l3">
                                                                                              <input value="<?= $brain_users->getContact(); ?>" name="contact" type="text" id="contact"  required>
                                                                                              <label for="bday">Contact:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                      <div class="col l3">
                                                                                              <input value="<?= $brain_users->getGender(); ?>" name="gender" type="text" id="gender"  required>
                                                                                              <label for="gender">Gender:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                    
                                                                                      <div class="col l2">
                                                                                              <input value="<?= $brain_users->getAge(); ?>" name="age" type="number" id="age"  required>
                                                                                              <label for="age">Age:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                </div>

                                                                                <h5 class="center">Login Account:</h5>
                                                                                <hr>                                                    
                                                                                <div class="col l9">
                                                                                       <div class="col l4">
                                                                                            <input value="<?= $brain_users->getUsername(); ?>" name="username" type="text" id="Contact" required>
                                                                                            <label for="bday">Username:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                       <div class="col l4">
                                                                                            <input value="<?= $brain_users->getPassword(); ?>" type="text" name="password" id="pass" onkeyup="passwordStrength(this.value)" required>
                                                                                            <label for="bday">Password:<b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                      <?php if ($brain_users->getUsertype() == 'User') { ?>
                                                                                           <div class="input-field col l4">
                                                                                           <input type="hidden" name="usertype" value="User">
                                                                                      </div>

                                                                                       <?php }else{ ?>
                                                                                       <div class="input-field col l4">
                                                                                            <select name="usertype" id="usertype" required>
                                                                                              <option>Admin</option>
                                                                                               <option>User</option>  
                                                                                            </select>
                                                                                            <label for="usertype">Change Usertype: <b class="red-text">(***)</b></label>
                                                                                      </div>
                                                                                       <?php } ?>
                                                                                     
                                                                                </div>
                                                                                <div class="divider"></div>
                                                                               

                                                                          </div>
                                                                           <div class="col s12 m8 l12">
                                               <table class="responsive-table bordered">
                                                <thead>
                                                  <tr>
                                                     <th data-field="Strength">
                                                         <label for="passwordStrength" class="black-text"></label>
                                                     </th>
                                                    <th class="transparent-text" data-field="Password">
                                                        Password Strength:
                                                    </th>
                                                    <th class="right transparent-text" data-field="Description" id="Description">
                                                        Password Description:
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td>
                                                          <b>Password Strength:</b>
                                                      </td>
                                                      <td>
                                                             <div class="strength0" id="passwordStrength"></div>
                                                      </td>
                                                      <td class="right">
                                                             <div id="passwordDescription"></div>   
                                                      </td>
                                                    </tr>
                                                </tbody>
                                                
                                            </table>
                                        </div>



                                                                  </div>
                                                                    <div class="col l11">
                                                                                          <div class="col l3 center">
                                                                                                <button class="waves-effect waves-light btn blue" type="Submit">Update</button>
                                                                                          </div>
                                                                                </div>
                                                                                </form>

                                                         </div>


                                               </div>
                                                   
                                

                                </div>    
                                
                              </div>