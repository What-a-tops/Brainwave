
//-----------------default buttons----------------------//
function disableButtonsDown(e) { 
    if ((e.which || e.keyCode) == 116) e.preventDefault(); 
};

$(document).ready(function(){
     $(document).on("keydown", disableButtonsDown);
});

//-----------------default buttons----------------------//


  $(document).ready(function() {

          $('.tooltipped').tooltip({delay: 50});
          $('.modal-trigger').leanModal({
                  dismissible: true, 
                  opacity: .5,
                  in_duration: 600,
                  out_duration: 600
           });

          $('.modal-trigger1').leanModal({
              dismissible: true, // Modal can be dismissed by clicking outside of the modal
              opacity: .5, // Opacity of modal background
              in_duration: 300, // Transition in duration
              out_duration: 200, // Transition out duration
              ready: function() { }, // Callback for Modal open
              complete: function() { 

                //$('select[name=subject_easy]').html('').load('?action=rload_cat',function(){ 
                   // $('select').material_select();
               // });   
              }  // Callback for Modal close
            }
          );
         
         
             // $('.datepicker').pickadate({
             //    selectMonths: true, 
             //    selectYears: 10

             //  });

             $('.datepicker').pickadate({
               
                onSelect: function(value, ui) {
                    var today = new Date(), 
                        dob = new Date(value), 
                        age = new Date(today - dob).getFullYear() - 2015;
                    
                    $('#age').text(age);
                },
                maxDate: '+0d',
                yearRange: '1950:2015',
                selectMonths: true,
                selectYears: 10
            });

          
           $('ul.tabs').tabs('select_tab', 'tab_id');
           $('select').material_select();  
           $('.slider').slider({full_width: true});
           $('.parallax').parallax();
           // $('.button-collapse').sideNav();
           $('.parallax').parallax();
           // $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
           $('.dropdown-button').dropdown({
              inDuration: 400,
              outDuration: 325,
              constrain_width: false,
              hover: true,
              gutter: 0, 
              belowOrigin: false
            });

           
      });

       // $(document).ready(function() {
       //      var parent = $("#shuffle");
       //      var divs = parent.children();
       //      while (divs.length) {
       //          parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
       //      }
       //  });
