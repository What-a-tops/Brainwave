$(document).ready(function() {
  $("#my_audio_game").get(0).play();
  $('#my_audio_game').prop("volume", 0.3);
  Materialize.toast('Game Start!', 3000, 'rounded');
  $('#sub').html('Easy Mode');
  $('#icon1').hide();
  $('#icon2').hide();
  $('#icon3').hide();
  $('#icon4').hide();
  $('#us_hints').hide();
  var room_id = $('#room_num').val();
  var parent = $("#shuffle");
  var page1 = 0;
  var divs = parent.children();
  while (divs.length) {
      parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
  } 
  load_gam1(page1,room_id);  
  ans_easy();
  hints();
});

function loader(page,room_id){
    var room_id = $('#room_id').val();
    var rid = room_id;
    var lvl = 'Easy';     
    var user_id = $('#user_id').val();

    $.post('.?action=load_hint', {room_id:rid,user_id:user_id}, function (load_hint){
              $('#load_hint').html(load_hint);
              if ($('#hintooo').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
              }
    });

        $.post('.?action=brain_loadGame&page='+page,{room_id:rid,lvl:lvl,user_id:user_id},function (load_game) {
             $('#data').html(load_game);
             $('#icon1').hide();
             $('#icon2').hide();
             $('#icon3').hide();
             $('#icon4').hide();
             $('#us_hints').hide();
           
              var parent = $("#shuffle");
              var divs = parent.children();
              while (divs.length) {
                  parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
              } 
             ans_easy();
          });
}

//--------------------------------------------------score easy --------------------------------------------//
function liv_score(score,answer,question_id){
                  var lvl = 'Easy';    
                  var user_id = $('#user_id').val();
                  var room_id = $('#room_id').val();
                  var qid = $('#qid').val();
                  $.post('.?action=brain_liveScore',{score:score,user_id:user_id,room_id:room_id,lvl:lvl,answer:answer,question_id:question_id,qid:qid}, function (score1) {
                    document.getElementById("correct").disabled = true;
                    document.getElementById("btn_ans2").disabled = true;
                    document.getElementById("btn_ans3").disabled = true;
                    document.getElementById("btn_ans4").disabled = true;
                    document.getElementById("btn_hint").disabled = true;
                    document.getElementById("ans").disabled = true;
                    document.getElementById("btn_hint").disabled = true;
                 });
}
//------------------------------------------Ans easy-------------------- --------------------------------//
function ans_easy(){
  document.getElementById("ans").disabled = true;
  var score = 0;
  var answer = '';
  $('#correct').one('click', function() {
       document.getElementById("ans").disabled = false;
       score = 1;
       answer = 'correct';
  });
  $('#btn_ans2').one('click', function() {
       document.getElementById("ans").disabled = false;
       score = 0;
       answer = 'wrong'; 
  });
  $('#btn_ans3').one('click', function() {
       document.getElementById("ans").disabled = false;
       score = 0;
       answer = 'wrong'; 
  });
  $('#btn_ans4').one('click', function() {
       document.getElementById("ans").disabled = false;
       score = 0;
       answer = 'wrong'; 
  });

  $('.scor').one('click', function (){
        var question_id = $(this).data('param');
        liv_score(score,answer,question_id);
  });
}
//------------------------------------------Ans easy --------------------------------//
function load_gam1(page1,room_id){
  var rid = room_id;
  if (page1 == 0) {
    var page = 1;
  }else{
    var page = page1; 
  }

  var count = 30;
  var counter = setInterval(timer, 1000);
  function timer()
  {
      $('#timer').html(count);
      if ($('#hintooo').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
      }
      hints();
      var room_id = $('#room_id').val();
      var user_id = $('#user_id').val();
      var qids = $('#qids').val();
      $.post('.?action=load_ans&lvl=Easy',{room_id:rid,qid:qids,user_id:user_id}, function (ans){
            $('#finish_ans').html(ans);
      });

      var room_id = $('#room_id').val();
      var user_id = $('#user_id').val();
      $.post('.?action=load_Quit',{room_id:rid,user_id:user_id}, function (quit_games){
            $('#quit_games').html(quit_games);
            var quit = $('#quit').val();
            var fname = $('#fname').val();
            if (quit == 'Quit') {
                 Materialize.toast('Player left the game...', 3000, 'rounded');
            }
      });

      // var room_id = $('#room_id').val();
      // var lvl = $('#lvl').val();
      // var user_id = $('#user_id').val();
      // $.post('.?action=load_liveScore_stats',{room_id:room_id,lvl:lvl,user_id:user_id}, function (score1) {
      //         $('#score').html(score1);
      // }); 

     
      if ($('#total_plays').val() == $('#ans_stats').val() || count <= 0) {
                  clearInterval(counter);
                  $('#hints_gam').closeModal();
                  
                  $.post('.?action=delMovs',{room_id,rid}, function (movs) {
                       $('#finish_ans').html(movs);
                  });
                
                  var lvl = 'Easy';    
                  $.post('.?action=load_liveScore',{room_id:rid,lvl:lvl}, function (score1) {
                        $('#score').html(score1);
                   });  

                  if ($('#e_finalStarts').val() == 'correct') {
                       $("#my_audio_correct").get(0).play();
                  }else{
                        $("#my_audio_wrong").get(0).play();
                  }   
                

                  var counts = 6;
                  var counters = setInterval(function() {
                           counts--;
                           $('#timers').html(counts);
                           $('#icon1').fadeIn("slow");
                           $('#icon2').fadeIn("slow");
                           $('#icon3').fadeIn("slow");
                           $('#icon4').fadeIn("slow");

                          document.getElementById("correct").disabled = true;
                          document.getElementById("btn_ans2").disabled = true;
                          document.getElementById("btn_ans3").disabled = true;
                          document.getElementById("btn_ans4").disabled = true;
                          document.getElementById("btn_hint").disabled = true;
                          document.getElementById("ans").disabled = true;

                
                          if (counts <= 0 ) {
                              clearInterval(counters);
                                   page += 1;
                              if (page == 6) {
                                  load_result();
                                  clearInterval(counter);
                              }else{
                                 $(':button.but_ans').off('click');
                                 loader(page,room_id);
                                 page1 = page;
                                 load_gam1(page1,room_id);
                              }
                          }
                    }, 1000);
          count = 31;
      }
  count--;     
     
  }
}

