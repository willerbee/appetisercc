<?php

namespace App\Repositories;

use App\Http\Requests\StoreCalendarEventRequest;

interface CalendarRepositoryInterface
{
    public function store(StoreCalendarEventRequest $request);
}
