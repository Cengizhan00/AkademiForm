<?php

namespace Akademi\Akademiform;

use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;
use Akademi\Akademiform\akademi;

class akademiRepository
{
    /**
     * @return Builder
     */
    public function query()
    {
        return akademi::query();
    }

    /**
     * @param int $id
     * @param User $actor
     * @return akademi
     */
    public function findOrFail($id, User $actor = null): akademi
    {
        return akademi::findOrFail($id);
    }
}
