<?php

namespace App\Http\Middleware;

use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use Hybridly\Http\Middleware;
use Illuminate\Support\Facades\Route;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional(auth()->user()),
            ]),
            'currentRoute' => Route::currentRouteName(),
        ]);
    }
}
