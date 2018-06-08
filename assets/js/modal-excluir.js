$(document).ready(function(){
	$('a[data-confirm]').click(function(evt){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal modal-danger fade" id="confirm-delete" style="display: none;"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Excluir</h4></div><div class="modal-body"><p>Tem certeza que deseja Excluir?</p></div><div class="modal-footer"><button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button><a class="btn btn-outline" id="dataConfirmOk">Excluir</a></div></div></div>');
		};
		$('#dataConfirmOk').attr('href', href);
		$('#confirm-delete').modal({shown:true});
		return false;
	});
});
