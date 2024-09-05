@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-start mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal"
                            style="background-color: #2180FE">Adicionar</button>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Tabela de Pacientes</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Visitante</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                CPF</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Data de Entrada</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Leito</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ações</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Empty row with "Edit" link -->
                                        @if (count($pacientes) > 0)
                                            @foreach ($pacientes as $paciente)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $paciente['id'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $paciente['nome'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $paciente['cpf'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $paciente['dataEntrada'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $paciente['leito'] }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <style>
                                                            .bg-action-button-custom1 {
                                                                background-color: #0bf;
                                                                color: #fff;
                                                                transition: all .4s;
                                                            }

                                                            .bg-action-button-custom1:hover {
                                                                background-color: #079;
                                                                color: #ddd;
                                                            }

                                                            .bg-action-button-custom3 {
                                                                background-color: rgb(149, 34, 221);
                                                                color: #fff;
                                                                transition: all .4s;
                                                                border: none;
                                                                maring-left: 10px;
                                                            }

                                                            .bg-action-button-custom3:hover {
                                                                background-color: rgb(92, 24, 124);
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
                                                        <button
                                                            class="bg-action-button-custom3 font-weight-bold text-xs badge badge-sm"
                                                            data-original-title="Ver Paciente" data-bs-toggle="modal"
                                                            data-bs-target="#viewPatientModal">
                                                            Ver paciente
                                                        </button>
                                                        <a href="{{ route('update-paciente', $paciente['id']) }}"
                                                            class="font-weight-bold text-xs badge badge-sm bg-action-button-custom1"
                                                            data-toggle="tooltip" data-original-title="Editar Paciente">
                                                            Editar
                                                        </a>
                                                        <form action="{{ route('deletar-paciente', $paciente['id']) }}"
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
                                                    <td class="align-middle text-center"></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <!-- Placeholder row for "Edit" action -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal para Adicionar Paciente -->
    <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPatientModalLabel">Adicionar Paciente</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pacientes/criar') }}" method="POST">
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
                            <label for="bed_number">Nº do Leito</label>
                            <input type="number" class="form-control" id="bed_number" name="leito" required>
                        </div>
                        <!-- Remover o campo id_number -->
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('pacientes') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" style="background-color: #2180FE">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($pacientes->first())
        <div class="modal fade" id="viewPatientModal" tabindex="-1" role="dialog" aria-labelledby="viewPatientModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="padding: 0 10px; min-width: fit-content;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPatientModalLabel">Paciente {{ $pacientes->first()['nome'] }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Visitante</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
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
                                                .bg-action-button-custom {
                                                    background-color: #0bf;
                                                    color: #fff;
                                                    transition: all .4s;
                                                    margin-right: 10px;
                                                    margin-left: 20px;
                                                }

                                                .bg-action-button-custom:hover {
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
                            </tbody>
                        </table>
                    </div>
                    <!-- Remover o campo id_number -->
                </div>
            </div>
        </div>
    @endif
    </div>
    </main>
@endsection

@push('styles')
    <style>
        .btn-custom-small {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            line-height: 1.25;
            border-radius: 0.2rem;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .align-items-center {
            align-items: center;
        }
    </style>
@endpush
