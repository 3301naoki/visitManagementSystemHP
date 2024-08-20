@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-start mb-3">
          <button type="button" class="btn btn-primary">Adicionar</button>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CPF</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Entrada</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nº do Leito</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Empty row with "Edit" link -->
                  <tr>
                    <td colspan="6" class="text-center">Nenhum dado disponível</td>
                  </tr>
                  <!-- Placeholder row for "Edit" action -->
                  <tr>
                    <td>
                      <div class="d-flex align-items-center px-2 py-1">
                        <div>
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="placeholder">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">Nome do Paciente</h6>
                          <p class="text-xs text-secondary mb-0">email@exemplo.com</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">000.000.000-00</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">01/01/2024</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">123</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">001</span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <button class="btn btn-custom-small btn-warning">Editar</button>
                      </a>
                    </td>
                    <td class="align-middle text-center">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                        <button class="btn btn-custom-small btn-danger">Excluir</button>
                      </a>
                    </td>
                  </tr>
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

  .table td, .table th {
    vertical-align: middle;
  }

  .align-items-center {
    align-items: center;
  }
</style>
@endpush
