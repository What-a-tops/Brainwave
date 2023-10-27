<?php require 'header/header.php'; ?>
<body id="main_vi">
<?php if (isset($_SESSION['user'])) { ?>
 
    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
       <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" id="list" >Logout</a></li>
    </ul>
    <div class="navbar-fixed">
        <nav class="teal darken-3">
        <div class="nav-wrapper">
           <div class="container">
                <div class="col l3">
                       <a href="#" class="brand-logo white-text flow-text"> Brain Wave Quiz Master</a>
                </div>       
           </div>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" href="#!" data-beloworigin="true" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?></a></li>
          </ul>
        </div>
      </nav>
    </div>
  <?php } ?>


     <div class="row">
      <div class="col l2  z-depth-2">
              <div class="logo">
                    <a href="#" class="brand-logo"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
              </div>
                 <div class="white-text  center teal z-depth-2" id="mion"><span class="flow-text"></span>MENUS</div>
                   <ul class="collapsible teal" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header z-depth-2 active"><i class="tiny mdi mdi-more"></i> CATEGORY </div>
                      <div class="collapsible-body teal darken-3">
                             <ul class="left-align">
                                <li id="list2"><a href="?action=admin&dup=''&user_id=<?= $brain_users->getUser_id(); ?>&quest=''" class="center waves-effect waves-light btn-flat transparent modal-trigger white-text" ><i class="left mdi mdi-layers" id="mn_cat"></i> Category List</a></li>
                                <li class="divider"></li>
                                <li id="list2"><a href="#!" class="center waves-effect waves-light btn-flat transparent white-text"><i class="left glyphicon glyphicon-question-sign" id="mn_cat"></i> View Question</a></li>
                             </ul>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header z-depth-2"><i class="tiny mdi mdi-account-box"></i> USERS </div>
                      <div class="collapsible-body teal darken-3">
                            <ul class="left-align">
                                <li id="list2"><a href=".?action=view_user&user_id=<?= $brain_users->getUser_id(); ?>&quest=''" class="center waves-effect waves-light btn-flat transparent white-text"><i class="left mdi mdi-account-multiple-outline" id="mn_cat"></i>  User Lists</a></li>
                                <li class="divider"></li>
                                <li id="list2"> <a href=".?action=u_logs&user_id=<?= $brain_users->getUser_id();?>" class="center waves-effect waves-light btn-flat transparent white-text"><i class="left mdi mdi-google-controller" id="mn_cat"></i> Admin Logs</a></li>                              
                                <li class="divider"></li>
                                <li id="list2"><a href="?user_id=<?= $brain_users->getUser_id();?>&action=brain_UpdateAccount&quest=''"  class="center waves-effect waves-light btn-flat transparent white-text"><i class="left mdi mdi-wrench" id="mn_cat"></i> User Update</a></li>
                            </ul>  
                      </div>
                    </li>
                  </ul>

                
               </div>

                    <div class="col l10">          
                           <div class="white-text teal col l6 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list">Question List</span></div>
                                 <div class="col s12">
                                    <div class="row">
                                      
                                      <div class="input-field col l3">
                                          <a href="#" class="btn blue add_quest"><i class="glyphicon glyphicon-plus-sign"  id="mn_cat"></i> Add Question</a>
                                          <div id="message"></div>
                                      </div>

                                      <div class="input-field col l2">
                                       <select id="sel_cat">
                                        <option disabled selected>Categories:</option>
                                        <option value="All">All</option>
                                        <?php foreach ($category as $row) { ?>
                                          <option value="<?= $row->getCategory(); ?>"><?= $row->getCategory();  ?></option>
                                        <?php } ?>
                                        </select>
                                        <label>Select Category:</label>
                                      </div>

                                      <div class="input-field col l2">
                                       <select id="sel_lvl" class="right-text">
                                        <option disabled selected>Levels:</option>
                                            <option>All</option>
                                            <option>Easy</option>
                                            <option>Moderate</option>
                                            <option>Hard</option>
                                        </select>
                                        <label>Select Level:</label>
                                      </div>

                                       <div class="input-field col l3 offset-s1">
                                          <i class=" icon-search circle prefix"></i>
                                          <input id="search"  type="search" class="validate">
                                          <label for="search">Search Here...</label>
                                      </div>

                                      <div class="section white z-depth-2">
                                        <div class="row">
                                              <div class="col s12" id="easy">
                                                    <table class="bordered responsive-table centered" id="tblData">
                                                        <?php include './tables/brain_tables_Question.php'; ?>
                                                    </table>
                                              </div>
                                       </div>
                                      </div>
                                  
                                    </div>    
                                </div>
                    </div>
      </div>       
