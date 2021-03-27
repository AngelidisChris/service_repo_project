<?php


namespace App\Repositories;


use App\Models\Voyage;

class VoyageRepository implements VoyageRepositoryInterface
{
    public function all()
    {
        return Voyage::all();
    }

    public function make(Voyage $voyage): bool
    {
        return $voyage->save();
    }

    public static array $statuses =[
            'pending',
            'ongoing',
            'submitted'
        ];
}
