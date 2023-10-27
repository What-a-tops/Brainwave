 $(document).ready(function () {
        mod_start();
        gam_start();
        var room_num = $('#room_num').val();
        var user_id = $('#user_id').val();
        var rid = $('#rid').val();
        var playr_typ = $('#playr_typ').val();

        setInterval(function() {
        $.get('.?action=load_joinRooms_start',{room_num:room_num,user_id:user_id,rid:rid,player_type:playr_typ}, function (join) {
            $('#tbl_menu').html(join);
                mod_start();
                    var user_id = $('#user_id').val();
                    var moves = $('#moves').val();
                    if (moves == 'Game Start') {
                        var room_id = $('#room_num').val();
                        joinplayer_start(room_id);
                    }else if (moves == 'exit'){
                         if ($('.usertype').val() == "client") {
                            exit_room();
                         }
                    }else{    
                        gam_start();
                    }
            });
        }, 500); 

        function mod_start(){
            $('.mod_start').one('click',function() {
                  $('#exit_rooms').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
            });
        }

        function exit_room(){
                 var playr_typ = $('.usertype').val();  
                 var room_id = $('#room_num').val();
                 var user_id = $('#user_id').val();  
                 var gam_start = 'exit';        
                 window.location.href = '.?action=brain_exitRoom&user_id='+user_id+'&room_id='+room_id+'&gam_start='+gam_start+'&playr_typ='+playr_typ;
        }

         $(document).on('click', '#exit_room', function(){
             $end_click = 0;
             if ($end_click == 0) {
                $end_click = 1;
                 var room_id = $('#room_num').val();
                 var playr_typ = $('.usertype').val();
                 if (typeof(playr_typ) == 'undefined') {
                    playr_typ = '***';
                 }
                 var user_id = $('#user_id').val();
                 var gam_start = 'exit';
                 window.location.href = '.?action=brain_exitRoom&user_id='+user_id+'&room_id='+room_id+'&gam_start='+gam_start+'&playr_typ='+playr_typ;
             }
                
        });

        function joinplayer_start(room_id){
                var user_id = $('#user_id').val();
                var playr_typ = $('#playr_typ').val();
                window.location.href = '.?action=brain_StartGame&user_id='+user_id+'&room_id='+room_id+'&playr_typ='+playr_typ;
         }

          function gam_start(){
                 $('.gam_start').one('click', function (p){
                        var room_id = $('#room_num').val();
                        $start_click = 0;
                        if ($start_click == 0) {
                             $start_click = 1;
                             start_game(room_id);
                        }
                        p.preventDefault();
                });
         }
         function start_game(room_id){
                $.get('.?action=load_joinRooms_start',{room_num:room_id,user_id:user_id,rid:rid,player_type:playr_typ}, function (join) {
                        $('#tbl_menu').html(join);
                         var user_id = $('#user_id').val();
                         var playr_typ = $('#playr_typ').val();
                         window.location.href = '.?action=brain_StartGame&user_id='+user_id+'&room_id='+room_id+'&playr_typ='+playr_typ;
                });   
         }

});