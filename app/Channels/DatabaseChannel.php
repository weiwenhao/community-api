<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use RuntimeException;
use Illuminate\Notifications\Channels\DatabaseChannel as Channel;

class DatabaseChannel extends Channel
{
    /**
     * Build an array payload for the DatabaseNotification Model.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array
     */
    protected function buildPayload($notifiable, Notification $notification)
    {
        return [
            'id' => $notification->id,
            'type' => $notification->getType(),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
        ];
    }
}