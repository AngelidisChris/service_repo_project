<?php

namespace App\Repositories;

use App\Models\Voyage;

interface VoyageRepositoryInterface
{
    public function all();

    public function make(Voyage $voyage);
}
