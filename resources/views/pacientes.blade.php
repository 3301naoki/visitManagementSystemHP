@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-start mb-3">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientModal">Adicionar</button>
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
<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPatientModalLabel">Adicionar Paciente</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" required>
          </div>
          <div class="form-group">
            <label for="entry_date">Data de Entrada</label>
            <input type="date" class="form-control" id="entry_date" required>
          </div>
          <div class="form-group">
            <label for="bed_number">Nº do Leito</label>
            <input type="number" class="form-control" id="bed_number" required>
          </div>
          <!-- Remover o campo id_number -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>
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
