<?php

namespace Flagrow\Serve;

use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listeners\AddServeCommand::class);
};
