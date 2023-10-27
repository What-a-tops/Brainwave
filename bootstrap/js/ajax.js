$(document).ready(function () {
		  delete_Cat();
  		mod_cat();
      view_quest_e();
      view_quest_MH();
      add_quest();
      update_accountss();
      $('#srt').hide();
      $('#load_load').hide();
      $('#submit_log').submit(function (e){
          var username = $('#user').val(); 
          var password = $('#pass').val(); 
          $.post('.?action=verify_logs',{user:username,pass:password},function (verified_login) {
                      $('#verified_login').html(verified_login);
                      if ($('#invalid').val() == 'invalid') {
                          $('#load_load').hide();
                          Materialize.toast('Invalid! Username or Password', 3000, 'rounded');
                           $('#user').val('').focus();
                           $('#pass').val(''); 
                      }else{
                          $('#load_load').show();
                          mod_lod(username,password);
                      }
          });
        e.preventDefault();
    });
    function mod_lod(username,password){
       var count =  3; 
       var counter1 = setInterval(timer1, 1000);
                          function timer1()
                          {
                           $('#timer_login').html(count);
                            if (count <= 0) {
                                  clearInterval(counter1);
                                  $('#load_load').hide();
                                  window.location.href = '.?action=brain_login&user='+username+'&pass='+password;
                            }
                              count--;
                          }
    }

         $('.modal_reg').on('click',function() {
                  $('#modal_reg').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
        });

        $('#check_username').on('click',function() {
              var uname = $('#uname').val();
              if ($('#uname').val() == '') {
                    $('#aw').html('Please Enter Your Username..');
              }else{
                $('#aw').hide();
                $.post('.?action=getQuestion', {user:uname}, function (forgot_log) {
                     $('#forgot_log').html(forgot_log);
                     if ($('#sq').val() != 'warai') {
                          $('#srt').fadeIn("slow");
                          $('#ans').focus();
                          $('#passWord_forgot').hide();
                          aw();
                     }
                });
              }
        });
        function aw(){
             $('#check_password').on('click',function() {
              if ($('#ans').val().toUpperCase() == $('#sa').val().toUpperCase()) {
                    $('#aw3').hide();  
                      count();
              }else{
                   $('#aw3').html('Invalid!!');

              }
            });
        }
       function count(){
           var count = 7;
                    var counter = setInterval(timer, 1000);
                    function timer()
                    {
                         $('#timer_wow').html(count);
                        $('#passWord_forgot').show();
                      if (count <= 0) {
                          clearInterval(counter);
                           $('#aw').hide();
                           $('#srt').hide();
                           $('#passWord_forgot').hide();
                           $('#uname').val('');
                           $('#ans').val('');
                           $('#user').focus();
                          
                          $("#modal_forgot").closeModal();
                      }
                        count--;
                    }
       }


        $('#reg').submit(function (i) {
            if ($.isNumeric($('#first_name').val())) {
                 var valid = 'Invalid';
            }else if ($('#age').val() <= 5 || $('#age').val() >= 50) {
                var valid = 'Invalid age input';
                $('#l4').html(valid);
            }else if ($('#Description').val() == 'weak') {
                var valid = 'Weak Password';
                $('#l4').html(valid);
            }else{
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        url: '.?action=add_user',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('#modal_reg').closeModal();                        
                             $('#acc_name').val('');
                             $('#last_name').val('');
                             $('#first_name').val('');
                             $('#middle_name').val('');
                             $('#age').val(''); 
                             $('#address').val(''); 
                             $('#username').val(''); 
                             $('#pass').val('');
                             $('#contact').val('');
                             $('#secret_quest').val('');
                             $('#secret_answer').val('');
                             $("#outputs").attr("src", './pics/unk.png');
                              Materialize.toast('Success! New Account Created...', 5000, 'rounded');
                        }
                      });
                      return false;
            }
         i.preventDefault();
        });
        
        function update_accountss(){
                $('#update_Accounts').submit(function (u) {
                      if ($.isNumeric($('#first_name').val())) {
                           var valid = 'Invalid';
                      }else if ($('#age').val() <= 5 || $('#age').val() >= 50) {
                          var valid = 'Invalid age Input';
                          $('#l4').html(valid);
                      }else if ($('#Description').val() == 'weak') {
                          var valid = 'Weak Password';
                          $('#l4').html(valid);
                      }else{
                               var formData = new FormData($(this)[0]);
                                $.ajax({
                                  url: '.?action=brain_UpdateUser',
                                  type: 'POST',
                                  data: formData,
                                  contentType: false,
                                  processData: false,
                                  success: function (update_accounts) {
                                      $('#update_accounts').html(update_accounts);
                                      // update_accountss();
                                        Materialize.toast('Success! Account Updated...', 5000, 'rounded');
                                  }
                                });
                                return false;
                      }

                   u.preventDefault();
                });
        }
         
    	$('#submit_Cat').submit(function (e) {
            if ($('#category').val() == '') {
                 Materialize.toast('Invalid! Input first', 3000, 'rounded');
            }else{
                $.post('.?action=add_category', $(this).serialize(), function (category) {
                    Materialize.toast('Category Added', 3000, 'rounded');
                    $('.responsive-table').html(category);
                    $('#category').val('');
                    delete_Cat();
                    mod_cat();
                });
            }
    	 e.preventDefault();
    	});

      function delete_Cat(){
        $('.delete').on('click', function (e){
           var cid = $(this).data('param1');
           $.post('.?action=brain_Delete_cat',{cid:cid},function (category) {
                     Materialize.toast('Category Deleted', 3000, 'rounded');
            $('#yu' + cid).hide();
           });
            e.preventDefault();
        });

      }

    	$('#update_Cat').submit(function (e) {
    		$.post('.?action=brain_update_Category',$(this).serialize(), function (category) {
                 Materialize.toast('Category Updated', 3000, 'rounded');
    			$('.responsive-table').html(category);
    			delete_Cat();
          mod_cat();
    		})
    		 e.preventDefault();
    	});

    	function mod_cat(){
    		$('.mod').on('click',function() {
    			$val1 = $(this).data('param1');
    			$val2 = $(this).data('param2');
    			$('input[name=cat_nam]').val($val2).focus();
    			$('input[name=cid]').val($val1);

	              $('#modal_edit1').openModal({
	                dismissible: true, 
	                opacity: .5,
	                in_duration: 600,
	                out_duration: 600
	              });
       		});
    	}

        function add_quest(){
            $('.add_quest').on('click',function() {
                  $('#modal_addQuest').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
            });
        }


    	


    	delete_Question();
    	$('#submit_question').submit(function (e) {
            var valid = '(Required)';
            if ($('#easy_q').val() == '' || $('input[name=correct]').val() == '' || $('input[name=choiceB]').val() == '' || $('input[name=choiceC]').val() == '' ||  $('input[name=choiceD]').val() == '' ||  $('input[name=hint]').val() == '') {
                $('#ques').html(valid);
                $('#cor').html(valid);
                $('#ch1').html(valid);
                $('#ch2').html(valid);
                $('#ch3').html(valid);
                $('#hun').html(valid);
           
            }else{
                var formData = new FormData($(this)[0]);
 
                      $.ajax({
                        url: '.?action=brain_add_Question',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('.aww').html(question);
                             $('#modal_addQuest').closeModal();
                             Materialize.toast('Question Added', 3000, 'rounded');
                                //------------Easy------------//
                                $('#easy_q').val('');
                                $('input[name=correct]').val('');
                                $('input[name=choiceB]').val('');
                                $('input[name=choiceD]').val('');
                                $('input[name=choiceC]').val('');
                                $('input[name=hint]').val('');
                                 $("#add_quest").attr("src", './pics/question.png');
                                $('#easy_q').focus();
                                //---------------------------//

                                delete_Question();
                                view_quest_e();
                                view_quest_MH();
                        }
                      });
                      return false;

            }
    	 e.preventDefault();
    	});

  
    	$('#submit_question_mod').submit(function (e) {
            var valid = '(Required)';
             if ($('#mod_q').val() == '' || $('#ans_m').val() == '' || $('#hint_m').val() == '') {
                $('#mok').html(valid);
                $('#ant').html(valid);
                $('#hi').html(valid);
            }else {

                  var formData = new FormData($(this)[0]);

                      $.ajax({
                        url: '.?action=brain_add_Question',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('.aww').html(question);
                             $('#modal_addQuest').closeModal();
                             Materialize.toast('Question Added', 3000, 'rounded');
                                //------------Mod------------//
                                $('select[name=subject]').val('selected');
                                $('#mod_q').val('');
                                $('#ans_m').val('');
                                $('#hint_m').val('');
                                $('#mod_q').focus();
                                 $("#add_quest1").attr("src", './pics/question.png');
                                //---------------------------//

                                delete_Question();
                                view_quest_e();
                                view_quest_MH();
                        }
                      });
                      return false;
            }
    		
    	 e.preventDefault();
    	});

    	$('#submit_question_hard').submit(function (e) {
        var valid = '(Required)';
             if ($('#hard_q').val() == '' || $('#a_h').val() == '' || $('#hj').val() == '') {
                $('#p').html(valid);
                $('#k').html(valid);
                $('#i').html(valid);
            }else {
                     var formData = new FormData($(this)[0]);
                      $.ajax({
                        url: '.?action=brain_add_Question',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('.aww').html(question);
                             $('#modal_addQuest').closeModal();
                             Materialize.toast('Question Added', 3000, 'rounded');
                                //------------Hard------------//
                                $('select[name=subject]').val('selected');
                                $('#hard_q').val('');
                                $('#a_h').val('');
                                $('#hj').val('');
                                $('#hard_q').focus();
                                $("#add_quest2").attr("src", './pics/question.png');
                                //---------------------------//
                                delete_Question();
                                view_quest_e();
                                view_quest_MH();
                        }
                      });
                      return false;
             }
    	 e.preventDefault();
    	});

        function delete_Question(){
        $('.delete_question').on('click', function (e){
           var qid = $(this).data('param1');
           $.post('.?action=brain_DeleteQuestion',{qid:qid},function (question) {
                     Materialize.toast('Question Deleted', 3000, 'rounded');
            $('#yu' + qid).hide();
                     // add_quest();
           });
            e.preventDefault();
        });

      }

        function view_quest_e(){
            $('.mod_quest_easy').on('click',function() {
                $acc_path = $(this).data('param');
                $question = $(this).data('param1');
                $subject = $(this).data('param2');
                $correct = $(this).data('param3');
                $choiceB = $(this).data('param4');
                $choiceC = $(this).data('param5');
                $choiceD = $(this).data('param6');
                $hint = $(this).data('param7');
                $bid = $(this).data('param8');
                $lvl = $(this).data('param9');

                if ($acc_path == '') {
                   $("#outputQuest_e").attr("src", './pics/question.png');
                }else{
                   $("#outputQuest_e").attr("src", $acc_path);
                }
                $('input[name=question_e]').val($question);
                $('input[name=subject_e]').val($subject);
                $('input[name=correct_e]').val($correct);
                $('input[name=choiceB_e]').val($choiceB);
                $('input[name=choiceC_e]').val($choiceC);
                $('input[name=choiceD_e]').val($choiceD);
                $('input[name=hint_e]').val($hint);
                $('input[name=bid_e]').val($bid);
                // $('input[name=cid]').val($val1);

                  $('#modal_edit2').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
            });
        }

        function view_quest_MH(){
            $('.mod_quest_MH').on('click',function() {
                $acc_path = $(this).data('param');
                $question = $(this).data('param1');
                $subject = $(this).data('param2');
                $answer = $(this).data('param3');
                $hint = $(this).data('param4');
                $bid = $(this).data('param5');
                $lvl = $(this).data('param6');

                if ($acc_path == '') {
                   $("#outputQuest_mh").attr("src", './pics/question.png');
                }else{
                   $("#outputQuest_mh").attr("src", $acc_path);
                }
                
                $('input[name=subject_mh]').val($subject);
                $('input[name=question_mh]').val($question);
                $('input[name=answers_mh]').val($answer);
                $('input[name=hints_mh]').val($hint);
                $('input[name=bid]').val($bid);
                $('input[name=level]').val($lvl);
                // $('input[name=cid]').val($val1);

                  $('#modal_edit3').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
            });
        }

        $('#update_quest').submit(function (e) {
             var valid = '(Required)';
            if ($('input[name=question_e]').val() == '' || $('input[name=subject_e]').val() == '' || $('input[name=correct_e]').val() == '' || $('input[name=choiceB_e]').val() == '' ||  $('input[name=choiceC_e]').val() == '' ||  $('input[name=choiceD_e]').val() == '' || $('input[name=hint_e]').val == '') {
                        $('#a1').html(valid);
                        $('#a2').html(valid);
                        $('#a3').html(valid);
                        $('#a4').html(valid);
                        $('#a5').html(valid);
                        $('#a6').html(valid);
                        $('#a7').html(valid);
            }else{

                     var formData = new FormData($(this)[0]);
                     $.ajax({
                        url: '.?action=brain_update_Question',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('.aww').html(question);
                             $('#modal_edit2').closeModal();
                            Materialize.toast('Question Updated', 3000, 'rounded');
                                //------------Easy------------//
                                $('.responsive-table').html(question);
                                $('input[name=question_e]').val('');
                                $('input[name=subject_e]').val('');
                                $('input[name=correct]').val('');
                                $('input[name=choiceB]').val('');
                                $('input[name=choiceC]').val('');
                                $('input[name=choiceD]').val('');
                                $('input[name=hint_e]').val('');
                                 view_quest_e();
                                 view_quest_MH();
                                 delete_Question();
                                 add_quest();
                        }
                      });
                      return false;
            }
             e.preventDefault();

        });

         $('#update_quest_mh').submit(function (e) {
             var valid = '(Required)';
            if ($('input[name=question_mh]').val() == '' || $('input[name=subject_mh]').val() == '' || $('input[name=answer_mh]').val() == '' || $('input[name=hint_mh]').val() == '') {
                        $('#b1').html(valid);
                        $('#b2').html(valid);
                        $('#b3').html(valid);
                        $('#b4').html(valid);
    
            }else{

                     var formData = new FormData($(this)[0]);
                     $.ajax({
                        url: '.?action=brain_update_Question',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (question) {
                             $('.aww').html(question);
                             $('#modal_edit3').closeModal();
                                   Materialize.toast('Question Updated', 3000, 'rounded');
                                    $('.responsive-table').html(question);
                                    view_quest_e();
                                    view_quest_MH();
                                    delete_Question();
                                    add_quest();
                                    }
                      });
                      return false;

            }
             e.preventDefault();
        });

        $('#create_room').submit(function (j) {
              var user_id = $('#user_id').val();
              var room_num= $('#room_num').val();
              var players = $('#players').val();
              var category =  $('#categorys').val();
              var num_pl = $('#num_pl').val();

              if (players < 2 || players > 10) {
                var message = 'Invalid! More than 2 or less than 11 Players to Play this game.';
                $('#overlaps').html(message);
              }else if(num_pl != 5){
                var message = 'Invalid! More than 5 or less than 11 to add Questions to Play this game.';
                $('#overlaps1').html(message);
              }else if(category == 'Random' || category == 'Math' || category == 'Science' || category == 'History' || category == 'Filipino' || category == 'English'){
                // var message = 'Invalid! Select Category.';
                // $('#selc').html(message);
                // alert(category);
                 window.location.href = '.?action=brain_addRoom&players='+players+'&user_id='+user_id+'&room_num='+room_num+'&category='+category+'&num_pl='+num_pl;
              }else{
                 // window.location.href = '.?action=brain_addRoom&players='+players+'&user_id='+user_id+'&room_num='+room_num+'&category='+category+'&num_pl='+num_pl;
                 var message = 'Invalid! Select Category.';
                $('#selc').html(message);
              }
              j.preventDefault();
        });


         var user_id = $('#user_id').val();
        $('#comments').on('click',function (c) {
          var user_id = $('#user_id').val();
                    window.location.href = '.?action=brain_comments&user_id='+user_id;
              c.preventDefault();
          });

        $('#back_com').on('click',function () {
          var user_id = $('#user_id').val();
                    window.location.href = '.?action=brain_Player&user_id='+user_id;
              c.preventDefault();
          });

         var user_id = $('#user_id').val();
        $('#update_client').on('click',function (c) {
          var user_id = $('#user_id').val();
                    window.location.href = '.?action=brain_update_Client&user_id='+user_id;
              c.preventDefault();
          });
});