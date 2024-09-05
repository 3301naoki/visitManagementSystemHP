<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class VisitantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitantes = Http::get($_ENV["API_URL"] . "/visitante/allVisitantes")->json();
        $pacientes = Http::get($_ENV["API_URL"] . "/paciente/allPacientes")->json();

        $visitantes = collect($visitantes);
        $pacientes = collect($pacientes);

        return view("visitantes", ["visitantes" => $visitantes, "pacientes" => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente = Http::get($_ENV["API_URL"] . "/paciente/pacienteByNome/" . $request->input("paciente"))->json();
        
        if (!$paciente['id']) {
            return redirect()->back()->with("error", "Paciente não encontrado");
        }

        $visitante = Http::post($_ENV["API_URL"] . "/visitante/saveVisitante", [
            "nome" => $request->input("nome"),
            "cpf" => preg_replace('/\D/', '', $request->input("cpf")),
            "categoria" => $request->input("categoria"),
            "paciente" => [
                "id" => $paciente['id'],
                "nome" => $paciente['nome'],
                "cpf" => $paciente['cpf'],
                "leito" => $paciente["leito"],
                "dataEntrada" => $paciente['dataEntrada']
            ]
        ]);

        if ($visitante->status() >= 400 && $visitante->status() < 500) {
            return redirect()->back()->with("error", $visitante->json()['mensagem']);
        }

        if ($visitante->status() == 500) {
            return redirect()->back()->with("error", "Ocorreu um erro inesperado.");
        }

        return redirect()->back()->with("sucess", "Visitante criado com secesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete($_ENV['API_URL'] . '/visitante/deleteVisitante/' . $id);

        if ($response->status() >= 400 && $response->status() < 500) {
            return redirect()->back()->with("error", $response->json()['mensagem']);
        }

        if ($response->status() == 500) {
            return redirect()->back()->with("error", "Ocorreu um erro inesperado.");
        }

        return redirect()->back()->with("success", "Visitante deletado com sucesso!");
    }
}
