<?php require 'header/header.php'; ?>
  <?php $get_subMod = $brain_reserveQuestionDB->get_subMod($_SESSION['room_id'],$_SESSION['lvl']); ?>  
  <?php $get_total_Ques = $brain_reserveQuestionDB->get_total_Ques($_SESSION['room_id']); ?>
  <body id="g1">
  <div class="fixed-action-btn" style="top: 55px; left: 15px;">
    <button class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus"><i class="large glyphicon glyphicon-align-justify"></i></button>
    <ul>
      <li><a href="#modal3" class="btn-floating gray darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Options"><i class=" glyphicon glyphicon-cog"></i></a></li>
      <li><a href="#quit_game" class="btn-floating waves-effect waves-light red darken-4 modal-trigger btn btn tooltipped" id="" data-position="right" data-delay="50" data-tooltip="Quit Game"><i class="glyphicon glyphicon-remove-circle"></i></a></li>
    </ul>
  </div>

  <?php if (isset($_SESSION['user'])) { ?>
  <div class="navbar-fixed">
    <nav class="fixed cyan darken-2 "role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
            <div class="col s3">
                    <a href="#" class="brand-logo white-text flow-text"> Brain Wave Quiz Master</a>
             </div>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#!" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" id="list">My Profile</a></li>
      <li class="divider"></li>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" id="list">Logout</a></li>
      </ul>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
           <input type="hidden" id="user_id" value="<?= $brain_users->getUser_id(); ?>">
           <input type="hidden" id="total_q" value="<?= $get_total_Ques->getTotal_numQ(); ?>">
           <input type="hidden" id="room_num" value="<?= $_SESSION['room_id']; ?>">
    </div>
  </nav> 
</div>
 <?php } ?>


<div id="bord"> 
  <div class="col l12" id="">
    <div class="row container" id="yum">
    <div class="col l12 left">
           <?php if ($get_subMod->getCategory() == 'English') { ?>
          <label class="white-text  red lighten-1 z-depth-2" id="gam_sub">Subject: <b><?= $get_subMod->getCategory(); ?></b></label>
          <?php }elseif ($get_subMod->getCategory() == 'Math') { ?>
               <label class="white-text  green lighten-1 z-depth-2" id="gam_sub">Subject: <b><?= $get_subMod->getCategory(); ?></b></label>
          <?php }elseif ($get_subMod->getCategory() == 'Science') { ?>
               <label class="white-text  yellow lighten-1 z-depth-2" id="gam_sub">Subject: <b><?= $get_subMod->getCategory(); ?></b></label>
          <?php }elseif ($get_subMod->getCategory() == 'Filipino') { ?>
               <label class="white-text  brown lighten-1 z-depth-2" id="gam_sub">Subject: <b><?= $get_subMod->getCategory(); ?></b></label>
          <?php }elseif ($get_subMod->getCategory() == 'History') { ?>
               <label class="white-text  grey lighten-1 z-depth-2" id="gam_sub">Subject: <b><?= $get_subMod->getCategory(); ?></b></label>
         <?php } ?>
    </div>
     
         <div class="col s9 z-depth-2 white">
                         <label class="black-text right">sec</label>
                        <?php if ($get_subMod->getDifficulty() == 'Easy') { ?>
                              <table class="responsive-table centered bordered " id="data">
                                    <?php include './tables/brain_table_game(Easy).php'; ?>
                            </table>
                         <?php }elseif ($get_subMod->getDifficulty() == 'Moderate') { ?>
                              <table class="responsive-table centered bordered " id="data">
                                    <?php include './tables/brain_table_game(Moderate).php'; ?>
                              </table>
                              
                          <?php }elseif ($get_subMod->getDifficulty() == 'Hard') { ?>
                               <table class="responsive-table centered bordered " id="data">
                                    <?php include './tables/brain_table_game(Hard).php'; ?>
                              </table>
                              
                         <?php } ?>
          </div>
        
            <label class="black-text right center yellow accent-2 z-depth-1" id="rank">Rankings</label>
           
            <div class="col s3 light-blue white z-depth-1">
                        <table class="responsive-table centered bordered white" id="score">                          
                            <?php include './tables/brain_table_liveScore.php'; ?>
                        </table>
            </div>

            <div class="col s3">
                        <!---------------------FOr Moderate or Hard---------------------->
                        <ul class="responsive-table centered bordered" id="submit_mod">
                              <?php include './tables/brain_table_submitMod.php'; ?>
                        </ul>
                      
                        <!--------------------------FOr Hint-------------------------->
                        <ul class="responsive-table centered bordered" id="load_hint">
                              <?php include './tables/brain_table_hint.php'; ?>
                        </ul>

                        <!-----------------------Finish Ans------------------------>
                        <ul class="responsive-table centered bordered" id="finish_ans">
                              <?php include './tables/brain_table_FinishAns.php'; ?>
                        </ul>

                         <!-------------------------Quit Game---------------------->
                         <ul class="responsive-table centered bordered" id="quit_games">
                              <?php include './tables/brain_table_QuitGame.php'; ?>
                        </ul>

                        <!-------------------------Buzz---------------------------->
                        <ul class="responsive-table centered bordered" id="buzz">
                              <?php include './tables/brain_table_Buzz.php'; ?>
                        </ul>

                        <ul class="responsive-table centered bordered" id="buzz_results">
                              <?php include './tables/brain_table_BuzzStats.php'; ?>
                        </ul>
                        
            </div>
    </div>

  </div>
  
            <div id="modal_result" class="modal">
                  <div class="modal-content">
                        <ul class="collection with-header" id="emh_results">
                              <?php include './tables/brain_tables_EResult.php'; ?>
                        </ul>   
                  </div>
            </div>

            <div id="quit_game" class="modal">
              <div class="modal-content">
                <div class="row">
                        <div class="col s3 offset-s5 grid-example">
                        <i class="large glyphicon glyphicon-exclamation-sign red-text"></i>
                        </div>
                      <div class="col s12">
                        <h5 class="del_cat">Are you sure to Quit this game ?</b> </h5>
                 </div>                                                                                               
             </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="waves-effect waves-green btn blue right" id="quit_room">Agree</button>
                 <button type="button" class="modal-close waves-effect waves-green btn red left">Cancel</button>
              </div>
            </div>

            <!------------------------------------R_SUlt------------------------------------------------------------>
                  
                  <div id="r_sult" class="modal modal-fixed-footer">
                    <div class="modal-content">
                      <h4>Overall Results</h4>
                      <table class="bordered striped centered responsive-table" id="ovr_results">
                              <?php include './tables/brain_table_ovrR.php'; ?>
                      </table>
                    </div>
                  </div>

            <!---------------------------------------------------------------------------------------------->
  </div>
</div>

        <footer class="page-footer transparent" id="">
                <div class="footer-copyright cyan darken-2">
                      <div class="container center ">
                            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
                     </div>
                </div>
         </footer>


<?php include 'footer/footer_game.php'; ?>