 <?php require 'header/header.php'; ?>
<body>
    <?php $get_achiv = $brain_scoreDB->get_achiv($_SESSION['user_id']); ?>
    <?php $category = $brain_CategoryDB->getCategory(); ?>
  <div class="fixed-action-btn" id="btn-mnu-float">
    <button class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus"><i class="large glyphicon glyphicon-align-justify"></i></button>
    <ul>
      <li><a href="#modal2" class="btn-floating modal-trigger purple waves-effect waves-transparent btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class="mdi mdi-account-multiple"></i></a></li>
      <li><a href="#help" class="btn-floating blue waves-effect btn modal-trigger waves-transparent btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
      <li><a href="#achiv" class="btn-floating yellow darken-3 waves-effect waves-transparent modal-trigger btn tooltipped" data-position="right" data-delay="50" data-tooltip="Achievements"><i class=" glyphicon glyphicon-star"></i></a></li>
      <li><a href="#!" id="comments" class="btn-floating orange darken-3 waves-effect waves-transparent btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Feedbacks"><i class=" glyphicon glyphicon-comment"></i></a></li></li>
    </ul>
  </div>
  <!-- <audio id="my_audio" src="./audio/02-Urbandub-Alert The Armory.mp3" loop="loop"></audio> -->
  <audio id="my_audio" src="./audio/happy1.mp3" loop="loop"></audio>

  <?php if (isset($_SESSION['user'])) { ?>
  <div class="navbar-fixed">

  <nav class="fixed cyan darken-2" role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
    
                <div class="col l3">
                       <a href="#" class="brand-logo white-text flow-text"> Brain Wave Quiz Master</a>
                </div>
                          
      </div>
     
      
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#my_profile" id="list" class="waves-effect waves-light modal-trigger flow-text">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" 
          id="list">Logout</a></li>
      </ul>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
           <input type="hidden" id="name" name="name" value="<?= $brain_users->getFname(); ?>">
           <input type="hidden" id="user_id" name="name" value="<?= $brain_users->getUser_id(); ?>">
    </div>
  </nav> 
   </div>
<?php } ?>
  
            <div class="section" id="hl">
              <div class="row container">
                  <div class="input-field col s3 m4 l3 right">
                                  <i class="black-text icon-search circle prefix"></i>
                                  <input id="search"  type="search" class="search_r">
                                  <label for="search" class="flow-text black-text">Search Here...</label>
                  </div>

                  <div class="col s12 m8 l12">
                      <h5 class=" header white-text flow-text"><b>ROOM LIST</b></h5>
                  </div>
                 <div class="col s12 m8 l12">
                      <table class="centered responsive-table  hoverable white" id="tblData">
                           <?php include './tables/brain_table_player.php'; ?>
                      </table>
                 </div>
                      
               
              </div>
            </div>


        <div class="parallax-container" id="hl"></div>

         <footer class="page-footer" id="hl">
                <div class="footer-copyright cyan darken-2">
                      <div class="container center ">
                            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
                     </div>
                </div>
         </footer>

  <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Create Room</h4>
      <div class="row">
    <form id="create_room">
       <input type="hidden" id="user_id" value="<?= $brain_users->getUser_id();  ?>">
        <div class="col s12 m4 l12">
            <div class="row">
                   <div class="col s12 m4 l6">
                        <img src="./pics/kol.jpg" class="responsive-image" width="350" height="300">
                   </div>
                   <div class="col s12 m4 l6 z-depth-2 right white">
                  
                         <input  id="room_num" value="<?= rand(10000,99999)?>" name="room_num" type="hidden" class="center" readonly >
                           <div class="input-field col l12">
                            <select id="categorys" name="category" required>
                                      <option disabled selected value="1">Choose your Subject:</option>
                                      <option>Random</option>
                                  <?php foreach ($category as $c) { ?>
                                      <option>
                                            <?= $c->getCategory(); ?>
                                      </option>
                                  <?php } ?>
                            </select>

                            <label>Select Subject:</label> 
                             <p id="selc" class="red-text"></p>
                          </div>
                      
                            <div class="input-field col s12 m8 l12">
                              <input id="players" name="players" type="number" required>
                              <label for="players">Number of Players:</label>
                              <p id="overlaps" class="red-text"></p>
                            </div>

                            <div class="input-field col s12 m8 l12">
                              <input id="num_pl" name="num_pl" type="number">
                              <label for="num_pl">Number of per Questions:</label>
                              <p id="overlaps1" class="red-text"></p>
                            </div>
                            
                    </div>

              </div>
          </div>
        </div>
    </div>

    <div class="modal-footer">
      <button class="modal-action waves-effect waves-green btn-flat" type="Submit">Submit</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
    </div>
 </form>
  </div>

