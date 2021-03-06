$(document).ready(function(){  
	$('#tabela-relatorios').DataTable({
		"language": {
			"sLengthMenu": "Mostrando _MENU_ resultados por página",
			"sEmptyTable": "Nenhum registro encontrado",
			"sZeroRecords": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sSearch": "Pesquisar",
			"SearchPlaceholder": "Comience a teclear...",
			 "oPaginate": {
		        "sNext": "Próximo",
		        "sPrevious": "Anterior",
		        "sFirst": "Primeiro",
		        "sLast": "Último"
		    },
		    "oAria": {
		        "sSortAscending": ": Ordenar colunas de forma ascendente",
		        "sSortDescending": ": Ordenar colunas de forma descendente"
		    }
		}
	});  
});  