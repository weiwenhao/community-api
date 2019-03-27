<?php

namespace App\Listeners;

use App\Channels\DatabaseChannel;
use App\Models\Notification;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompressNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param NotificationSent $event
     * @return void
     */
    public function handle(NotificationSent $event)
    {
        $channel = $event->channel;

        if ($channel !== DatabaseChannel::class) {
            return;
        }

        $currentNotification = $event->response;
        if (!in_array($currentNotification->type, ['like_post', 'like_comment'])) {
            return;
        }

        // TODO unread_notification_count + 1

        $notifiable = $event->notifiable;
        $previousNotification = $notifiable->unreadNotifications()
            ->where('data->target->type', $currentNotification->data['target']['type'])
            ->where('data->target->id', $currentNotification->data['target']['id'])
            ->where('id', '<>', $currentNotification->id)
            ->first();

        if ($previousNotification) {
            $compressCount = $previousNotification->data['compress_count'] ?? 1;
            $triggers = $previousNotification->data['triggers'] ?? [$previousNotification->data['trigger']];


            $compressCount += 1;

            // 最多存储三个触发者
            if (count($triggers) < 3) {
                $triggers[] = $currentNotification->data['trigger'];
            }

            $previousNotification->delete();

            $data = $currentNotification->data;
            $data['compress_count'] = $compressCount;
            $data['triggers'] = $triggers;
            unset($data['trigger']);

            $currentNotification->data = $data;
            $currentNotification->save();
        }
    }
}
