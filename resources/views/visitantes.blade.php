@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <style>
            .ok {
                color: #000;
                display: grid;
                place-items: center;
            }

            .ok p {
                background: #9d29;
                min-width: 180px;
                width: fit-content;
                font-size: 14px;
                border-radius: 6px;
                padding: 2px 5px;
                border-radius: 6px;
                text-align: center;
            }

            .error {
                color: #000b;
                display: grid;
                place-items: center;
            }

            .error p {
                background: #ff000089;
                min-width: 180px;
                width: fit-content;
                font-size: 16px;
                border-radius: 6px;
                padding: 2px 5px;
                border-radius: 6px;
                text-align: center;
            }
        </style>
        @if (session('ok'))
            <span class="ok">
                <p class="text-center font-weight-bolder">{{ session('ok') }}</p>
            </span>
        @endif
        @if (session('error'))
            <span class="error">
                <p class="text-center font-weight-bolder">{{ session('error') }}</p>
            </span>
        @endif
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-start mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addVisitanteModal" style="background-color: #2180FE">Adicionar</button>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Visitante</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                CPF</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Categoria</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Paicente</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($visitantes) > 0)
                                            @foreach ($visitantes as $visitante)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $visitante['nome'] }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $visitante['cpf'] }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <style>
                                                            .bg-custom {
                                                                background-color: #A8F;
                                                            }
                                                        </style>
                                                        <span class="badge badge-sm  bg-custom"
                                                            style="backgroud-color: ">{{ $visitante['categoria'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $visitante['paciente'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <style>
                                                            .bg-action-button-custom1 {
                                                                background-color: #0bf;
                                                                color: #fff;
                                                                transition: all .4s;
                                                                margin-right: 10px;
                                                                margin-left: 20px;
                                                            }

                                                            .bg-action-button-custom1:hover {
                                                                background-color: #079;
                                                                color: #ddd;
                                                            }

                                                            .bg-action-button-custom3 {
                                                                background-color: #9d2;
                                                                color: #fff;
                                                                transition: all .4s;
                                                                margin-right: 10px;
                                                            }

                                                            .bg-action-button-custom3:hover {
                                                                background-color: #392;
                                                                color: #ddd;
                                                            }

                                                            .bg-action-button-custom2 {
                                                                background-color: #f50;
                                                                color: #fff;
                                                                transition: all .4s;
                                                            }

                                                            .bg-action-button-custom2:hover {
                                                                background-color: #910;
                                                                color: #ddd;
                                                            }
                                                        </style>
                                                        {{-- <a href="{{ route('update-visitante', $visitante['id']) }}"
                                                        class="font-weight-bold text-xs badge badge-sm bg-action-button-custom"
                                                        data-toggle="tooltip" data-original-title="Editar Paciente">
                                                        Editar
                                                    </a> --}}
                                                        <form action="{{ route('deletar-visitante', $visitante['id']) }}"
                                                            style="display: inline; w-100" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="font-weight-bold text-xs badge badge-sm bg-action-button-custom2"
                                                                style="border: none;" data-toggle="tooltip"
                                                                data-original-title="Deletar Paciente">
                                                                Deletar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addVisitanteModal" tabindex="-1" role="dialog"
                aria-labelledby="addVisitanteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addVisitanteModalLabel">Adicionar visitante</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('vistantes/criar') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                                </div>
                                <div class="form-group">
                                    <label for="entry_date">Categoria</label>
                                    <select class="form-control" id="entry_date" name="categoria" required>
                                        <option value="ACOMPANHANTE">Acompanhante</option>
                                        <option value="VISITANTE">Visitante</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bed_number">Paciente</label>
                                    <input type="text" class="form-control" id="bed_number" name="paciente"
                                        list="pacientes" name="" required>

                                    <datalist id="pacientes">
                                        @foreach ($pacientes as $paciente)
                                            <option value="Paciente" disabled>Paciente</option>

                                            <option value="{{ $paciente['nome'] }}">
                                                LEITO: {{ $paciente['leito'] }}
                                                -
                                                CPF: {{ $paciente['cpf'] }}
                                                -
                                                ID {{ $paciente['id'] }}
                                            </option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <!-- Remover o campo id_number -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #2180FE">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
