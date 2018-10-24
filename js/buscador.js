/*$(document).ready(function() {
    $('#buscar').DataTable();
} );*/

$(document).ready(function() {
    $('#buscar').DataTable({
    	"paging":   true,
        "ordering": true,
        "info":     false
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

