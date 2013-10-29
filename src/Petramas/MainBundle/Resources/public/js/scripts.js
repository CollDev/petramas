var $modal = '<div class="modal-dialog">\n\
    <div class="modal-content">\n\
        <div class="modal-header">\n\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\n\
            <h4 class="modal-title">{{ title }}</h4>\n\
        </div>\n\
        <div class="modal-body">\n\
            <p>{{ body }}</p>\n\
        </div>\n\
        <div class="modal-footer">\n\
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>\n\
            <button type="button" class="btn btn-danger delete-remove">{{ ok }}</button>\n\
        </div>\n\
    </div>\n\
</div>';
$(document).on('ready', function(){
    if ($('span#fosuserbundle-errors').text() !== '') {
        $('#flash_message').message('danger',$('span#fosuserbundle-errors').text(), '#flash_title', false);
    }
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
    
    $('button.entity-submit-delete').on('click', function(e){
        e.preventDefault();
        var $this = this;
        var data = {
            title: 'Eliminar registro',
            body: '¿Esta seguro de elimnar este registro?',
            ok: 'Eliminar'
        };
        modal = $.mustache($modal, data);
        $('#petramasModal').html(modal).modal();

        $(document).on('click', 'button.delete-remove', function(){
            $($this).parent().parent().parent().submit();
            $(this).parent().find('button').attr('data-dismiss', 'modal').trigger('click');
        });
    });
    
    $('input#petramas_mainbundle_pedidodetalle_cantidad').on('keyup', function(){
        $('div#petramas_mainbundle_pedidodetalle_importe').html(parseFloat($(this).val()) * 20);
    });
});