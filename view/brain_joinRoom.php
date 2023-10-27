<?php require 'header/header.php'; ?>
<body>
   <?php $get_achiv = $brain_scoreDB->get_achiv($_SESSION['user_id']); ?>
   <div class="fixed-action-btn" id="btn-mnu-float">
    <button class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus"><i class="large glyphicon glyphicon-align-justify"></i></button>
    <ul>
      <li><a href="#" onclick="Materialize.toast('You are in Game room! Not Allowed', 3000, 'rounded' )" class="btn-floating purple waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class=" mdi mdi-account-multiple"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in Game room! Not Allowed', 3000, 'rounded' )" class="btn-floating blue waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in Game room! Not Allowed', 3000, 'rounded' )" class="btn-floating yellow darken-3 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Achievements"><i class=" glyphicon glyphicon-star"></i></a></li>
      <li><a href="#!" onclick="Materialize.toast('You are in Game room! Not Allowed', 3000, 'rounded' )" class="btn-floating orange darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Feedbacks"><i class=" glyphicon glyphicon-comment"></i></a></li></li>
      <li><a href="#modal3" class="btn-floating gray darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Options"><i class=" glyphicon glyphicon-cog"></i></a></li>
    </ul>
  </div>
   <!-- <audio id="my_audio_join" src="./audio/Happy.mp3" loop="loop"></audio> -->
  <?php if (isset($_SESSION['user'])) { ?>
 <div class="navbar-fixed">
    <nav class="fixed cyan darken-2 "role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
          <div class="col s3">
                <a href="#" class="brand-logo white-text"> Brain Wave Quiz Master</a>
          </div>
      </div>
     
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#!" id="list" class="toast1">My Profile</a></li>
      <li class="divider"></li>
        <li><a href="#" id="list" class="toast1">Logout</a></li>
      </ul>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
          <input type="hidden" id="user_id" name="name" value="<?= $brain_users->getUser_id(); ?>">
    </div>
  </nav> 
</div>
 <?php } ?>

  <input type="hidden" id="room_num" value="<?= $get_Room->getRoom_id();  ?>">
  <input type="hidden" id="playr_typ" value="<?= $get_Room->getPlayer_type();  ?>">

          <div class="section" id="j1">
              <div class="row container">
                 <h6 class="header white "><b class="left green accent-5 h">ROOM ID: <?= $get_Room->getRoom_id();  ?></b> <b class="right green accent-5 h">Category Name: <?= $get_Room->getCategory();  ?></b> </h6>
              
              <div class="progress red darken-1 ">
                <div class="determinate white"></div>
              </div>

                <label class="pull-right teal type z-depth-2 right"><b><?= $get_Room->getPlayer_type();  ?></b></label>
                <input type="hidden" id ="typ" value="<?= $get_Room->getPlayer_type();  ?>">
                <p class="grey-text text-darken-3 lighten-3">
                
              <div class="row">
                <div class="col s12 m4 l3"> 
                   <h6 class="center" id="mich"><b class="white-text">Mechanics:</b></h6>
                  <!-------------------->
                      <div class="slider ">
                      <ul class="slides z-depth-2">
                        <li class="lighten-3">
                           <img src="./bootstrap/img/backgrounds/cubepaper091.jpg" class="responsive-image">
                          <div class="caption right-align">
                            <h3 class="black-text">Easy</h3>
                            <p class="black-text flow-text"> 
                                  Correct 3 of the 5 Questions to pass the level. 
                                  <br>
                                  <b>Note</b>: Only once use of hint.
                            </p>
                          </div>
                        </li>
                        <li class="lighten-3">
                          <img src="./bootstrap/img/backgrounds/cubepaper061.jpg" class="responsive-image">
                         <div class="caption center-align">
                            <h4 class="black-text">Moderate</h4>
                            <p class="black-text flow-text"> 
                                  Input the correct answer to proceed the next level. 
                                  <br>
                                  <b>Note</b>: Only once use of hint.
                            </p>
                          </div>
                        </li>
                        <li class="lighten-3">
                          <img src="./bootstrap/img/backgrounds/cubepaper111.jpg" class="responsive-image">
                          <div class="caption left-align">
                            <h3 class="black-text">Hard</h3>
                            <p class="black-text flow-text"> 
                                  Buzz the button to answer first then input the correct answer to win this game. 
                            </p>
                          </div>
                       </li>
                      </ul>
                    </div>
                  <!-------------------->
                </div>

                <div class="col s12 m8 l9" >
                    <table class="responsive-table bordered hoverable white" id="tbl_joinRoom">
                         <?php include './tables/brain_table_joinRoom.php'; ?>
                    </table>
                </div>
              </div>

               <div class="progress red darken-1 ">
                <div class="determinate white"></div>
              </div>

             
                   <table class="responsive-table bordered" id="tbl_menu" style="border-bottom: none !important">
                      <?php include './tables/brain_table_startMenu.php'; ?>
                  </table>                                               
                  </div>  
            
            </div>

  <footer class="page-footer" id="j1">
          <div class="footer-copyright cyan darken-2">
                <div class="container center ">
                      <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
               </div>
          </div>
  </footer>
<?php include 'footer/footer_client_joinRoom.php'; ?>

                    
         