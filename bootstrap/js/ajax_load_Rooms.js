 $(document).ready(function () {
        $("#my_audio").get(0).play();
        $('#my_audio').prop("volume", 0.2);
 		join_room();
 		// view_joinProf();
//----------------Load rooms---------------------//
		setInterval(function() {
        $.get('.?action=load_rooms', function (playr) {
            $('#tblData').html(playr);
            join_room();
	        });
	    }, 5000); 
//------------------------------------------//
		function join_room(){
    		$('.join_room').on('click',function (o) {
    			var rid = $(this).data('param');
    			var user_id = $('#user_id').val();
                var room_num = $(this).data('param1');
                    window.location.href = '.?action=brain_joinRoom&player_type=Client&rid='+rid+'&user_id='+user_id+'&room_num='+room_num;
	            o.preventDefault();
       		});
    	}

});