//--------------------------------------------------Moderate----------------------------------------------------------------------------------//
function startGame_moderate(){
      $("#my_audio_game").get(0).play();
      $('#my_audio_game').prop("volume", 0.3);
      $('#sub').html('Moderate Mode');
      var room_id = $('#room_id').val();
      var lvl = 'Moderate';
      var user_id = $('#user_id').val();
      var page1 = 0;
      var page = 1;

      $.post('.?action=load_liveScore',{room_id:room_id,lvl:lvl}, function (score1) {
              $('#score').html(score1);
              $('#us_hints').hide();
      });

      $.post('.?action=brain_loadGame_MH&page='+page,{room_id:room_id,lvl:lvl,user_id:user_id},function (load_game) {
              $('#data').html(load_game);
              $('#us_hints').hide();
              $('#iconM1').hide();
              $('#iconM2').hide();
              $('#mod_ML').hide();
              document.getElementById("ans_mod").disabled = true;

              $('#answer_mod').keyup(function(){
                  if($(this).val != ''){
                      document.getElementById("ans_mod").disabled = false;
                  }
              });

              liv_scoreMod(score);
              // hints();
      });
      load_gam2(page1);
}
//--------------------------------------------------score mod --------------------------------------------//
function liv_scoreMod(score){
             $('.scorMod').one('click', function (e){
                var answer_mod = $('#answer_mod').val().toUpperCase();
                var mod_ans = $('#mod_ans').val().toUpperCase();
                            if (answer_mod == mod_ans) {
                                 score = 1;
                                 var answer = 'correct';
                            }else if (answer_mod == ''){
                                 score = 0;
                                 var answer = 'wrong';
                            }else{
                                  score = 0;
                                  var answer = 'wrong';
                            }

                  var lvl = 'Moderate';
                  var user_id = $('#user_id').val();
                  var room_id = $('#room_id').val();
                  var question_id = $(this).data('param');
                  
                  $.post('.?action=brain_liveScore',{score:score,user_id:user_id,room_id:room_id,lvl:lvl,answer:answer,question_id:question_id}, function (score1) {
                    document.getElementById("ans_mod").disabled = true;
                    document.getElementById("answer_mod").disabled = true;
                    document.getElementById("btn_hint").disabled = true;
                    // $('#us_hints').hide();
                 });
              e.preventDefault();
             });
}
//----------------------------------------------------------------------------------------------------------------------//
function load_gam2(page1){
  if (page1 == 0) {
      var page = 1;
  }else{
    var page = page1;
  }
  var count = 20;
  var counter = setInterval(timer, 1000);
  function timer()
  {
     $('#timer').html(count);
    //---------------------------------------Moderate Limit--------------------------------------------------//
      if ($('#hintooo').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
      } 
       hints();
      var room_id = $('#room_id').val();
      var user_id = $('#user_id').val();
      var qids = $('#qids').val();
      $.post('.?action=load_ans&lvl=Moderate',{room_id:room_id,qid:qids,user_id:user_id}, function (ans){
            $('#finish_ans').html(ans);
      });
      
      $.post('.?action=load_Quit',{room_id:room_id,user_id:user_id}, function (quit_games){
            $('#quit_games').html(quit_games);
            var quit = $('#quit').val();
            var fname = $('#fname').val();
            if (quit == 'Quit') {
                 Materialize.toast('Player left the game...', 3000, 'rounded');
            }
           
      });
        
      if ($('#total_plays').val() == $('#ans_stats').val() || count <= 0) {
                var room_id = $('#room_id').val();
                $.post('.?action=delMovs',{room_id,room_id}, function (movs) {
                       $('#finish_ans').html(movs);
                });
                clearInterval(counter);
                 var lvl = $('#lvl').val();
                 $('#hints_gam').closeModal();
                  $.post('.?action=load_liveScore',{room_id:room_id,lvl:lvl}, function (score1) {
                        $('#score').html(score1);
                        $('#us_hints').hide();
                        $('#iconM1').hide();
                        $('#iconM2').hide();
                  });
                  var answer_mod = $('#answer_mod').val().toUpperCase();
                  var mod_ans = $('#mod_ans').val().toUpperCase();

                  if (mod_ans == answer_mod) {
                      $("#my_audio_correct").get(0).play();
                  }else{
                      $("#my_audio_wrong").get(0).play();
                  }

                           var counts = 6;
                           var counters = setInterval(function() {
                            counts--;
                          
                           
                            if (mod_ans == answer_mod) {
                                $('#iconM1').fadeIn("slow");
                            }else if (answer_mod == ''){
                                $('#iconM2').fadeIn("slow");
                               
                            }else{
                                $('#iconM2').fadeIn("slow");
                            }
                          $('#mod_ML').fadeIn("slow");
                          document.getElementById("ans_mod").disabled = true;
                          document.getElementById("answer_mod").disabled = true;
                          document.getElementById("btn_hint").disabled = true;
                          
                          if (counts <= 0 ) {
                             clearInterval(counters);
                              page += 1;
                              if (page == 6) {
                                  load_result();
                                  clearInterval(counter);
                              }else{
                                 loader_MH(page);
                                 page1 = page;
                                 load_gam2(page1);
                              }
                          }
                    }, 1000);
          count = 21;
       }
      count--;
  }
}

