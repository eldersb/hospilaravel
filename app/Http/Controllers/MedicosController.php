<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Models\Medicos;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    private $medico;

    public function __construct(Medicos $medico)
    {
        $this->medico = $medico;
    }

    public function index(Request $request)
    {
        $parametros = $request->all();
        $medicos = $this->medico;

        if(!empty($parametros['especialidade']))
        {
            $medicos = $medicos->whereHas('especialidade', function ($query) use ($parametros) {
                $query->where('nome', 'like', '%' . $parametros['especialidade'] . '%');
            });
        }

        if(!empty($parametros['nome']))
        {
            $medicos = $medicos->where('nome', 'like', '%' . $parametros['nome'] . '%');
        }

        if(!empty($parametros['hospital']))
        {
            $medicos = $medicos->whereHas('hospital', function ($query) use ($parametros) {
                $query->where('nome', 'like', '%' . $parametros['hospital'] . '%');
            });
        }

        $medicos = $medicos->get();

        // $medicos = $this->medico->when($request->has('especialidade'), function($query) use ($request) {
        //     $query->whereHas('especialidade', function ($query) use ($request){
        //         $query->where('nome', $request->especialidade);
        //     });
        // })->get();

        return MedicoResource::collection($medicos);
    }

    public function show(Medicos $medico)
    {
        return new MedicoResource($medico);
    }

    public function store(MedicoRequest $request)
    {
        $medico = Medicos::create($request->validated());

        return response()->json($medico, 201);
    }

    public function update(MedicoRequest $request, Medicos $medico)
    {
    
        $medico->update($request->validated());

        return new MedicoResource($medico);
    }

    public function destroy(Medicos $medico)
    {
        $medico->delete();

        return response()->json(['message' => 'Medico deletado com sucesso!']);
    }

}
