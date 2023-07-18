<?php

use Flarum\Api\Controller\ListDiscussionsController;
use Flarum\Api\Serializer\DiscussionSerializer;
use Flarum\Extend;
use Flarum\User\AssertPermissionTrait;
use Flarum\User\User;

return [
    (new Extend\ApiController(ListDiscussionsController::class))
        ->prepareDataForSerialization(function ($controller, &$data, User $actor, $request) {
            if ($request->getAttribute('routeName') === 'my-discussions') {
                $actor->assertRegistered();

                // Kullanıcının kendi tartışmalarını filtreleyin
                $data = $data->where('user_id', $actor->id);
            }
        }),

    (new Extend\Frontend('forum'))
        ->route('/my-discussions', 'my-discussions')
        ->content(function ($view) {
            $view->component = 'my-discussions';
        }),

    (new Extend\Routes('api'))
        ->get('/my-discussions', 'my-discussions', ListDiscussionsController::class),
];
