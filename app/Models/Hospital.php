<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "endereco",
        "telefone"
    ];

    protected $table = "hospitais";

    public function medicos()
    {
        return $this->hasMany(Medicos::class);
    }
    
}
