<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Requests\Admin\SpecialtyRequest;

class SpecialtyController extends Controller
{
    //view all specialties
    public function index()
    {
        $specialties = Specialty::all();
        return response()->json([
            'data' => $specialties,
        ], 200);
    }
    
    //create new specialty
    public function store(SpecialtyRequest $request)
    {
        $specialty = Specialty::create($request->validated());
        return response()->json([
            'message' => 'Specialty created successfully',
            'data' => $specialty,
        ], 201);
    }
    
    //view specific specialty
    public function show(Specialty $specialty)
    {
        $specialty = Specialty::find($specialty->id);
        return response()->json([
            'data' => $specialty,
        ], 200);
    }
    
    //update specific specialty
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        $specialty->update($request->validated());
        return response()->json([
            'message' => 'Specialty updated successfully',
            'data' => $specialty,
        ], 200);
    }
    
    //delete specific specialty
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return response()->json([
            'message' => 'Specialty deleted successfully',
        ], 200);
    }
}
