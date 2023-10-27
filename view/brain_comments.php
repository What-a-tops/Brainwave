 <?php require 'header/header.php'; ?>
<body>
  
  <div class="fixed-action-btn" id="btn-mnu-float">
    <button id="back_com" class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Back To Room List">Back</button>
  </div>

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

      <div class="section" id="cl">

              <div class="row container">
            
                  <div class="white-text teal col l3 left z-depth-2" id="list_users">
                      <span class="flow-text">Feedback List</span>
                  </div>


                  <div class="col s12 m4 l9 right">
                      <button id="comm_modal" class="waves-effect waves-light btn right">Click to Comment</button>
                  </div>

                  <div class="col s12 m4 l12 traparent" id="ubs">
                       <table class="centered responsive-table white z-depth-2" id="comm">
                         <?php include './tables/brain_table_Comments.php';  ?>
                      </table>
                  </div>
                    
              </div>
            </div>



             <div id="coompo" class="modal">
                <div class="modal-content"> 
                  <h4>Leave a Comment</h4>
                       <form>
                        <div class="row">
                          <div class="input-field s12 m4 l12">
                            <i class="glyphicon glyphicon-comment prefix"></i>
                            <textarea type="text" id="coom" class="materialize-textarea"></textarea>
                            <label for="coom">Comment Here...</label>
                          </div>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button id="comm_button" class="modal-action waves-effect waves-green btn-flat">Submit</button>
                  <button class="modal-action modal-close waves-effect waves-red btn-flat">Close</button>
                </div>
              </div>

    <div class="parallax-container" id="cl"></div>

         <footer class="page-footer" id="cl">
                <div class="footer-copyright cyan darken-2">
                      <div class="container center ">
                            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
                     </div>
                </div>
         </footer>

<?php include 'footer/footer_comms.php'; ?>
















































