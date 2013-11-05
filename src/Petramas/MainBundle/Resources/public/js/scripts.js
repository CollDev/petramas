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

$("[rel='tooltip']").tooltip();

function isFloat(n) {
    return n === +n && n !== (n|0);
}
function isInteger(n) {
    return n != "" && !isNaN(n) && Math.round(n) == n;
}

function updateImporte($this) {
    var $val = $($this).val();

    if (isFloat(parseFloat($val)) || isInteger(parseInt($val))) {
        $('div#petramas_mainbundle_pedidodetalle_importe').html(parseFloat($val * $('select#petramas_mainbundle_pedidodetalle_material option:selected').data('tarifa')));
    } else {
        $('div#petramas_mainbundle_pedidodetalle_importe').html('Por favor ingrese números.');
    }
}

$(document).on('ready', function(){
    if ($('span#fosuserbundle-errors').text() !== '') {
        $('#flash_message').message('danger',$('span#fosuserbundle-errors').text(), '#flash_title', false);
    }

    updateImporte($('input#petramas_mainbundle_pedidodetalle_cantidad'));
    
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
    
    $('a.entity-submit-confirmar_pedido').on('click', function(e){
        e.preventDefault();
        var $this = this;
        var data = {
            title: 'Aceptación de pedido',
            body: '¿Esta seguro de confirmar este pedido?',
            ok: 'Confirmar'
        };
        modal = $.mustache($modal, data);
        $('#petramasModal').html(modal).modal();

        $(document).on('click', 'button.delete-remove', function(){
            window.location = $($this).attr("href");
        });
    });
    
    $('a.entity-submit-registrar_salida').on('click', function(e){
        e.preventDefault();
        var $this = this;
        var data = {
            title: 'Registro de salida',
            body: '¿Esta seguro de registrar la salida de este pedido?',
            ok: 'Registrar'
        };
        modal = $.mustache($modal, data);
        $('#petramasModal').html(modal).modal();

        $(document).on('click', 'button.delete-remove', function(){
            window.location = $($this).attr("href");
        });
    });
    
    $('input#petramas_mainbundle_pedidodetalle_cantidad').on('keyup', function(){
        updateImporte(this);
    });
    
    $('select#petramas_mainbundle_pedidodetalle_material').on('change', function(){
        updateImporte($('input#petramas_mainbundle_pedidodetalle_cantidad'));
    });
    
    $('.datetimepicker').datetimepicker({
        language: 'es'
    });
});