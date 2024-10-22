<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "crm",
        "hospital_id",
        "especialidades_id"
    ];

    public function especialidade()
    {
        return $this->belongsTo(Especialidades::class, 'especialidades_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
