<?php require './header/header.php'; ?>
<body >

 <div class="navbar-fixed">
    <nav>
    <div class="nav-wrapper light-blue darken-2">
        <div class="container">
           <a href="#" class="brand-logo white-text">Brainwave Quiz Master</a>
        </div>
    </div>
  </nav>
</div>

  <div class="section white z-depth-2" id="login">
    <div class="row container">
    
     <input type="hidden">
      <div class="row">
          
                    <div class="col s6 m4 l6 offset-l3 grid-example" id="logins">
                    <div class="ho">

                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th><h4>Sign In:</h4>  </th>
                                        <th><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" height="80" class="responsive-image right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                          <label class="black-text">Enter your username and password to log on:</label>
                                        </td>
                                    </tr>
                                </tbody>
                              
                            </table>
                           <div class="divider"></div>
                            
                    </div>
                 <form id="submit_log">              
                     <div class="ho black-text">
                           <div class="input-field col s12 m8 l12">
                                 <i class="mdi mdi-account-circle prefix"></i>
                                <input id="user" type="text" name="user" required autofocus>
                                <label for="user">Username:</label>
                          </div>
                           <div class="input-field col s12 m8 l12">
                                <i class="mdi mdi-briefcase prefix"></i>
                                 <input id="pass" type="password" name="pass" required>
                                <label for="pass">Password:</label>
                       </div>
                       <div class="divider"></div>
                          <div class="grid-example">
                          <button class="waves-effect waves-light btn" id="myButton" type="Submit">LOGIN</button>
                          </div>   
                     </div >
                 </form>           
                    </div>
                        
            
              </div>
                <div class="row" id="mno">
                      <div class="col s12 m8 l6 offset-l3 grid-example ">
                                                     
                                  <div class="social-login-buttons">
                                      <button class="btn modal_reg">Create Account</button>  
                                      <a class="waves-effect waves-light btn modal-trigger" href="#modal_forgot">Forgot Password</a>
                                  </div>
                          </div>
                    </div>
                </div>
                 <div class="s12 m8 l6 offset-l3 grid-example " id="mno">
                      <ul class="col l6 offset-l3 grid-example " id="verified_login">
                                    <?php include './tables/brain_table_verifiedLogin.php'; ?>
                      </ul>
                </div>
    </div>
  </div>

  <div class="section white z-depth-2" id="login1">
    <div class="row container">
      <h2 class="header white-text">About:</h2>
      <p class="white-text lighten-3 flow-text" id="ab">
          An interactive multiplayer lan game, where all players compete each other to be the top Quizzer. 
          The purpose of this game is to give more interest for students so that they will learn and  not just gaming but fun learning. 
          Also to find their best and their weakest in every subjects, so that they will improve or change the quality of their studies.
      </p>
    </div>
  </div>

            



   <!-----------------------Modal-------------------------------->
              <div id="modal_reg" class="modal modal-fixed-footer">
                    <div class="modal-content">
                            <div class="col s12 m8 l12">
                                <div class="row">
                                    <div class="col l8 ">
                                          <blockquote>
                                            Registry Form.
                                          </blockquote>
                                    </div>
                                    <div class="col l4">
                                       
                                              <blockquote>Note: <b class="red-text">(***) As Required</b></blockquote> 
                                    </div>
                                  
                                </div>
                            </div>
                             
                            
                                <form id="reg" enctype="multipart/form-data">
                                <div class="col s12 m8 l6">

                                      <div class="row">
                                          <label class="black-text">Upload Your Photo:</label>
                                          <label><b class="red-text">***(Optional)</b></label>
                                          <input type="hidden" class="form-control in" name="user_id" value="<?= date('Y').'-'.rand(10000,99999)?>" id ="user_id" readonly></br>
                                          <div class="input-field col s12 m4 l3 ">
                                            <div>
                                                <img src="./pics/unk.png" id="outputs" class="responsive-image z-depth-1" width="150" height="150">
                                              </div>
                                               <script>
                                                  var loadFile = function(event) {
                                                  var output = document.getElementById('outputs');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>
                                                  <div class="fileUpload col s12 m4 l7 offset-l2 grid-example">
                                                          <span class="btn btn-block btn-flat transparent"><i class="glyphicon glyphicon-camera"></i></span>
                                                          <input type="file" class="upload" name="acc_name"  accept="image/*" onchange="loadFile(event)">
                                                </div>
                                          </div>

                                          <div class="col s12 m8 l3 input-field">
                                            <input id="last_name" class="black-text" type="text" name="lastname" required>
                                            <label for="last_name" class="black-text">Last Name: <b class="red-text" id="l1">***</b></label>
                                            
                                          </div>
                                          <div class="col s12 m8 l3 input-field">
                                            <input id="first_name" type="text" name="firstname" required>
                                            <label for="first" class="black-text">First Name:<b class="red-text" id="l2">***</b></label>
                                            
                                          </div>
                                           <div class="col s12 m8 l3 input-field">
                                            <input id="middle_name" type="text" name="middlename" required>
                                            <label for="middle_name" class="black-text">Middle Name:<b class="red-text" >***</b></label>
                                            
                                          </div>
                                           <div class="col s12 m8 l3 input-field">
                                            <input id="age" type="number" name="age" required>
                                            <label for="age" class="black-text">Age:<b class="red-text">***</b></label>
                                           
                                          </div>
                                          
                                          <div class="col s12 m8 l6 input-field">
                                            <input id="address" type="text" name="address"required>
                                            <label for="address" class="black-text">Address:<b class="red-text">****</b></label>
                                           
                                          </div>

                                           <div class="col s12 m8 l4 input-field">
                                            <input id="contact" name="contact" class="center" type="text" required>
                                            <label for="contact" class="black-text">Contact Number:<b class="red-text">***</b></label>
                                             
                                          </div>

                                          <div class="input-field col s12 m8 l4">
                                            <select id="gender" name="gender" required>
                                                <option disabled selected>Select Your Gender:</option>
                                                <option>MALE</option>
                                                <option>FEMALE</option>
                                              </select>
                                              <label>Select Your Gender: <b class="red-text">***</b></label>
                                          </div>

                              
                                          <div class="col s12 m8 l6 input-field">
                                           
                                            <input id="username" name="username" type="text" required>
                                            <label for="username" class="black-text">Username:<b class="red-text">***</b></label>
                                            
                                          </div>

                                           <div class="col s12 m8 l6 input-field">
                                            <input type="password" name="password" id="pass" onkeyup="passwordStrength(this.value)"/>
                                            <label for="pass" class="black-text">New Password:<b class="red-text">***</b></label>
                                            
                                          </div>

                    
                                          <div class="col s12 m8 l3">
                                                                                                                          
                                                <?php if (empty($registers)) { ?>
                                                      <select name="usertype">
                                                        <option>Admin</option>
                                                        <option>User</option>                                                      
                                                     </select>
                                                      <label>Usertype Select:</label>
                                                      <label class="red-text">***</label>

                                                 <?php }else{ ?>
                                                      <input id="usertype" name="usertype" type="hidden" value="User" class="center">
                                                  <?php } ?>    
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

                                          <div class="col l8 ">
                                                <blockquote>
                                                  For Account Recovery
                                                </blockquote>
                                            </div>

                                          <div class="col s12 m8 l12 input-field">
                                            <input id="secret_quest" name="secret_quest" type="text" required>
                                            <label for="secret_quest" class="black-text">Enter Your Secret Question:<b class="red-text">***</b></label>
                                          </div>

                                          <div class="col s12 m8 l12 input-field">
                                            <input id="secret_answer" name="secret_answer" type="text" required>
                                            <label for="secret_answer" class="black-text">Enter Your Answer:<b class="red-text">***</b></label>
                                          </div>
                                         
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="modal-action modal-close waves-effect waves-red btn-flat left" type="button">Close</button>
                              <button class="waves-green btn-flat submit_log right" type="submit">Submit</button>
                            </div>
                          </div>
                        </form>

                </div>
     <!-----------------------Modal-------------------------------->


      <!-----------------------Forgot Password-------------------------------->
        <div id="modal_forgot" class="modal modal-fixed-footer">
            <div class="modal-content">
               <blockquote>
                  Forgot Password??
              </blockquote>
             
                <div>
                      <div class="row">
                             <div class="col l12">
                          
                                  <div class="input-field">
                                    <i class="mdi mdi-account-circle prefix"></i>
                                    <input id="uname" type="text" class="validate">
                                    <label for="uname">Enter Username:</label>
                                    <p id="aw"></p>
                                  </div>
                                   <button id="check_username" class="right waves-effect waves-blue btn tooltipped" data-position="right" data-delay="50" data-tooltip="Check Username">
                                    <i class="mdi mdi-checkbox-marked-circle"></i>
                                </button>
                            </div>

                             <div class="col l9" id="srt">
                                  <div class="input-field" id="forgot_log">
                                      <?php include './tables/brain_tables_forgot.php'; ?>
                                  </div>
                            </div>

                          
                      
                           
                      </div>
              </div>
            </div>

            <div class="modal-footer">
             <button class="right modal-action modal-close waves-effect waves-red btn-flat left" type="button">Close</button>
            </div>
          </div>

      <!-----------------------Forgot Password-------------------------------->


     
      <?php include 'footer/footer_login.php'; ?>

 <div class="footer-copyright blue">
        <div class="container center">
            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b> 2015 BRAINWAVE QUIZ MASTER</b></label>
        </div>
</div>
           

              
                   
                          
                 



              
 
 


    

 