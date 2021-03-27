<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoyageCreateRequest;
use App\Models\Voyage;
use App\Repositories\VoyageRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoyageController extends Controller
{

    private VoyageRepositoryInterface $voyageRepository;

    /**
     * VoyageController constructor.
     * @param $voyageRepository
     */
    public function __construct(VoyageRepositoryInterface $voyageRepository)
    {
        $this->voyageRepository = $voyageRepository;
    }


    public function store(VoyageCreateRequest $request): JsonResponse
    {
        $voyage = new Voyage($request->validated());


        $status = $this->voyageRepository->make($voyage);

        if ($status)
            return response()->json($voyage, 201);
        else
            return response()->json(null, 500);
    }
}
