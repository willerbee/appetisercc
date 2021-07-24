<?php

namespace App\Repositories;

use App\Http\Requests\StoreCalendarEventRequest;
use App\Models\CalendarEvent;

class CalendarEventRepository implements CalendarRepositoryInterface
{

    public function store(StoreCalendarEventRequest $request)
    {
        $event = new CalendarEvent();
        $event->name = $request->name;
        $event->from = $request->from;
        $event->to = $request->to;
        $event->days = $request->days;
        $event->save();
        return $event;
    }
}
