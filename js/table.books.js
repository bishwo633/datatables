
/*
 * Editor client script for DB table books
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.books.php',
		table: '#books',
		fields: [
			{
				"label": "name:",
				"name": "name"
			},
			{
				"label": "ISBN:",
				"name": "isbn"
			},
			{
				"label": "author:",
				"name": "author"
			},
			{
				"label": "description:",
				"name": "description"
			},
			{
				"label": "registered date:",
				"name": "registered_date",
				"type": "datetime",
				"format": "ddd, D MMM YY"
			}
		]
	} );

	var table = $('#books').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.books.php',
		columns: [
			{
				"data": "name"
			},
			{
				"data": "isbn"
			},
			{
				"data": "author"
			},
			{
				"data": "description"
			},
			{
				"data": "registered_date"
			}
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