<!--------------------------------------Add Question---------------------------------------------------------->
<div id="modal_addQuest" class="modal">
    <div class="modal-content">
      <div class="col l12">
          <div class="row">
              <div class="col l6">
                   <h4>Add Question:</h4>
              </div>
                      <div class="l6">
                              <div class="col l4 right"> 
                                    <label>Select Level:</label>
                                    <ul class='tabs'>
                                      <li class="tab col l6"><a class="active" href="#test1" >Easy</a></li>
                                      <li class="tab col l6"><a href="#test2">Moderate</a></li>
                                      <li class="tab col l6"><a href="#test3">Hard</a></li>
                                    </ul>
                              </div>
                              
                        </div>
             </div>
      </div>

          <div id="test1" class="col l12">
          <form id="submit_question">
              <input type="hidden" name="level" value="Easy">
              <div class="row">
                    <div class="input-field col l3">

                                    <select name="subject_E" id="subject_E" required>
                                     <option disabled selected>Select Subject</option>
                                      <?php foreach ($category as $c) { ?>
                                          <option value="<?= $c->getCategory(); ?>"><?= $c->getCategory();  ?></option>
                                      <?php } ?>    
                                    </select>
                                   <label>Select Subject:</label>
                            
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile1 = function(event) {
                              var output = document.getElementById('add_quest');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col l8 offset-l1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" id="quest_pic" name="quest_pic" accept="image/*" onchange="loadFile1(event)">
                            </div>
                    </div>

            <div class="col l9">
                  <div class="row">
                      <div class="input-field col l12">
                                <i class="icon icon-pencil prefix"></i>
                                <textarea id="easy_q" name="question"  class="materialize-textarea" autofocus ></textarea>
                                <label for="easy_q" >Add Question to Easy:</label>
                                <p id="ques" class="red-text"></p>
                      </div>

                      <div class="input-field col l3 ">
                                <input id="a" name="correct" type="text" >
                                <label for="a">Input Answer:</label>
                                 <p id="cor" class="red-text"></p>
                      </div>

                      <div class="input-field col l3">
                                <input id="b" name="choiceB" type="text" >
                                <label for="b" >Input Choice:</label>
                                 <p id="ch1" class="red-text"></p>
                      </div>

                      <div class="input-field col l3 ">
                                <input id="c" name="choiceC" type="text">
                                <label for="c">Input Choice:</label>
                                 <p id="ch2" class="red-text"></p>
                      </div>

                      <div class="input-field col l3">
                                <input id="d" name="choiceD" type="text">
                                <label for="d">Input Choice:</label>
                                 <p id="ch3" class="red-text"></p>
                      </div>

                      <div class="input-field col l12">
                                <i class="icon icon-eye-open prefix"></i>
                                <input id="hint" type="text" name="hint">
                                <label for="hint">Input hint:</label>
                                 <p id="hun" class="red-text"></p>
                      </div>

                  </div>
            </div>

                    
              </div>
              <div class="divider"></div>
                     <button type="submit" class="waves-effect waves-green btn-flat right">Submit</button>
                     <a href="#!" class="modal-close modal-action waves-effect waves-red btn-flat left">Close</a>
                  <div class="divider"></div>
        </form>
        
    </div>
          <div id="test2" class="col l12">
              <form id="submit_question_mod" enctype="multipart/form-data">
                   <input type="hidden" name="level" value="Moderate">
                  <div class="row">
                       <div class="input-field col l3">
                            
                                    <select name="subject" required>
                                     <option disabled selected>Select Subject</option>
                                    
                                    <?php foreach ($category as $c) { ?>
                                         <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                                    <?php } ?>    
           
                                    </select>
                                    <label>Select Subject:</label>
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest1" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile = function(event) {
                              var output = document.getElementById('add_quest1');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col l8 offset-l1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                            </div>
                         </div>

                          <div class="col l9">
                                <div class="row">
                                    <div class="input-field col l12">
                                              <i class="icon icon-pencil prefix"></i>
                                              <textarea id="mod_q" name="question" class="materialize-textarea" autofocus ></textarea>
                                              <label for="mod_q" >Add Question to Moderate:</label>
                                               <p id="mok" class="red-text"></p>
                                    </div>

                                    <div class="input-field col l12 ">
                                              <i class=" glyphicon glyphicon-ok prefix"></i>
                                              <input id="ans_m" name="answer" type="text">
                                              <label for="ans_m">Answer:</label>
                                              <p id="ant" class="red-text"></p>
                                    </div>


                                    <div class="input-field col l12">
                                              <i class="icon icon-eye-open prefix"></i>
                                              <input id="hint_m" type="text" name="hint">
                                              <label for="hint_m" >Input hint:</label>
                                              <p id="hi" class="red-text"></p>
                                    </div>
              
                                </div>
                          </div>

                  </div>
                    <div class="divider"></div>
                     <button type="submit" class="waves-effect waves-green btn-flat right">Submit</button>
                    <a href="#!" class="modal-close modal-action waves-effect waves-red btn-flat left">Close</a>
                  <div class="divider"></div>
              </form>
          </div>
          <div id="test3" class="col l12">
                  <form id="submit_question_hard"  enctype="multipart/form-data">
                  <input type="hidden" name="level" id="level_H" value="Hard">
                  <div class="row">
                       <div class="input-field col l3">
                           
                                    <select name="subject" required>
                                     <option disabled selected>Select Subject</option>
                                    
                                    <?php foreach ($category as $c) { ?>
                                         <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                                    <?php } ?>    
           
                                    </select>
                                     <label>Select Subject:</label>
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest2" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile3 = function(event) {
                              var output = document.getElementById('add_quest2');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col l8 offset-l1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile3(event)">
                            </div>
                         </div>

                          <div class="col s9">
                                <div class="row">
                                    <div class="input-field col l12">
                                              <i class="icon icon-pencil prefix"></i>
                                              <textarea id="hard_q" name="question" class="materialize-textarea" autofocus ></textarea>
                                              <label for="hard_q" >Add Question to Hard:</label>
                                              <p id="p" class="red-text"></p>
                                    </div>

                                    <div class="input-field col l12 ">
                                              <i class=" glyphicon glyphicon-ok prefix"></i>
                                              <input id="a_h" name="answer" type="text">
                                              <label for="a_h" >Answer:</label>
                                              <p id="k" class="red-text"></p>
                                    </div>

                                    <div class="input-field col l12">
                                              <i class="icon icon-eye-open prefix"></i>
                                              <input id="hj" type="text" name="hint">
                                              <label for="hj" >Input hint:</label>
                                              <p id="i" class="red-text"></p>
                                    </div>
                                  
                                </div>
                          </div>

                  </div>
                  <div class="divider"></div>
                     <button type="submit" class="waves-effect waves-green btn-flat right">Submit</button>
                    <a href="#!" class="modal-close modal-action waves-effect waves-red btn-flat left">Close</a>
                  <div class="divider"></div>
              </form>
          </div>
    </div>
  </div>
<!------------------------------------------------------------------------>
<!-------------------------------------------------View Account------------------------------------------>
 <div id="admin_profile" class="modal">
        <div class="modal-content">

            <h4>Profile Information</h4>
              <hr>  
                  <div class="row">

                    <div class="col l3 ">
                         <h6><?= $brain_users->getUsertype();  ?></h6>
                        <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="150" height="180" id="logo-container">
                    </div>

                    <div class="input-field col l3">
                      <input  value="<?= $brain_users->getLname(); ?>" type="text" id="last_name" readonly>
                      <label for="last_name">Last Name:</label>
                    </div>

                      <div class="input-field col l3">
                        <input value="<?= $brain_users->getFname(); ?>" type="text" id="first_name"  readonly>
                        <label for="first_name">First Name:</label>
                      </div>
                   
                     <div class="input-field col l3">
                        <input value="<?= $brain_users->getMname(); ?>" type="text" id="middle_name" readonly>
                        <label for="middle_name">Middle Name:</label>
                      </div>

                       <div class="input-field col l6">
                        <input value="<?= $brain_users->getAddress(); ?>" type="text" id="address" readonly>
                        <label for="address">Address:</label>
                      </div>

                       <div class="input-field col l3">
                        <input value="<?= $brain_users->getAge(); ?>" type="text" id="gender" readonly>
                        <label for="gender">Age:</label>
                      </div>

                      <div class="input-field col l3">
                        <input value="<?= $brain_users->getGender(); ?>" type="text" id="gender" readonly>
                        <label for="gender">Gender:</label>
                      </div>

                       <div class="input-field col l3">
                        <input value="<?= $brain_users->getContact(); ?>" type="text" id="Contact" readonly>
                        <label for="bday">Contact:</label>
                      </div>

                  </div>
                    
          </div>
         <div class="modal-footer">
            <button class="modal-action modal-close waves-effect waves-red btn-flat left" title="Close">Close</button>
            <a href="?user_id=<?= $brain_users->getUser_id();?>&action=brain_UpdateAccount&quest=''" class="waves-effect waves-blue btn-flat right" title="Edit or Update">Edit</a>
          </div>
  </div>
   
      <footer class="page-footer" id="main_vi">
                <div class="footer-copyright">
                      <div class="container center ">
                            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
                     </div>
                </div>
        </footer>
            

 <?php include 'footer/footer_admin.php'; ?>

   
         
     
              
       