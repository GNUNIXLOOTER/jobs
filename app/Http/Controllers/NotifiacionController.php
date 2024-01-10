<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifiacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;

        return view('notificationes.index', [
            'notificaciones' => $notificaciones,
        ]);
    }
}