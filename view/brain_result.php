<body>

  <div class="fixed-action-btn" style="top: 55px; left: 15px;">
    <a class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus">
      <i class="large glyphicon glyphicon-align-justify"></i>
    </a>
    <ul>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating purple waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class=" glyphicon glyphicon-edit"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating blue waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating yellow darken-3 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Achievements"><i class=" glyphicon glyphicon-star"></i></a></li>
      <li><a href="#modal3" class="btn-floating gray darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Options"><i class=" glyphicon glyphicon-cog"></i></a></li>
    </ul>
  </div>

  <?php if (isset($_SESSION['user'])) { ?>
  <div class="navbar-fixed">
  <nav class="fixed cyan darken-2" role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
            <a href="#" class="brand-logo "><!-- <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="65" class="brand-logo"> --> Brain Wave Quiz Master</a>          
      </div>
     
      
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#!" id="list">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" id="list">Logout</a></li>
      </ul>

       
          
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>

      
    </div>
  </nav> 
  </div>
 <?php } ?>
  <!-- <div class="parallax-container">
    <div class="parallax"><img src="./bootstrap/img/backgrounds/circles-abstract_.jpg"></div>
  </div> -->

  <div class="section white">
    <div class="row container">
        <div class="input-field col l3 right">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div>
       <h5 class=" header  white ">Player Game Results:</h5>
   
     
      <p class="grey-text text-darken-3 lighten-3">
            <table class="centered responsive-table bordered hoverable" id="tblData">
          <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name:</th>
                    <th>Rank:</th>
                    <th>Points:</th>
                    <th>No of Questions Answered:</th>
                    <th>Hint Used:</th>
                    <th>Penalties:</th>
                    <th>Overall Score:</th>
                    <th>Remarks:</th>
                </tr>
          </thead>

          <tbody>
                <tr>

                    <td><img alt="Brand" src="./bootstrap/img/backgrounds/yuna.jpg" id="logo-container" width="50" height="50" class="circle"></td>
                    <td>Maria</td>
                    <td>1</td>
                    <td>50</td>
                    <td>10/15</td>
                    <td>Yes</td>
                    <td>1</td>
                    <td>90</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td><img alt="Brand" src="./bootstrap/img/backgrounds/Alan.png" id="logo-container" width="50" height="50" class="circle"></td>
                    <td>Juan</td>
                    <td>2</td>
                    <td>45</td>
                    <td>9/15</td>
                    <td>No</td>
                    <td>3</td>
                    <td>87</td>
                    <td>Satisfactory</td>
                </tr>
                <tr>
                    <td><img alt="Brand" src="./bootstrap/img/backgrounds/alex.png" id="logo-container" width="50" height="50" class="circle"></td>
                    <td>Berto</td>
                    <td>3</td>
                    <td>38</td>
                    <td>6/15</td>
                    <td>Yes</td>
                    <td>5</td>
                    <td>80</td>
                    <td>Average</td>
                </tr>
                <tr>
                    <td><img alt="Brand" src="./bootstrap/img/backgrounds/alvin.png" id="logo-container" width="50" height="50" class="circle"></td>
                    <td>Carlos</td>
                    <td>4</td>
                    <td>29</td>
                    <td>3/15</td>
                    <td>Yes</td>
                    <td>6</td>
                    <td>78</td>
                    <td>Below Average</td>
                </tr>
          </tbody>
        </table>


      </p>

         <a href=".?action=exit" class="waves-effect waves-light btn right">Exit</a>
    </div>
   
  </div>

  <div class="parallax-container">
 
   <!--  <div class="parallax"><img src="./bootstrap/img/backgrounds/mosaic-abstract-wallpaper.jpg"></div> -->
   <div class="parallax"><img src=" ./bootstrap/img/backgrounds/Brainwave Quiz Master.png"></div>
  </div>


 <!--  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>

  </footer> -->

  <div id="modal2" class="modal modal-fixed-footer">

    <div class="modal-content ">
      <h4>Create Room</h4>
      <div class="row">
    <form class="col s12" action="." method="post">
       <input type="hidden" name="action" value="brain_addRoom">
      <div class="row">
        <div class="input-field col s12">
          <input  id="num" value="<?= rand(10000,99999)?>" name="rid" type="number" readonly >
          <label for="num"> Room Number:</label>
        </div>
       
      </div>
       <div class="row">
           <div class="input-field col s12">
            <select name="category" required>
            <option disabled >Choose your Subject:</option>
             <?php foreach ($category as $row) { ?>
              <option value="<?= $row->getCategory(); ?>" >
                    <?= $row->getCategory(); ?>
              </option>
              <?php } ?>
            </select>
            <label>Select Subject:</label>
          </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="players" name="players" type="number" length="3" class="validate" required>
          <label for="players"  data-error="Overlaps">Number of Players:</label>
        </div>
      </div>
     
    
   
    </div>

    </div>


    <div class="modal-footer">
    
      <button class="modal-action waves-effect waves-green btn-flat" type="Submit">Submit</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
 </form>
  </div>

  <table>
        <thead>
            <tr>
                <td><input type="checkbox" name="select-all" id="select-all" /></td>
                <td style="text-align: left">Name</td>
                <td style="text-align: left">Created By</td>
                <td style="text-align: left">Created Date</td>
            </tr>
        </thead>
        <tbody>
                <tr class="post">
                    <td><p><input Length="0" name="314" type="checkbox" value="true" /><input name="314" type="hidden" value="false" /></p></td>
                    <td>Window</td>
                    <td>John</td>
                    <td>01/01/2014 12:00:00 AM</td>
                </tr>
                <tr class="post">
                    <td><p><input Length="0" name="314" type="checkbox" value="true" /><input name="314" type="hidden" value="false" /></p></td>
                    <td>Door</td>
                    <td>Chris</td>
                    <td>01/01/2014 12:00:00 AM</td>
                </tr>
                <tr class="post">
                    <td><p><input Length="0" name="314" type="checkbox" value="true" /><input name="314" type="hidden" value="false" /></p></td>
                    <td>Floor</td>
                    <td>Michael</td>
                    <td>01/01/2014 12:00:00 AM</td>
                </tr>
                <tr class="post">
                    <td><p><input Length="0" name="314" type="checkbox" value="true" /><input name="314" type="hidden" value="false" /></p></td>
                    <td>Car</td>
                    <td>James</td>
                    <td>01/01/2014 12:00:00 AM</td>
                </tr>
                <tr class="post">
                    <td><p><input Length="0" name="314" type="checkbox" value="true" /><input name="314" type="hidden" value="false" /></p></td>
                    <td>Bike</td>
                    <td>Steven</td>
                    <td>01/01/2014 12:00:00 AM</td>
                </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        $(function() {
          $(selector).pagination({
              items: 100,
              itemsOnPage: 10,
              cssStyle: 'light-theme'
          });
      });
    </script>
