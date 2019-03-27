<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Post;
use App\Resources\NotificationResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function index()
    {
        $notifications = \Auth::user()->notifications()->columns()->latest()->paginate();

        return NotificationResource::make($notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function markAsRead(Request $request)
    {
        $notificationIds = $request->input('notification_ids');

        \Auth::user()->unreadNotifications()
            ->whereIn('id', $notificationIds)
            ->update(['read_at' => now()]);

        return $this->created();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Notification $notification
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return $this->noContent();
    }
}
