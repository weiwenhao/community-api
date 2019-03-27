<?php

namespace App\Notifications;

use App\Channels\DatabaseChannel;
use App\Models\Model;
use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification as BaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;

class Notification extends BaseNotification
{
    use Queueable;

    /**
     * @var User
     */
    private $trigger;
    /**
     * @var Post
     */
    private $target;
    /**
     * @var Model
     */
    private $content;

    /**
     * Create a new notification instance.
     *
     * @param Model $trigger
     * @param Model $target
     * @param Model $content
     */
    public function __construct(Model $trigger, Model $target, Model $content = null)
    {
        $this->trigger = $trigger;
        $this->target = $target;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DatabaseChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $data = [
            'trigger' => [
                'id' => $this->trigger->id,
                'type' => $this->trigger->getTable(),
                'nickname' => $this->trigger->nickname,
                'avatar' => $this->trigger->avatar,
            ],
            'target' => [
                'id' => $this->target->id,
                'type' => $this->target->getTable(),
                'text' => $this->getTargetText(),
            ]
        ];

        if ($this->content) {
            $content = [
                'id' => $this->content->id,
                'type' => $this->content->getTable(),
                'text' => $this->getContentText(),
            ];

            if ($this->content->call_user) {
                $content['call_user'] = $this->content->call_user;
            }

            $data['content'] = $content;
        }

        return $data;
    }

    public function getTargetText()
    {
        return $this->target->title ?? str_limit($this->target->content, 100);
    }

    public function getContentText()
    {
        return $this->content->content;
    }

    public function getType()
    {
        $class = explode("\\", static::class);
        $class = end($class);
        return Str::snake($class);
    }
}
