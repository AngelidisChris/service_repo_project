<?php


namespace App\Services;


use App\Models\Voyage;

class VoyageService
{
    protected Voyage $voyage;

    /**
     * VoyageService constructor.
     * @param Voyage $voyage
     */
    public function __construct(Voyage $voyage)
    {
        $this->voyage = $voyage;
    }


    public function generateCode()
    {
        $this->voyage->code = $this->voyage->vessel->name . '-' . $this->voyage->start->format('Y-m-d');
    }

    public function ongoingStatus(): bool
    {
        if ($this->voyage->vessel()->status === 'ongoing')
            return true;
        else false;
    }

    public function setVoyage()
    {
        $this->generateCode();

    }

}
