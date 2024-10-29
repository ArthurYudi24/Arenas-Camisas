@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Camisas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Camisas</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Camisas
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="btn btn-success" 
                        data-bs-toggle="modal" 
                        data-bs-target="#exampleModal">
                        Novo
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tamanho</th>
                    <th>Marca</th>
                    <th>Valor</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @foreach($camisas as $linha)
                        <tr>
                            <td>{{ $linha->id }}</td>
                            <td>{{ $linha->nome }}</td>
                            <td>{{ $linha->tamanho }}</td>
                            <td>{{ $linha->marca }}</td>
                            <td>{{ $linha->valor }}</td>
                            <td>
                                <a href='{{ route('camisas_upd', [ "id" => $linha->id ]) }}' class='btn btn-success'>
                                    <li class='fa fa-pencil'></li>
                                </a>
                                | 
                                <a href='{{ route('camisas_ex', [ "id" => $linha->id ]) }}' 
                                    class='btn btn-danger'
                                >
                                    <li class='fa fa-trash'></li>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="/admCamisas">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Camisa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" 
                                class="form-control" 
                                id="nome" 
                                name="nome" 
                                placeholder="Digite o Time da camisa"
                                >
                        <label for="floatingInput">Time</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" 
                                class="form-control" 
                                id="tamanho"
                                name="tamanho" 
                                placeholder="Digite o tamanho da camisa "
                                >
                        <label for="floatingInput">Tamanho</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" 
                                class="form-control" 
                                id="marca"
                                name="marca" 
                                placeholder="Digite a marca da camisa "
                                >
                        <label for="floatingInput">Marca</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" 
                                class="form-control" 
                                id="valor"
                                name="valor" 
                                placeholder="Digite o valor da camisa "
                                >
                        <label for="floatingInput">Valor</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection