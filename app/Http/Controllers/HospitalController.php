<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalRequest;
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

    public function show(Hospital $hospital, HospitalRequest $request)
    {
        return new HospitalResource($hospital, $request);
    }

    public function store(HospitalRequest $request)
    {
        $hospital = $this->hospital->create($request->validated());

        return new HospitalResource($hospital);

    }

    public function update(HospitalRequest $request, Hospital $hospital)
    {
        $hospital->update($request->validated());

        return new HospitalResource($hospital);
    }

    public function destroy(Hospital $hospital)
    {

        $hospital->delete();

        return response()->json(['message' => 'Hospital deletado com sucesso!'], 200);
    }

}
