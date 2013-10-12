$(document).on('ready', function(){
    $("[rel='tooltip']").tooltip();
    
    $('a.entity').on('click', function(e){
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            success: function(html) {
                $('#petramasModal').html(html).modal();
            }
        });
    });
});