//-------------------------------------------------------------------------------------------------------------------//
function loader_MH(page){

    var room_id = $('#room_id').val();
    var lvl = $('#lvl').val();
    var user_id = $('#user_id').val();

    $.post('.?action=load_hint', {room_id:room_id,user_id:user_id}, function (load_hint){
              $('#load_hint').html(load_hint);
              if ($('#hintooo').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
              }
    });

        $.post('.?action=brain_loadGame_MH&page='+page,{user_id:user_id,room_id:room_id,lvl:lvl},function (load_game) {
            $('#data').html(load_game);
              $('#us_hints').hide();
              $('#iconM1').hide();
              $('#iconM2').hide();
              $('#mod_ML').hide();
              document.getElementById("ans_mod").disabled = true;
              $('#answer_mod').keyup(function(){
                  if($(this).val != ''){
                      document.getElementById("ans_mod").disabled = false;
                  }
              });

              if ($('#hint_clickd').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
              }

              liv_scoreMod(score);
          });
}
//----------------------------------------------------------------Hard----------------------------------------------------------------//
function startGame_hard(){
      $("#my_audio_game").get(0).play();
      $('#my_audio_game').prop("volume", 0.3);
      $('#sub').html('Hard Mode');
      var room_id = $('#room_id').val();
      var lvl = 'Hard';
      var page = 1;
      var page1 = 0;
      var buzz_tim = 0;
      var user_id = $('#user_id').val();

      $.post('.?action=load_liveScore',{room_id:room_id,lvl:lvl}, function (score1) {
              $('#score').html(score1);
              $('#us_hints').hide();
      });

      $.post('.?action=brain_loadGame_H&page='+page,{room_id:room_id,lvl:lvl,user_id:user_id},function (load_game) {
              $('#data').html(load_game);
              $('#us_hints').hide();
              $('#iconH1').hide();
              $('#iconH2').hide();
              $('#iconH3').hide();
              $('#uis').hide();
              $('#hard_FL').hide();
                    document.getElementById("ans_hard").disabled = true; 
                    $('#answer_hard').keyup(function(){
                        if($(this).val != ''){
                            document.getElementById("ans_hard").disabled = false;
                        }
                    });
      });
      var no_buzz = '';
      load_gam3(page1,buzz_tim,no_buzz);
}


