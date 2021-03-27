<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoyageCreateRequest;
use App\Http\Requests\VoyageUpdateRequest;
use App\Http\Resources\VoyageResource;
use App\Models\Voyage;
use App\Repositories\VoyageRepositoryInterface;
use App\Services\VoyageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoyageController extends Controller
{

    private VoyageRepositoryInterface $voyageRepository;

    /**
     * VoyageController constructor.
     * @param VoyageRepositoryInterface $voyageRepository
     */
    public function __construct(VoyageRepositoryInterface $voyageRepository)
    {
        $this->voyageRepository = $voyageRepository;
    }

    public function index()
    {
        $voyages = $this->voyageRepository->all();



        return response()->json(VoyageResource::collection($voyages), 200);

    }


    public function store(VoyageCreateRequest $request): JsonResponse
    {
        $voyage = new Voyage($request->validated());

        $voyageService = new VoyageService($voyage);

        $voyageService->setVoyage();


        $status = $this->voyageRepository->make($voyage);


        if ($status)
            return response()->json(null, 201);
        else
            return response()->json(null, 500);
    }

    public function update(VoyageUpdateRequest $request, Voyage $voyage): JsonResponse
    {
        $voyageService = new VoyageService($voyage);

        $status = $voyageService->editVoyage($request->validated());


        if ($status)
            return response()->json(null, 200);
        else
            return response()->json(null, 500);


    }
}
