<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
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
}
