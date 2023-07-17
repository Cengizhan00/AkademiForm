<?php

use Flarum\Discussion\Event\Saving;
use Flarum\Extend;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->js(__DIR__.'/js/dist/forum.js'),
    function (Dispatcher $events, SettingsRepositoryInterface $settings) {
        $events->listen(Saving::class, function (Saving $event) use ($settings) {
            $actor = $event->actor;
            $discussion = $event->discussion;

            if ($discussion->exists && !$actor->can('startDiscussion', $discussion->category)) {
                // User doesn't have permission to start a discussion in this category
                return;
            }

            if ($discussion->exists && $discussion->user_id !== $actor->id) {
                // User is not the author of this discussion
                return;
            }

            if (!$discussion->exists && $settings->get('flarum.my_discussions.only_own_discussions')) {
                $event->discussion->user_id = $actor->id;
            }
        });
    }
];
