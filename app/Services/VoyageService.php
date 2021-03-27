<?php


namespace App\Services;


use App\Models\Vessel;
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

    public function editVoyage($request): bool
    {

        if (isset($request->status))
        {

            // check for multiple ongoing voyages
            if ($request->status === 'ongoing' && $this->voyage->status !== 'ongoing')
                return ! $this->ongoingExists();
            // A voyage can be submitted (status to ‘submitted’), only if ‘start’, ‘end’, ‘revenues’ and ‘expenses’ are not null.
            if ($request->status === 'submitted')
            {

                if (!$this->canBeSubmitted($request))
                {
                    return false;
                }

                $this->calculateProfit($request);

            }


            // cannot edit a voyage that is ‘submitted’.
            if ($this->voyage->status === 'submitted')
            {
                // dont edit voyage that is already submitted
                if ($this->editSubmitted($request))
                {
                    return false;
                }
            }

        }

        $this->voyage->update($request);

        return true;

    }

    public function calculateProfit($request)
    {
        $this->voyage->profit = $request->revenues - $request->expenses;
    }

    public function canBeSubmitted($request): bool
    {
        if (isset($request->start) && isset($request->end) && isset($request->revenues) && isset($request->expenses))
        {
            return true;
        }

        return false;
    }

    public function ongoingExists(): bool
    {

        $this->
        $ongoingVoyages = Voyage::with('vessel')->where('vessel_id', $this->voyage->vessel_id)->where('status', 'ongoing')->get();

        if ($ongoingVoyages->count())
            return true;


        return false;
    }

    public function editSubmitted($request): bool
    {
        if (isset($request->start) || isset($request->end) || isset($request->revenues) || isset($request->expenses))
        {
            return true;
        }

        return false;
    }

}