<!------------------------------------>

<div id="my_profile" class="modal modal-fixed-footer">
    <div class="modal-content">
    <blockquote>
     <label>Profile Information.</label> 
    </blockquote>
      <div class="row white">
        <div class="col s12 m4 l3 ">
            <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="150" height="150" id="logo-container">
        </div>

        <div class="input-field col s12 m4 l3">
          <input  value="<?= $brain_users->getLname(); ?>" type="text" id="last_name" readonly>
          <label for="last_name">Last Name:</label>
        </div>

          <div class="input-field col s12 m4 l3">
            <input value="<?= $brain_users->getFname(); ?>" type="text" id="first_name" readonly>
            <label for="first_name">First Name:</label>
          </div>
       
         <div class="input-field col s12 m4 l3">
            <input value="<?= $brain_users->getMname(); ?>" type="text" id="middle_name" readonly>
            <label for="middle_name">Middle Name:</label>
          </div>

           <div class="input-field col s12 m4 l6">
            <input value="<?= $brain_users->getAddress(); ?>" type="text" id="address" readonly>
            <label for="address">Address:</label>
          </div>

           <div class="input-field col s12 m4 l1">
            <input value="<?= $brain_users->getAge(); ?>" type="text" id="gender" readonly>
            <label for="gender">Age:</label>
          </div>

          <div class="input-field col s12 m4 l2">
            <input value="<?= $brain_users->getGender(); ?>" type="text" id="gender" readonly>
            <label for="gender">Gender:</label>
          </div>

           <div class="input-field col s12 m4 l3">
            <input value="<?= $brain_users->getContact(); ?>" type="text" id="Contact" readonly>
            <label for="bday">Contact:</label>
          </div>

      </div>
   <!--  <blockquote> -->
           <b>Records:</b>
   <!--  </blockquote> -->
      <div class="row">
          <div class="col s12 m8 l12">
            <table class="responsive-table bordered striped">
            <tbody>
              <tr>
                <td><b>Games Played:</b></td>
                <?php if ($get_achiv->getAchiv_counts() == 0) { ?>
                  <td>0</td>
                <?php }else{ ?>
                   <td><?= $get_achiv->getAchiv_counts(); ?></td>
                <?php } ?>
               
                <td><b>Number of Wins:</b></td>
                <?php if ($get_achiv->getAchiv_counts() == 0) { ?>
                  <td>0</td>
                <?php }else{ ?>
                   <td><?= $get_achiv->getAchiv_counts(); ?></td>
                <?php } ?>
              
                <?php if (empty($get_achiv->getResult())) { ?>
                   <td><b>Category N/A</b></td>
                   <td>N/A</td>
                <?php }else{ ?>
                   <td><b>Category <?= $get_achiv->getResult(); ?></b></td>
                   <td> <?= $get_achiv->getDifficulty(); ?></td>
                <?php  } ?>
              </tr>
            </tbody>
          </table>
              </div> 
          </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat " id="update_client">Update</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
    </div>
  </div>


  <div id="help" class="modal modal-fixed-footer">
    <div class="modal-content">
      <blockquote>
      Help.
    </blockquote>
       <!-- <div class="divider"></div> -->
              <div class="row">
  
                <div class="col s12 m8 l12 white"> 
                      <p class="ins" class="flow-text">An interactive gameplay where the players can easily answer the corresponding question.There are 3 levels per categories and 10 questions per levels.Also it has a time limit exceeding 30 seconds in Easy 20 seconds in Moderate and 10 seconds in every questions and specifically there are eliminations in every levels requires the exact points to proceed to the next level. In <b>Easy mode</b> there are choices to be chosen of where the players can select one of the choices 60% correct answers can proceed the game. In <b>Moderate Mode</b> there are no choices but accepts player's answer, passing rate is also 60% inorder to continue the final game. In <b>Hard Mode</b> the fast answering method within 10 seconds time limit, with buzzer button determines whom first to answer same as moderate of passing.
                      <br>
                      <b>Note:</b> Every players have hints but only once who can used this.</p>
                </div>
      
              </div>
      
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>


  <!----------------------------------------------Aciv---------------------------------------------------->
  <div id="achiv" class="modal modal-fixed-footer">
    <div class="modal-content">
    <blockquote>
      My Achievements.
    </blockquote>
          <p class="ac"> 
              You need to defeat all the players inorder to win the game. Every subjects corresponds the number of winnings. Each wins there are levels of achievements. You need complete the required achievements so that you have a title for this game.
          </p>
              <div class="col s12 m8 l12">
                    <div class="row">
                       
                          <div class="col s12 m4 l7">
                                    <ul class="collapsible popout" data-collapsible="accordion">
                                      <li>
                                    
                                        <div class="collapsible-header  red lighten-1 center">ENGLISH</div>
                                        <div class="collapsible-body center white">
                                                  <p>
                                                     <img src="./bootstrap/img/backgrounds/1451069248_Trophy-gold.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 51 && $get_achiv->getAchiv_counts() <= 100 && $get_achiv->getDifficulty() == 'English') { ?>
                                                               Mastery <?= $get_achiv->getAchiv_counts(); ?> / 100
                                                      <?php }else{ ?> 
                                                               Mastery 0 / 100
                                                       <?php } ?>
                                                      <img src="./bootstrap/img/backgrounds/1451072177_Trophy-silver.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 21 && $get_achiv->getAchiv_counts() <= 50 && $get_achiv->getDifficulty() == 'English') { ?>
                                                             Expert <?= $get_achiv->getAchiv_counts(); ?> / 50
                                                       <?php }else{ ?>
                                                             Expert 0 / 50
                                                       <?php } ?>
                                                       <img src="./bootstrap/img/backgrounds/1451069264_Trophy-bronze.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() <= 20 && $get_achiv->getDifficulty() == 'English') { ?>
                                                              Best  <?= $get_achiv->getAchiv_counts(); ?> / 20  
                                                       <?php }else{ ?>
                                                              Best 0 / 20
                                                       <?php } ?>              
                                                  </p>
                                        </div>
                                       
                                      </li>

                                      <li>
                                  
                                        <div class="collapsible-header green lighten-1 center">MATH</div>
                                        <div class="collapsible-body white">
                                                  <p>
                                                     <img src="./bootstrap/img/backgrounds/1451069248_Trophy-gold.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 51 && $get_achiv->getAchiv_counts() <= 100 && $get_achiv->getDifficulty() == 'Math') { ?>
                                                               Mastery <?= $get_achiv->getAchiv_counts(); ?> / 100
                                                      <?php }else{ ?> 
                                                               Mastery 0 / 100
                                                       <?php } ?>
                                                      <img src="./bootstrap/img/backgrounds/1451072177_Trophy-silver.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 21 && $get_achiv->getAchiv_counts() <= 50 && $get_achiv->getDifficulty() == 'Math') { ?>
                                                             Expert <?= $get_achiv->getAchiv_counts(); ?> / 50
                                                       <?php }else{ ?>
                                                             Expert 0 / 50
                                                       <?php } ?>
                                                       <img src="./bootstrap/img/backgrounds/1451069264_Trophy-bronze.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() <= 20 && $get_achiv->getDifficulty() == 'Math') { ?>
                                                              Best  <?= $get_achiv->getAchiv_counts(); ?> / 20  
                                                       <?php }else{ ?>
                                                              Best 0 / 20
                                                       <?php } ?>      
                                                  </p>
                                        </div>
                                      
                                      </li>

                                      <li>
                                    
                                        <div class="collapsible-header yellow lighten-1 center">SCIENCE</div>
                                        <div class="collapsible-body white">
                                                  <p>
                                                     <img src="./bootstrap/img/backgrounds/1451069248_Trophy-gold.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 51 && $get_achiv->getAchiv_counts() <= 100 && $get_achiv->getDifficulty() == 'Science') { ?>
                                                               Mastery <?= $get_achiv->getAchiv_counts(); ?> / 100
                                                      <?php }else{ ?> 
                                                               Mastery 0 / 100
                                                       <?php } ?>
                                                      <img src="./bootstrap/img/backgrounds/1451072177_Trophy-silver.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 21 && $get_achiv->getAchiv_counts() <= 50 && $get_achiv->getDifficulty() == 'Science') { ?>
                                                             Expert <?= $get_achiv->getAchiv_counts(); ?> / 50
                                                       <?php }else{ ?>
                                                             Expert 0 / 50
                                                       <?php } ?>
                                                       <img src="./bootstrap/img/backgrounds/1451069264_Trophy-bronze.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() <= 20 && $get_achiv->getDifficulty() == 'Science') { ?>
                                                              Best  <?= $get_achiv->getAchiv_counts(); ?> / 20  
                                                       <?php }else{ ?>
                                                              Best 0 / 20
                                                       <?php } ?>                                                            
                                                  </p>
                                        </div>
                                      
                                      </li>

                                       <li>
                                      
                                        <div class="collapsible-header grey lighten-1 center">HISTORY</div>
                                        <div class="collapsible-body white">
                                                  <p>
                                                    <img src="./bootstrap/img/backgrounds/1451069248_Trophy-gold.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 51 && $get_achiv->getAchiv_counts() <= 100 && $get_achiv->getDifficulty() == 'History') { ?>
                                                               Mastery <?= $get_achiv->getAchiv_counts(); ?> / 100
                                                      <?php }else{ ?> 
                                                               Mastery 0 / 100
                                                       <?php } ?>
                                                      <img src="./bootstrap/img/backgrounds/1451072177_Trophy-silver.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 21 && $get_achiv->getAchiv_counts() <= 50 && $get_achiv->getDifficulty() == 'History') { ?>
                                                             Expert <?= $get_achiv->getAchiv_counts(); ?> / 50
                                                       <?php }else{ ?>
                                                             Expert 0 / 50
                                                       <?php } ?>
                                                       <img src="./bootstrap/img/backgrounds/1451069264_Trophy-bronze.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() <= 20 && $get_achiv->getDifficulty() == 'History') { ?>
                                                              Best  <?= $get_achiv->getAchiv_counts(); ?> / 20  
                                                       <?php }else{ ?>
                                                              Best 0 / 20
                                                       <?php } ?>     
                                                  </p>
                                        </div>
                                      
                                      </li>

                                       <li>
                                      
                                        <div class="collapsible-header brown lighten-1 center">FILIPINO</div>
                                        <div class="collapsible-body white">                                                 
                                                  <p>
                                                    <img src="./bootstrap/img/backgrounds/1451069248_Trophy-gold.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() == 100 && $get_achiv->getDifficulty() == 'Filipino') { ?>
                                                               Mastery <?= $get_achiv->getAchiv_counts(); ?> / 100
                                                      <?php }else{ ?> 
                                                               Mastery 0 / 100
                                                       <?php } ?>
                                                      <img src="./bootstrap/img/backgrounds/1451072177_Trophy-silver.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 50 && $get_achiv->getAchiv_counts() <= 99 && $get_achiv->getDifficulty() == 'Filipino') { ?>
                                                             Expert <?= $get_achiv->getAchiv_counts(); ?> / 50
                                                       <?php }else{ ?>
                                                             Expert 0 / 50
                                                       <?php } ?>
                                                       <img src="./bootstrap/img/backgrounds/1451069264_Trophy-bronze.png" class="responsive-image" height="20" width="20">
                                                       <?php if ($get_achiv->getAchiv_counts() >= 20 && $get_achiv->getDifficulty() == 'Filipino') { ?>
                                                              Best  <?= $get_achiv->getAchiv_counts(); ?> / 20  
                                                       <?php }else{ ?>
                                                              Best 0 / 20
                                                       <?php } ?>         
                                                  </p>
                                        </div>
                                     
                                      </li>
                                     
                                    </ul>
                          </div>

                           <div class="col s12 m4 l5">
                                  <?php if ($get_achiv->getResult() == 'Master') { ?>
                                      <h5>Subject Master: <?= $get_achiv->getDifficulty(); ?></h5>
                                  <?php }else if ($get_achiv->getResult() == 'Expert') { ?>
                                      <h5>Subject Expert: <?= $get_achiv->getDifficulty(); ?></h5>
                                  <?php }else if ($get_achiv->getResult() == 'Best'){ ?>
                                       <h5>Subject Best: <?= $get_achiv->getDifficulty();  ?></h5>
                                   <?php }else{ ?>
                                    <h5>Subject Master: N/A</h5>
                                    <h5>Subject Expert: N/A</h5>
                                    <h5>Subject Best: N/A</h5>
                                  <?php } ?>
                                   
                          </div>



                    </div>

              </div>
             
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
    </div>
  </div>

  <!----------------------------------------------Aciv---------------------------------------------------->
  
 
<?php include 'footer/footer_clientRoom.php'; ?>


