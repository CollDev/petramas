$(document).on('ready', function(){
    $("[rel='tooltip']").tooltip();
    
//    $('a.entity').on('click', function(e){
//        e.preventDefault();
//        $.ajax({
//            type: "GET",
//            url: $(this).attr('href')
//        }).done(function(html){
//            $('#petramasModal').html(html).modal();
//        });
//    });
    
//    $(document).on('click', 'button.entity', function(e){
//        e.preventDefault();
//        var $parent = $(this).parent().parent();
//        $.ajax({
//            type: "POST",
//            url: $parent.attr('action'),
//            data: $('.' + $parent.attr('class')).serialize()
//        }).done(function(returnValue){
//            if (returnValue.status !== 200) {
//                $('#petramasModal').html(returnValue);
//            }
//        });
//    });
    
//    $('a.delete').on('click', function(e){
//        e.preventDefault();
//        
//    });
});