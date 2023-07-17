<?php

namespace Akademi\Akademiform\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use Akademi\Akademiform\akademi;
use InvalidArgumentException;

class akademiSerializer extends AbstractSerializer
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'akademis';

    /**
     * {@inheritdoc}
     *
     * @param akademi $model
     * @throws InvalidArgumentException
     */
    protected function getDefaultAttributes($model)
    {
        if (! ($model instanceof akademi)) {
            throw new InvalidArgumentException(
                get_class($this).' can only serialize instances of '.akademi::class
            );
        }

        // See https://docs.flarum.org/extend/api.html#serializers for more information.

        return [
            // ...
        ];
    }
}
