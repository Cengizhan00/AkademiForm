<?php

use Illuminate\Database\Schema\Blueprint;

use Flarum\Database\Migration;

return Migration::createTable(
    'akademis',
    function (Blueprint $table) {
        $table->increments('id');

        // created_at & updated_at
        $table->timestamps();
    }
);

