 <?php require 'header/header.php'; ?>
<body id="main">
    <?php if (isset($_SESSION['user'])) { ?>

    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
       <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" id="list" >Logout</a></li>
    </ul>
    <div class="navbar-fixed">
        <nav class="teal darken-3 fixed">
        <div class="nav-wrapper ">
           <div class="container">
                <div class="col l3">
                       <a href="#" class="brand-logo white-text flow-text"> Brain Wave Quiz Master</a>
                </div>       
           </div>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" href="#!" data-beloworigin="true" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?></a></li>
          </ul>
        </div>
      </nav>
  </div>
  <?php } ?>
  
    <div class="row" id="bord">
      <div class="col s12 m4 l2  z-depth-2">
              <div class="logo">
                    <a href="#" class="brand-logo"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
              </div>
                 <div class="white-text  center teal z-depth-2" id="mion"><span class="flow-text"></span>MENUS</div>
                   <ul class="collapsible teal" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header z-depth-2 active"><i class="tiny mdi mdi-more"></i> CATEGORY </div>
                      <div class="collapsible-body teal darken-3">
                             <ul class="left-align">
                                <li id="list2"><a href="#!" class="center waves-effect waves-light btn-flat transparent modal-trigger white-text" ><i class="left mdi mdi-layers" id="mn_cat"></i> Category List</a></li>
                                <li class="divider"></li>
                                <li id="list2"><a href=" ?action=View_brain_Question&dup=''&quest=''" class="center waves-effect waves-light btn-flat transparent white-text"><i class="left glyphicon glyphicon-question-sign" id="mn_cat"></i> View Question</a></li>
                             </ul>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header z-depth-2" ><i class="tiny mdi mdi-account-box"></i> USERS </div>
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

                    <div class="col s12 m4 l10" >          
                      
                               <div class="white-text teal col s12 m8 l6 center z-depth-2" id="list_users"><span class="flow-text" id="h_list">Category List</span></div>
                                 <div class="col s12 m4 l12">
                                     
                                                     <form id="submit_Cat">
                                                        <input type="hidden" name="action" value="add_category">
                                                        <div class="input-field col s12 m8 l3">
                                                            <input id="category" type="text" name="category" autofocus>
                                                          <label for="category">Add Category:</label>
                                                           <div id="message"></div>
                                                        </div>
                                                          <div class="input-field col s12 m8 l3">
                                                            <button class="waves-effect waves-light btn" type="Submit">Add</button>
                                                          </div>
                                                    </form> 
                                            
                                                    <div class="input-field col s12 m8 l3 offset-l2">
                                                          <i class=" icon-search circle prefix"></i>
                                                          <input id="search"  type="search" class="validate">
                                                          <label for="search">Search Here...</label>
                                                    </div>
                                                   
                                  <div class="section white z-depth-2">
                                  <div class=" row ">
                                           
                                            <div class="col s12 m8 l12">
                                                   <table class="responsive-table striped centered bordered" id="tblData">                                
                                                        <?php include './tables/brain_table_AdminCategory.php'; ?>                                                  
                                                  </table>
                                            </div>
                                                 
                                  </div>
                               

                              </div>    
                              

                          </div>    
                          
                        </div>

    </div>

        <footer class="page-footer" id="main">
                <div class="footer-copyright">
                      <div class="container center ">
                            <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b>  © 2015 BRAINWAVE QUIZ MASTER</b></label>
                     </div>
                </div>
         </footer>

                 <!-------------------View Account------------------------------------>
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

          
  <?php require 'footer/footer_admin.php'; ?>

   
         
    
  





