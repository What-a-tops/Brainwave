//----------------Load Joinrooms---------------------//
$(document).ready(function () {
        // $("#my_audio_join").get(0).play();
        //  $('#my_audio_join').prop("volume", 0.3);
        // view_joinProf();
        setInterval(function() {
        var room_num = $('#room_num').val();
        $.get('.?action=load_joinRooms',{room_num:room_num}, function (join) {
            $('#tbl_joinRoom').html(join);
             // view_joinProf();
            });
        }, 5000); 
       
            $('.toast1').on('click',function() {
                   Materialize.toast('Exit your room before logout!', 3000, 'rounded');
            });
});
        
        //------------------------------------------//
$(document).on('click', '.view_profile', function(){
                $acc_path = $(this).data('param');
                if ($acc_path == '') {
                   $("#join_acc_path").attr("src", './pics/question.png');
                }else{
                   $("#join_acc_path").attr("src", $acc_path);
                }
                $last_name = $(this).data('param1');
                $first_name = $(this).data('param2');
                $middle_name = $(this).data('param3');
                $address = $(this).data('param4');
                $age = $(this).data('param5');
                $gender = $(this).data('param6');
                $acc_path = $(this).data('param7');
                $achiv_counts = $(this).data('param8');
                $subject = $(this).data('param9');
                $result = $(this).data('param10');

                if ($result == 'Master') {
                     $("#medal").attr("src", './bootstrap/img/backgrounds/1451069248_Trophy-gold.png');
                }else if ($result == 'Expert') {
                     $("#medal").attr("src", './bootstrap/img/backgrounds/1451072177_Trophy-silver.png');
                }else if ($result == 'Best') {
                     $("#medal").attr("src", './bootstrap/img/backgrounds/1451069264_Trophy-bronze.png');
                }else{
                     $("#medal").attr("src", './bootstrap/img/backgrounds/a_major_award.png');
                }

                $('#last_name').val($last_name);
                $('#first_name').val($first_name);
                $('#middle_name').val($middle_name);
                $('#address').val($address);
                $('#age').val($age);
                $('#gender').val($gender);
                $('#acc_path').val($acc_path);
                $('#achiv_counts').val($achiv_counts);
                $('#subject').val($subject);
                $('#result').val($result);
                
                  $('#view_profile').openModal({
                    dismissible: true, 
                    opacity: .5,
                    in_duration: 600,
                    out_duration: 600
                  });
});
