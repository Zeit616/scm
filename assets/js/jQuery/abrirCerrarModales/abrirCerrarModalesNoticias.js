$(document).ready(function(){
    //Abrir-Cerrar modal de añadir usuario
        $('#abrirModalAñadirNoticia').click(function() {
            $('#modalAñadirNoticia').modal('show');
        });
        $('#cerrarModalAñadirNoticia').click(function() {
            $('#modalAñadirNoticia').modal('hide');
        });

//Abrir-Cerrar modal de editar medio
    $("#tablaNoticias").on("click", ".botonEditarNoticia",function(){
        //Abrir modal Editar item
            $("#modalEditarNoticia").modal("show");              
        //Llenar inputs al mostrar modal
            var tablaNoticias = $("#tablaNoticias").DataTable();
            if(tablaNoticias.row(this).child.isShown()) {
                var data = tablaNoticias.row(this).data();                
            } else {                
                var data = tablaNoticias.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            };   
        
            $("#CodNoticiaEditar").val(data[0]);
            $("#EditarFechaNoticia").val(data[1]);
            $("#EditarMedioNoticia").val(data[2]);
            $("#EditarTitular").val(data[3]);
            $("#EditarEspacio").val(data[4]);
            $("#EditarPeriodista").val(data[5]);
            $("#EditarImpacto").val(data[6]);
            $("#EditarComentario").val(data[7]);
            $("#EditarRecomendaciones").val(data[8]);
            $("#EditarFuente").val(data[9]);
            $("#EditarEnlaceAdicional").val(data[11]);        
    });
    $('#cerrarModalEditarNoticia').click(function() {
        $('#modalEditarNoticia').modal('hide');
    }); 
});