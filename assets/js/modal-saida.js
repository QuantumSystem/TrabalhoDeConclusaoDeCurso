$(document).ready(function(){
	$('a[data-saida]').click(function(evt){
		var href = $(this).attr('href');
		if(!$('#confirm-saida').length){
			$('body').append('<div class="modal modal-warning fade" id="confirm-saida" style="display: none;"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">Salvar</h4></div><div class="modal-body"><p>Tem certeza que deseja salvar a saída?</p></div><div class="modal-footer"><button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button><a class="btn btn-outline" id="dataConfirmOk">Salvar</a></div></div></div>');
		};
		$('#dataConfirmOk').attr('href', href);
		$('#confirm-saida').modal({shown:true});
		return false;
	});
});