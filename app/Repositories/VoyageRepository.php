<?php


namespace App\Repositories;


use App\Models\Voyage;

class VoyageRepository implements VoyageRepositoryInterface
{
    public function all()
    {

    }

    public function make(Voyage $voyage)
    {
        return $voyage->save();
    }
}
