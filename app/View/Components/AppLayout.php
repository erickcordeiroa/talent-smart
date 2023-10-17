<?php

namespace App\View\Components;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {   
        $notifications = DB::table('notifications')
            ->join('jobs', 'notifications.job_id', '=', 'jobs.id')
            ->join('clients', 'jobs.client_id', '=', 'clients.id')
            ->select('notifications.*', 'clients.fantasy')
            ->where('notifications.user_id', Auth::user()->id)
            ->limit(5)
            ->orderBy('created_at', 'DESC')->get();

        $countNotify = Notification::where('user_id', Auth::user()->id)->where('view', 0)->count();
        return view('layouts.app', [
            'notifications' => $notifications,
            'countNotify' => $countNotify
        ]);
    }
}