//-------------------------------------------------------FOr HARD-------------------------------------------------------------------------//
function load_gam3(page1,buzz_tim,no_buzz){
    if (page1 == 0) {
       var page = 1;
    }else{
       var page = page1;
    }

    if (buzz_tim == 0) {
       var count = 15;
       var counter = setInterval(timer, 1000);
    }else if (no_buzz == 'no_buzz') {
       var count = buzz_tim;
       var page = page1;
       counter = setInterval(timer, 1000);
    }else{
       var count = buzz_tim;
       counter = setInterval(timer, 1000);
    }

     function timer() {
            $('#timer').html(count);
            if ($('#hintooo').val() == 'Hint Click') {
                      document.getElementById("btn_hint").disabled = true;
            } 
            hints();
            var room_id = $('#room_id').val();
            var user_id = $('#user_id').val();
            $.post('.?action=load_Quit',{room_id:room_id,user_id:user_id}, function (quit_games){
                  $('#quit_games').html(quit_games);
                  var quit = $('#quit').val();
                  var fname = $('#fname').val();
                  if (quit == 'Quit') {
                       Materialize.toast('Player left the game...', 3000, 'rounded');
                  }
            });

            //-------------------------------For waiting-----------------------------------------------//
            var room_id = $('#room_id').val();
            var user_id = $('#user_id').val();
        
            $.post('.?action=load_buzz&lvl=Hard',{user_id:user_id,room_id:room_id}, function (ans_buzz){
                    $('#buzz').html(ans_buzz);
                    if ($('#hard_buzz').val() == 'Buzz') {
                         clearInterval(counter);
                         var buzz_tim = count;
                         var page1 = 0;
                        load_time10(page,page1,buzz_tim);
                    }else if ($('#hard_buzz').val() == 'Waiting') {
                         clearInterval(counter);
                         var buzz_tim = count;
                         var page1 = 0;
                         load_time10_freeze(page,page1,buzz_tim);
                    }

            });

            //------------------------------For Buzz---------------------------------------------------//
             $tims_click = 0
             $('#btn_buzz').one('click', function (){
                    if ($tims_click == 0) {
                        $tims_click = 1;
                          var user_id = $('#user_id').val();
                          var room_id = $('#room_id').val();
                          var buzz = 'Buzz';
                          $("#my_buzz").get(0).play();
                          $.post('.?action=add_buzz',{buzz:buzz,room_id:room_id,user_id:user_id}, function (buzz) {                                     
                                  $('#buzz').html(buzz); 
                          });   
                    }
            });

            //-----------------------------------------------------------------------------------------//
             if (count <= 0) {
                  clearInterval(counter);
                   document.getElementById("btn_buzz").disabled = true;
                  $("#my_audio_wrong").get(0).play();
                   $('#iconH2').fadeIn("slow");
                  var room_id = $('#room_id').val();
                  var lvl = $('#lvl').val();
                  $('#hints_gam').closeModal();

                  $.post('.?action=load_liveScore',{room_id:room_id,lvl:lvl}, function (score1) {
                        $('#score').html(score1);
                        $('#us_hints').hide();

                        page += 1;
                        var page1 = 0;
                        buzz_result(page,page1);
                  });
             }
             count--;
     }
}
//------------------------------------------------load 10 timer buzz-----------------------------------------------------------------//
function  load_time10(page,page1,buzz_tim){
                                     var qid = $('#qid').val();
                                     var counts_buzz = 10;
                                     var counters_buzz = setInterval(function () {

                                        $('#btn_buzz').hide();
                                        $('#uis').show();
                                        $('#timer_buzz').html(counts_buzz);
                                        $timesClicked = 0;
                                          $( ".scorHard" ).one( "click", function (){
                                      
                                            if ($timesClicked == 0 ) {
                                               $timesClicked = 1;
                                               var answer_hard = $('#answer_hard').val().toUpperCase();
                                               var hard_ans = $('#hard_ans').val().toUpperCase();
                                               var question_id = $(this).data('param');
                                               var submit = 'Submit';
                                               if (answer_hard == hard_ans) {
                                                     score_BH = 1;
                                                     var answer_H = 'correct';
                                              
                                               }else if (answer_hard == ''){
                                                    
                                                     score_BH = 0;
                                                     var answer_H = 'wrong';
                                               }else{

                                                     score_BH = 0;
                                                     var answer_H = 'wrong';
                                               }                                  
                                                live_scoreHard(page,page1,score_BH,answer_H,question_id,buzz_tim,submit);
                                            }
                                          });
                                        
                                       if (counts_buzz <= 0 ) {
                                                   clearInterval(counters_buzz);
                                                   $('#timer_buzz').hide();
                                                   document.getElementById("ans_hard").disabled = true;
                                                   document.getElementById("answer_hard").disabled = true;
                                                   document.getElementById("btn_hint").disabled = true;
                                                   document.getElementById("btn_buzz").disabled = true;
                                                   var answer_H = 'wrong';
                                                   score_BH = 0;
                                                   var submit = '';
                                                  if ($('#hard_buzz').val() == 'Buzz') {
                                                       
                                                          var room_id = $('#room_id').val();
                                                          var user_id = $('#user_id').val();
                                                          var submit = '';
                                                          $.post('.?action=load_Submit&lvl=Hard',{room_id:room_id,user_id:user_id}, function (submit){
                                                                $('#submit_mod').html(submit);
                                                                if ($('#mod_submit').val() != 'Submit') {
                                                                    var question_id = $(this).data('param');
                                                                   
                                                                    live_scoreHard(page,page1,score_BH,answer_H,question_id,buzz_tim,submit);
                                                                 }
                                                          });
                                                         
                                                   }                                              
                                                   load_buzz_rsult(page,page1,buzz_tim);
                                      }

                                       counts_buzz--;
                    }, 1000);
}
//-----------------------------------------------------load time freeze--------------------------------------------------------//
function load_time10_freeze(page,page1,buzz_tim){
                               var counts_wait = 10;
                               var counter_wait = setInterval(function() {
                                  $('#timer_wait').html(counts_wait);
                                          document.getElementById("ans_hard").disabled = true;
                                          document.getElementById("answer_hard").disabled = true;
                                          document.getElementById("btn_hint").disabled = true;
                                          document.getElementById("btn_buzz").disabled = true;
                                            
                                          if (counts_wait <= 0 ) {
                                             clearInterval(counter_wait);
                                             $('#timer_wait').hide();
                                             load_buzz_rsult(page,page1,buzz_tim);
                                          }
                                 counts_wait--;
                                  }, 1000);
}
//----------------------------------------------------------------------------------------------------------------------------------------//
function buzz_result(page,page1){
              var counts = 6;
              var counters = setInterval(function() {
              counts--;
                    var answer_hard = $('#answer_hard').val().toUpperCase();
                    var hard_ans = $('#hard_ans').val().toUpperCase();
                
                   if ($('#hard_buzz').val() == '') {
                          document.getElementById("btn_buzz").disabled = true;
                   }else{
                          $('#btn_buzz').hide();
                          $('#uis').show();
                          if (answer_hard == hard_ans) {
                                $('#iconH1').fadeIn("slow");
                                 $("#my_audio_correct").get(0).play();
                          }else if (answer_hard == ''){
                                $('#iconH2').fadeIn("slow");
                                 $("#my_audio_wrong").get(0).play();
                          }else{
                                $('#iconH2').fadeIn("slow");
                                 $("#my_audio_wrong").get(0).play();
                          }
                        
                   }
                     $('#hard_FL').fadeIn("slow");
                        document.getElementById("ans_hard").disabled = true;
                        document.getElementById("answer_hard").disabled = true;
                        document.getElementById("btn_hint").disabled = true;
                                
                    if (counts <= 0 ) {
                        clearInterval(counters);
                       
                          if (page == 6 || page1 == 6) {
                              load_ovr_R();
                           }else{
                              loader_H(page);
                              page1 = page;
                              var buzz_tim = 0;
                              load_gam3(page1,buzz_tim)
                          }
                        
                    }
            }, 1000);
}
//-----------------------------------------------------------------------------------scor HArd---------------------------------------------//
function live_scoreHard(page,page1,score_BH,answer_H,question_id,buzz_tim,submit){
                  var lvl = 'Hard';
                  var user_id = $('#user_id').val();
                  var room_id = $('#room_id').val();
                  var qid = $('#qid').val();
                 
                  $.post('.?action=brain_liveScore',{score_BH:score_BH,user_id:user_id,room_id:room_id,lvl:lvl,answer_H:answer_H,question_id:question_id,qid:qid,submit:submit}, function (data) {
                    document.getElementById("ans_hard").disabled = true;
                    document.getElementById("answer_hard").disabled = true;
                    document.getElementById("btn_hint").disabled = true;
                    document.getElementById("btn_buzz").disabled = true;
                 });

}
//-------------------------------------------------------------------------------------Buzz Result------------------------------------------------------//
function load_buzz_rsult(page,page1,buzz_tim){
     var room_id = $('#room_id').val();
     var lvl = 'Hard';
     $.post('.?action=load_liveScore',{room_id:room_id,lvl:lvl}, function (score1) {
              $('#score').html(score1);
              hard_buzz_result(page,page1,buzz_tim);
     });
}
//-------------------------------------------------------------------------------------Load Buzz Result------------------------------------------------------//

