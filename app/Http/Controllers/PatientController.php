<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); // Buscar todos os pacientes do banco de dados
        return view('pacientes.index', compact('patients'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'cpf' => 'required|string|max:14',
        'entry_date' => 'required|date',
        'bed_number' => 'required|integer',
    ]);

    $patient = new Patient($validated);
    $patient->id_number = Str::uuid(); // Gera um UUID
    $patient->save();

    return redirect()->route('pacientes.index');
}
}
