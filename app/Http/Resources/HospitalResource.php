<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'medicos' => $this->medicos->map(function ($medico) {
                return [
                    'nome' => $medico->nome,
                    'especialidade' => $medico->especialidade->nome
                ];
            })
        ];
    }
}
