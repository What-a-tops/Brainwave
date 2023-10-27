$(document).ready(function () {
 		coom();
 		// view_joinProf();
//----------------Load rooms---------------------//
		setInterval(function() {
		$user_id = $('#user_id').val();
        $.get('.?action=load_cooms', function (cooms) {
            $('#comm').html(cooms);
            // coom_op();
	        });
	    }, 5000); 
//------------------------------------------//

// function coom_op(){
    $('#comm_modal').on('click',function () {
          $('#coompo').openModal();
    });
// }
		function coom(){
    		$('#comm_button').on('click',function (o) {
    			var user_id = $('#user_id').val();
                var coom = $("#coom").val();

                if (coom == '') {
                      Materialize.toast('Invalid! Input first', 3000, 'rounded');
                      // $('#coompo').closeModal();
                 }else{
                       $.post('.?action=brain_add_comments',{user_id:user_id,coom:coom},function (cooms) {
                          // var message = 'Question Deleted';
                           Materialize.toast('Success! Comments...', 3000, 'rounded');
                          $('#coom').val('').focus();
                          $('#comm').html(cooms);
                          $('#coompo').closeModal();
                          // $('#yu' + qid).hide();
                       });
                }
                 
	            o.preventDefault();
       		});
    	}

});