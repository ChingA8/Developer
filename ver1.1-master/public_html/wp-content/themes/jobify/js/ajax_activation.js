jQuery(document).ready(function($){

     
    // This does the ajax request
  $('#activation_form').submit(function(ev){ 
        var values = $('#activation_form').serialize();
        $.ajax({
            url: ajaxurl,
            data: values + '&action=example_ajax_request',
            success:function(data) {
                // This outputs the result of the ajax request
                console.log(data);
                if(data == 1){
                    location.reload();
                }
                else{
                    $('.wrong_code').show();
                }
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
        ev.preventDefault();
    })
});
