        $(function(){
            $('#visitas_id').change(function(){
                if( $(this).val() ) {
                    $('#veiculos_id').hide();
                    $.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value="">Escolha Subcategoria</option>'; 
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
                        }   
                        $('#id_sub_categoria').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
                }
            });
        });