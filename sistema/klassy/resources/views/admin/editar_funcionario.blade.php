@extends('admin.admin_principal')

@section('content')
    <div class="container w-50 rounded-md bg-info">
        <h1 class="text-2xl text-bold text-center">Editar Funcionário</h1>
        <form class="mt-4 w-1/4 p-2 text-white" action="{{ route('atualizar_funcionario') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <select class="form-control text-black" id="cargo" name="cargo" value="{{ $funcionario->cargo }}" required>
                    <option value="3">Garçom</option>
                    <option value="2">Cozinheiro</option>
                    <option value="1">Gerente</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salário:</label>
                <input type="number" step="0.01" class="form-control text-black" id="salario" name="salario" value="{{ $funcionario->salario }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Funcionário</button>
        </form>
    </div>
@endsection
