<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialidadeRequest;
use App\Models\Especialidades;
use App\Models\Hospital;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    private $especialidade;

    public function __construct(Especialidades $especialidade)
    {
        $this->especialidade = $especialidade;
    }

    public function index()
    {
        $especilidades = $this->especialidade->all();

        return $especilidades;
    }

    public function show(Especialidades $especialidade)
    {
        return $especialidade;
    }

    public function store(EspecialidadeRequest $request)
    {
        $especialidades = $this->especialidade->create($request->validated());

         return response()->json($especialidades, 200);
    }

    public function update(EspecialidadeRequest $request, Especialidades $especialidade)
    {
        $especialidade->update($request->validated());

        return response()->json($especialidade, 200);
    }

    public function destroy(Especialidades $especialidade)
    {
        $especialidade->delete();

        return response()->json(['message' => 'Especialidade deletada com sucesso!'], 200);

    }
}
