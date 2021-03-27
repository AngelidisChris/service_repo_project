<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoyageCreateRequest;
use App\Models\Voyage;
use Illuminate\Http\Request;

class VoyageController extends Controller
{


    public function store(VoyageCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $voyage = new Voyage($request->validated());
        $status = $voyage->save();


        if ($status)
            return response()->json($voyage, 201);
        else
            return response()->json(null, 500);
    }
}
