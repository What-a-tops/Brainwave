                         
                <?php $getQuestion = $brain_UserDB->getQuestion_Forgot($_SESSION['user']); ?>

                <input type="hidden" id="sa" value="<?= $getQuestion->getSecret_Answer();  ?>">
                <input type="hidden" id="pass" value="<?= $getQuestion->getPassword();  ?>" readonly>

                <i class="glyphicon glyphicon-question-sign prefix"></i>
                <input type="text" id="sq" value="<?= $getQuestion->getSecret_Quest();  ?>" readonly>
               
                       <div class="input-field" id="aw_pass">
                            <i class="glyphicon glyphicon-briefcase prefix"></i>
                            <input id="ans" type="text" required>
                            <label for="ans">Enter Your Answer:</label>

                       </div>
                           <button id="check_password" class="right waves-effect waves-blue btn tooltipped" data-position="right" data-delay="50" data-tooltip="Check Password">
                           <i class="mdi mdi-checkbox-marked-circle"></i>
                          </button>
            <p id="aw3"></p>

                <div id="passWord_forgot" class="input-field">
                     <i class="glyphicon glyphicon-question-sign prefix"></i>
                    <input type="text" id="sq" value="<?= $getQuestion->getPassword();  ?>" readonly>
                    <label for="sq">Your Password is:</label>
                </div>
                <!-- <p id="timer_wow"></p>
 -->
                
               

                         