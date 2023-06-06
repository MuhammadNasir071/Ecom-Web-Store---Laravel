<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\EventRepository;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function store($request)
    {
        $imagePath = $this->eventRepository->storeImage($request);
        $this->eventRepository->store($request, $imagePath);
        return true;
    }

    public function update($request, $id)
    {
        $imagePath = $this->eventRepository->storeImage($request);
        $this->eventRepository->update($request, $id, $imagePath);
    }

    public function destroy($id)
    {
        return $this->eventRepository->destroy($id);
    }
}