function hard_buzz_result(page,page1,buzz_tim){
     var user_id = $('#user_id').val();
     var room_id = $('#room_id').val();
     var qid = $('#qid').val();
     $.post('.?action=delSubmit',{room_id,room_id,user_id:user_id}, function (dl_sub) {
            $('#submit_mod').html(dl_sub);
     });

     $.post('?action=load_buzz_stats',{room_id:room_id,user_id:user_id,qid:qid}, function (buzz) {
          $('#buzz_results').html(buzz);
          if ($('#buzz_val').val() == 'correct') {
                $("#my_audio_correct").get(0).play();
          }else if ($('#buzz_val').val() == 'wrong') {
                $("#my_audio_wrong").get(0).play();
          }

          if ($('#buzz_correct').val() != 0 || $('#buzz_wrong').val() == $('#buzz_plr_count').val()) {
                 //---correct buzz---//
                    page += 1;
                    var counts = 6;
                    var counters = setInterval(function() {
                    counts--;
                             
                             if ($('#hard_buzz').val() == 'Waiting') {
                                    document.getElementById("btn_buzz").disabled = true;
                             }else{
                                    $('#btn_buzz').hide();
                                    $('#uis').show();
                             }

                             if ($('#buzz_val').val() == 'correct') {
                                  $('#iconH1').fadeIn("slow");
                             }else if ($('#buzz_val').val() == 'wrong'){
                                  $('#iconH2').fadeIn("slow");
                                
                             }else{
                                  $('#iconH2').fadeIn("slow");
                                  
                             }
                             $('#hard_FL').show();
                              document.getElementById("ans_hard").disabled = true;
                              document.getElementById("answer_hard").disabled = true;
                              document.getElementById("btn_hint").disabled = true;
                                      
                          if (counts <= 0 ) {
                              clearInterval(counters);
                              
                              var user_id = $('#user_id').val();
                              var room_id = $('#room_id').val();
                              $.post('.?action=del_buzz',{room_id:room_id,user_id:user_id}, function (dl_buzz) {
                                    $('#buzz').html(dl_buzz);
                              });

                                if (page == 6 || page1 == 6) {
                                    load_ovr_R();
                                    clearInterval(counter);
                                 }else{
                                  var page1 = page;
                                    if ($('#buzz_val').val() == 'correct' || $('#hard_buzz').val() == 'Waiting') {
                                         loader_H(page);
                                    }else{
                                        var amp = page;
                                        loader_H(amp);
                                    }
                                    buzz_tim = 0;
                                    var no_buzz = '';
                                    load_gam3(page1,buzz_tim,no_buzz);
                                }
                              
                          }
                    }, 1000);
           }else if ($('#buzz_val').val() == 'wrong') {
                 $('#hard_FL').show();
                 $('#btn_buzz').hide();
                 $('#uis').show();
                 $('#iconH2').fadeIn("slow");

             
                 document.getElementById("ans_hard").disabled = true;
                 document.getElementById("answer_hard").disabled = true;
                 document.getElementById("btn_hint").disabled = true;
                 var page1 = page;
                 var no_buzz = 'no_buzz';
                 load_gam3(page1,buzz_tim,no_buzz);         
                        
           }else{
                 var user_id = $('#user_id').val();
                 var room_id = $('#room_id').val();
                 $.post('.?action=del_buzz',{room_id:room_id,user_id:user_id}, function (dl_buzz) {
                           $('#buzz').html(dl_buzz);
                 });
                 document.getElementById("ans_hard").disabled = false;
                 document.getElementById("answer_hard").disabled = false;
                 document.getElementById("btn_hint").disabled = false;
                 document.getElementById("btn_buzz").disabled = false;
              
                 var page1 = page;
                 var no_buzz = '';
                 load_gam3(page1,buzz_tim,no_buzz);
           }
     });  

             
}
//--------------------------------------------------------------------------------HARD LOAD page------------------------------------------------------------------------//
function loader_H(page){

    var room_id = $('#room_id').val();
    var lvl = $('#lvl').val();
    var user_id = $('#user_id').val();
    var pause = 0;

    $.post('.?action=load_hint', {room_id:room_id,user_id:user_id}, function (load_hint){
              $('#load_hint').html(load_hint);
              if ($('#hintooo').val() == 'Hint Click') {
                  document.getElementById("btn_hint").disabled = true;
              }
    });

        $.post('.?action=brain_loadGame_H&page='+page,{user_id:user_id,room_id:room_id,lvl:lvl},function (load_game) {
            $('#data').html(load_game);
            $('#us_hints').hide();
            $('#iconH1').hide();
            $('#iconH2').hide();
            $('#iconH3').hide();
              $('#uis').hide();
               $('#hard_FL').hide();
              document.getElementById("ans_hard").disabled = true; 
                    $('#answer_hard').keyup(function(){
                        if($(this).val != ''){
                            document.getElementById("ans_hard").disabled = false;
                        }
                    });
          });
}
//---------------------------------------------------------------------------------HINTS--------------------------------------------------//
function hints(){
   $hints_click = 0;
   $('#btn_hint').one('click', function (){
        if ($hints_click == 0) {
          $hints_click = 1;
          $('#hints_gam').openModal({
                  dismissible: true, 
                  opacity: .5,
                  in_duration: 600,
                  out_duration: 600
            });
        }
    });
}

   $('#hint_click').one('click', function (h){
        var user_id = $('#user_id').val();
        var room_id = $('#room_id').val();
        var movs = 'Hint Click';
         $.post('.?action=game_addHint',{movs:movs,user_id:user_id,room_id:room_id},function () {
             $('#us_hints').show();
             $('#hints_gam').closeModal();
             document.getElementById("btn_hint").disabled = true;
        });
         h.preventDefault();
    });

