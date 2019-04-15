@extends('layout.layout')
@section('body')
    <div class="card border">
        <div class="card-body">
            @foreach($prods as $prod)

            @endforeach
            <form action="/produtos/{{$prods->id}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" value="{{$prods->nome}}" name="nome" id="nome" placeholder="Produto">

                </div>

                <div class="form-group">

                    <label for="estoqueProduto">Quantidade do Produto</label>
                    <input type="text" value="{{$prods->quantidade}}" class="form-control" name="quantidade" id="quantidade" placeholder="Estoque">

                </div>

                <div class="form-group">

                    <label for="precoProduto">Valor do Produto</label>
                    <input type="text" value="{{$prods->preco}}" class="form-control" name="preco" id="preco" placeholder="Valor">

                </div>


                <button class="btn btn-primary btn-sm">Salvar</button>
                <a href="/" class="btn btn-danger btn-sm">Cancelar</a>

            </form>
        </div>
    </div>
@endsection
