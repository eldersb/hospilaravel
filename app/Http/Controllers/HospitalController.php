<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    private $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
    }

    public function index()
    {
        $hospitais = $this->hospital->all();

        return HospitalResource::collection($hospitais);
    }

    public function show(Hospital $hospital)
    {
        return $hospital;
    }
}