//----------------------------------------------Easy or Mod or Hard----------------------------------------------------------------//
function load_result(){
         var user_id = $('#user_id').val();
         var room_id = $('#room_id').val();
         var lvl = $('#lvl').val();
        
          $.post('.?action=get_result',{room_id:room_id,lvl:lvl,user_id:user_id}, function (emh_results) {
                  $('#emh_results').html(emh_results);
                  $('#modal_result').openModal({
                      dismissible: false
                  });
                  if ($('#pass').val() == 'pass') {
                      
                       $('#my_audio_game').prop("volume", 0.0);
                       $('#my_audio_pass').prop("volume", 0.3);
                       $("#my_audio_pass").get(0).play();
                      time_nxtLvl();
                  }else {
                       $('#my_audio_game').prop("volume", 0.0);
                       $('#my_audio_fail').prop("volume", 0.3);
                       $('#my_audio_pass').prop("volume", 0.3);
                       exitLvl();

                  }
          });
}
function time_nxtLvl(){
        var count1 =  10; 
        var counter1 = setInterval(timer1, 1000);
        var lbl = $('#nxt_lvl').val();
        function timer1()
        {
         $('#timer_nxtLvl').html(count1);
          if (count1 <= 0) {
              clearInterval(counter1);
              if (lbl == 'Moderate') {
                  startGame_moderate();
              }else if (lbl == 'Hard') {
                  startGame_hard();
              }
              $('#modal_result').closeModal();
          }
            count1--;
        }
}
function exitLvl(){
        var count = 10;
        var counter=setInterval(timer, 1000);
        function timer()
        {
          $('#timer_nxtLvl').html(count);
          if (count <= 0) {
              clearInterval(counter);
              var room_num = $('#room_id').val();
              var user_id = $('#user_id').val();   
              window.location.href = '.?action=brain_gameOver&user_id='+user_id+'&room_id='+room_num;
          }
            count--;
        }
}

