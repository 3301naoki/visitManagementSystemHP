<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Http;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitantes = Http::get($_ENV["API_URL"] . "/visitante/allVisitantes")->json();
        $pacientes = collect(Http::get($_ENV["API_URL"] . "/paciente/allPacientes")->json());

        $pacientes = $pacientes->map(function ($paciente) {
            $paciente["dataEntrada"] = Carbon::parse($paciente["dataEntrada"])->format("d/m/y");
            return $paciente;
        });

        $visitantes = collect($visitantes)->filter(
            function ($visitante) use ($pacientes) {
                return $visitante['paciente'] == $pacientes->first()['nome'];
            }
        );

        return view("pacientes", ["visitantes" => $visitantes, "pacientes" => $pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (intval($request->input('leito')) < 0) {
            return redirect()->back()->with("error", "O número do leito é inválido.");
        }

        $response = Http::post($_ENV['API_URL'] . '/paciente/savePaciente', [
            "cpf" => preg_replace('/\D/', '', $request->input("cpf")),
            "nome" => $request->input("nome"),
            "numeroLeito" => intval($request->input("leito"))
        ]);

        if ($response->status() == 400) {
            return redirect()->back()->with("error", "Error de validação.");
        }

        if ($response->status() >= 401 && $response->status() < 500) {
            return redirect()->back()->with("error", $response->json()['mensagem']);
        }

        if ($response->status() == 500) {
            return redirect()->back()->with("error", "Ocorreu um erro inesperado.");
        }

        return redirect()->back()->with("ok", "Paciente criado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $pacientes = Http::get($_ENV["API_URL"] . "/paciente/allPacientes")->json();

        $pacientes = collect($pacientes)->filter(
            function ($paciente) use ($id) {
                return $paciente['id'] == $id;
            }
        );


        return view("update-paciente", ["pacientes" => $pacientes->first()]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put($_ENV['API_URL'] . '/paciente/updatePaciente', [
            "id" => $id,
            "leito" => $request->input("leito")
        ]);

        if ($response->status() >= 400 && $response->status() < 500) {
            return redirect()->back()->with("error", $response->json()['mensagem']);
        }

        if ($response->status() == 500) {
            return redirect()->back()->with("error", "Ocorreu um erro inesperado.");
        }

        return redirect("pacientes")->with("ok", "Leito do paciente atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete($_ENV['API_URL'] . '/paciente/deletePaciente/' . $id);

        if ($response->status() >= 400 && $response->status() < 500) {
            return redirect()->back()->with("error", $response->json()['mensagem']);
        }

        if ($response->status() == 500) {
            return redirect()->back()->with("error", "Ocorreu um erro inesperado.");
        }

        return redirect()->back()->with("ok", "Paciente deletado com sucesso!");
    }
}
