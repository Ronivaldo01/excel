@extends('layout.layout', ["current" => "produtos" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista Produtos Excel</h5>

        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onClick="novoProduto()">Importar Excel</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal " id="formProduto" method="POST" action="processa" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Nova lista do Excel</h5>
                </div>
                <div class="modal-body">

					<div class="custom-file">
						<label class="custom-file-label">Arquivo</label>
						@csrf
						<input class="custom-file-input"  type="file" id="arquivo" name="arquivo" required="required">
						<input type="hidden" name="_token" value="{{@csrf_token()}}" class="hidden">
					</div>
			    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
     
     
     
@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    function novoProduto() {
        
        $('#dlgProdutos').modal('show');
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.quantidade + "</td>" +
            "<td>" + p.preco + "</td>" +
           // "<td>" + p.categoria_id + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
              '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
   
    function carregarProdutos() {
        $.getJSON('/api/', function(produtos) { 
            for(i=0;i<produtos.length;i++) {
                linha = montarLinha(produtos[i]);
                $('#tabelaProdutos>tbody').append(linha);
            }
        });        
    }
   
    $(function(){
        //carregarCategorias();
        carregarProdutos();
    })
    
</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     