//-------------------------------------------------------------------------------------------------HINTS--------------------------------------------------//
function load_ovr_R(){
        var user_id = $('#user_id').val();
        var room_id = $('#room_id').val();
          $.post('.?action=get_Ovresult',{room_id:room_id,user_id:user_id}, function (results) {
                  $('#ovr_results').html(results); 
                   $('#r_sult').openModal({
                      dismissible: false
                  });
                   timer_endGame();
          });
  
}
//-------------------------------------------------------------------------------------------------------------------------------------------------//
function timer_endGame(){
        var count = 10;
        var counter=setInterval(timer, 1000);
        function timer()
        {
          $('#timer_wow').html(count);
          if (count <= 0) {
              clearInterval(counter);
              var room_num = $('#room_id').val();
              var user_id = $('#user_id').val();
              window.location.href = '.?action=brain_endGame&user_id='+user_id+'&room_id='+room_num;
          }
            count--;
        }
}
//-------------------------------------------------------------------------------------------------------------------------------------------------//
 $('#quit_room').one('click',function() {
          var room_id = $('#room_id').val();
          var user_id = $('#user_id').val();
          var quit = 'Quit';
          $.post('.?action=QuitGame',{user_id:user_id,room_id:room_id,quit:quit}, function (quit_game) {
                  $('#quit_games').html(quit_game);
          }); 

        var count = 0;
        var counter=setInterval(timer, 900);
        function timer()
        {
          if (count <= 0) {
              clearInterval(counter);
              var room_num = $('#room_id').val();
              var user_id = $('#user_id').val();
              window.location.href = '.?action=brain_gameOver&user_id='+user_id+'&room_id='+room_num;
          }
            count--;
        }
});

