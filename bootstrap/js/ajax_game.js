$(document).ready(function () {
		 
            $('.load_game1').on('click', function (e){
                 var room_id = $('#room_id').val();
               
                 $.post('.?action=brain_loadGame&page=1',{room_id:room_id},function (load_game) {
                  
                    $('#data').html(load_game);
                  
                 });
                  e.preventDefault();
            });

            $('.load_game2').on('click', function (e){
                var room_id = $('#room_id').val();
              
                 $.post('.?action=brain_loadGame&page=2',{room_id:room_id},function (load_game) {
                  
                    $('#data').html(load_game);
                   
                 });
                  e.preventDefault();
            });

       
});