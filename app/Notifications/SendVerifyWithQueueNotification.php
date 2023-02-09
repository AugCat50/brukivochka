<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifyWithQueueNotification extends VerifyEmail implements ShouldQueue
{
    /**
     * Благодаря имплементации и этому трейту будет работать очерёдность при отправке верификационного письма
     * QUEUE_CONNECTION=database в env, т.к. очерёдность в бд
     */
    use Queueable;
}
