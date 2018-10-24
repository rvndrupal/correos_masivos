/*$(document).ready(function() {
    $('#buscar').DataTable();
} );
*/
$(document).ready(function() {
    $('#buscar').DataTable({
    	"paging":   true,
        "ordering": false,
        "info":     false,
		"language": {
			"lengthMenu": "Vista _MENU_ por página",
            "sSearch":"Buscar",
            "zeroRecords": "No se encuntro ningun campo - Disculpa",
            "info": "Página  _PAGE_ of _PAGES_",
            "infoEmpty": "No se encuentrar campos",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
		"pageLength": 5

    });
} );
/*
$(document).ready(function() {
   
var consulta=$('#buscar').DataTable({
		"paging":   false,
        "ordering": false,
        "info":     false
});

$("input[type='search']").keyup(function(){

	consulta.search($(this).val()).draw();
})


} );//ready

$(document).ready(function() {

$("label").text("");

} );//ready*/

