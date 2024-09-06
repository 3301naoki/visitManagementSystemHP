@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
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
                    <div class="mb-3 px-1">
                        <h4><strong>{{ $paciente->first()['nome'] }}</strong></h4>
                        <p>
                            <strong>Leito:</strong> {{ $paciente->first()['leito'] }} -
                            <strong>Data de entrada:</strong> {{ $paciente->first()['dataEntrada'] }} -
                            <strong>CPF:</strong> {{ $paciente->first()['cpf'] }}
                        </p>
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
                                                Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($visitantes) > 0)
                                            @foreach ($visitantes as $visitante)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
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
                                        @endif
                                    </tbody>
                                </table>
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

    @endpush
