$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function numero(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}

$(document).ready(function () {

    $('#productos').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            row: "Registro",
            export: "Exportar",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
            },
            aria: {
                sortAscending: ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
            },
            select: {
                row: "registro",
                selected: "seleccionado"
            }
        }
    });
});

$(function () {

    $('#form-crear_producto').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#form-actualizar_producto').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

function obtener_datos_producto(id) {
    var Nombre = $("#nombre_producto" + id).val();
    var Referencia = $("#referencia" + id).val();
    var Categoria = $("#categoria" + id).val();
    var Precio = $("#precio" + id).val();
    var Stock = $("#stock" + id).val();
    var Peso = $("#peso" + id).val();

    $("#idProducto_upd").val(id);
    $("#upd_nombre_producto").val(Nombre);
    $("#upd_referencia").val(Referencia);
    $("#upd_categoria").val(Categoria);
    $("#upd_precio").val(Precio);
    $("#upd_stock").val(Stock);
    $("#upd_peso").val(Peso);
}

function obtener_datos_venta(id) {
    var Nombre = $("#nombre_producto" + id).val();
    var Referencia = $("#referencia" + id).val();
    var Categoria = $("#categoria" + id).val();
    var Precio = $("#precio" + id).val();
    var Stock = $("#stock" + id).val();
    var Peso = $("#peso" + id).val();

    $("#idProducto_venta").val(id);
    $("#venta_nombre_producto").val(Nombre);
    $("#venta_referencia").val(Referencia);
    $("#venta_categoria").val(Categoria);
    $("#venta_precio").val(Precio);
    $("#cantidad").val('1');
    $("#venta_peso").val(Peso);
    document.getElementById("cantidad").max = Stock;
}

function borrar_producto(id){
    if (confirm('¿Desea borrar este producto?')) {
        var tipo = 'post';
        $.ajax({
            url: "borrarProducto",
            type: "get",
            data: { _method: tipo, idProducto: id },
            success: function (data) {
                var Valido = data['valido'];
                if (Valido === 'true'){
                    alert('Se elimino el producto con éxito');
                    location.reload();
                }else{
                    alert('Hubo un problema al eliminar el producto');
                    location.reload();
                }
            }
        });
    }
}
