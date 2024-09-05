@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <form action="{{ route('paciente/atualizar', $pacientes['id']) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Paciente</label>
                            <input type="text" class="form-control" id="name" name="nome" required
                                value="{{ $pacientes['nome'] }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="entry_date">Leito</label>
                            <input type="text" class="form-control" id="entry_date" name="leito" required
                                value="{{ $pacientes['leito'] }}">
                        </div>
                        <!-- Remover o campo id_number -->
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('pacientes') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #2180FE">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
