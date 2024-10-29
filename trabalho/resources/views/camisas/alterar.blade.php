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
            Alteração da Camisas {{ $camisas->id }}
        </div>
        <div class="card-body">
            <form method="POST" action="/admCamisas/upd">
                @csrf
                <div class="modal-body">
                <input type="hidden" name="id"
                    value="{{ $camisas->id}}"
                />

                        <div class="form-floating mb-3">
                            <input type="text" 
                                    class="form-control" 
                                    id="nome" 
                                    name="nome" 
                                    placeholder="Digite o time da camisa"
                                    value="{{ $camisas->nome }}"
                                    >
                            <label for="floatingInput">Time</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" 
                                    class="form-control" 
                                    id="tamanho"
                                    name="tamanho" 
                                    placeholder="Digite o tamanho da camisa"
                                    value="{{ $camisas->tamanho }}"
                                    >
                            <label for="floatingInput">Tamanho</label>
                        </div>

                        
                        <div class="form-floating mb-3">
                            <input type="text" 
                                    class="form-control" 
                                    id="marca"
                                    name="marca" 
                                    placeholder="Digite a marca da camisa"
                                    value="{{ $camisas->marca }}"
                                    >
                            <label for="floatingInput">Marca</label>
                        </div>

                        
                        <div class="form-floating mb-3">
                            <input type="text" 
                                    class="form-control" 
                                    id="valor"
                                    name="valor" 
                                    placeholder="Digite o valor da camisa"
                                    value="{{ $camisas->valor }}"
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