$(document).on('ready', function(){
    $("[rel='tooltip']").tooltip();
    
    $('a.entity').on('click', function(e){
        e.preventDefault();
    });
});