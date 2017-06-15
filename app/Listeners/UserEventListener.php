<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * 用户登录/登出等活动事件监听器
 */
class UserEventListener
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        $user = $event->user;
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        $user = $event->user;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('App\Events\UserLogin', 'App\Listeners\UserEventListener@onUserLogin');
        $events->listen('App\Events\UserLogout', 'App\Listeners\UserEventListener@onUserLogout');
    }
}
