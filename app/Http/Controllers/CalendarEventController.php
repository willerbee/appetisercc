<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalendarEventRequest;
use App\Repositories\CalendarEventRepository;

class CalendarEventController extends Controller
{
    public function __construct(CalendarEventRepository $calendarEventRepository)
    {
        $this->calendarEventRepository = $calendarEventRepository;
    }

    public function storeCalendarEvent(StoreCalendarEventRequest $request) {
        return $this->calendarEventRepository->store($request);
    }
}
